<?php

namespace App\Http\Controllers;

use App\Models\Seni;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SeniController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $senis = Seni::all();
        return view('Admin.seni.seni', [
            'seni' => $senis,
            'user' => $user
        ]);
    }
    public function edit($id)
    {

        $user = Auth::user();
        $seni = Seni::findOrFail($id);
        return view('Admin.seni.seni_edit', [
            'user' => $user,
            'seni' => $seni
        ]);
    }
    public function store(Request $request)
    {
        $requestData = $request->all();
        $rules = [
            'nama_kontingen' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
            'cabang'=>'required|array|min:1',
            'file' => 'required|file|mimes:pdf|max:100480',
        ];

        $messages = [
            'nama_kontingen.required' => 'Nama kontingen harus diisi.',
            'fakultas.required' => 'Fakultas harus diisi.',
            'cabang.required'=>'cabang harus di centang minimal 1',
            'cabang.*.string' => 'Format cabang tidak valid.',
            'cabang.*.max' => 'Format cabang tidak valid.',
            'file.required' => 'File harus di-upload.',
            'file.file' => 'Upload harus berupa file.',
            'file.mimes' => 'File harus dalam format PDF.',
            'file.max' => 'File tidak boleh lebih besar dari 20MB.',
        ];

        $validator = Validator::make($requestData, $rules, $messages);

        // dd($cabang);
        if ($validator->fails()) {
            return redirect()->route('seni.form')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $cabang = implode(', ', $request->cabang);
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('seni/files'), $filename);


            Seni::create([
                'nama_kontingen' => $request->nama_kontingen,
                'fakultas' => $request->fakultas,
                'cabang'=>$cabang,
                'file' => $filename,
            ]);

            return redirect()->route('RegisterBerhasil')->with('success', 'Pendaftaran Cabang Seni  Berhasil');
        } catch (Exception $e) {

            return redirect()->route('seni.form')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $seni = Seni::findOrFail($id);

            $updateData = [
                'nama_kontingen' => $request->nama_kontingen,
                'fakultas' => $request->fakultas,
                'cabang' => $request->cabang,
                'status' => $request->status,
                'revisi' => $request->revisi,
            ];



            $seni->update($updateData);

            return redirect()->route('admin.seni')->with('success', 'Data berhasil diupdate!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate data.');
        }
    }
    public function delete($id)
    {

        $seni = Seni::find($id);


        if (!$seni) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }


        $file_path = public_path('seni/files/' . $seni->file);
        if (file_exists($file_path)) {
            unlink($file_path);
        }


        $seni->delete();


        return redirect()->route('admin.seni')->with('success', 'Data berhasil dihapus!');
    }

}
