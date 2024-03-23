<?php

namespace App\Http\Controllers;

use App\Models\Voli;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VoliController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $volis = Voli::all()->map(function ($voli) {

            $voli->formatted_tanggal = Carbon::parse($voli->created_at)->format('d-m-Y');
            return $voli;
        });
        return view('admin.voli.voli', [
            'volis' => $volis,
            'user' => $user
        ]);
    }
    public function edit($id)
    {

        $user = Auth::user();
        $voli = Voli::findOrFail($id);
        return view('admin.voli.voli_edit', [
            'user' => $user,
            'voli' => $voli
        ]);
    }
    public function store(Request $request)
    {
        $requestData = $request->all();
        $rules = [
            'nama_kontingen' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:20480',
        ];

        $messages = [
            'nama_kontingen.required' => 'Nama kontingen harus diisi.',
            'fakultas.required' => 'Fakultas harus diisi.',
            'file.required' => 'File harus di-upload.',
            'file.file' => 'Upload harus berupa file.',
            'file.mimes' => 'File harus dalam format PDF.',
            'file.max' => 'File tidak boleh lebih besar dari 20MB.',
        ];

        $validator = Validator::make($requestData, $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('voli.form')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('voli/files'), $filename);

            Voli::create([
                'nama_kontingen' => $request->nama_kontingen,
                'fakultas' => $request->fakultas,
                'file' => $filename,
            ]);

            return redirect()->route('RegisterBerhasil')->with('success', 'Pendaftaran Cabang Voli Berhasil');
        } catch (Exception $e) {

            return redirect()->route('voli.form')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function update(Request $request, $id)
{
    try {
        $voli = Voli::findOrFail($id);

        $updateData = [
            'nama_kontingen' => $request->nama_kontingen,
            'fakultas' => $request->fakultas,
            'status' => $request->status,
            'revisi' => $request->revisi,
        ];



        $voli->update($updateData);

        return redirect()->route('admin.voli')->with('success', 'Data berhasil diupdate!');
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate data.');
    }
}



    public function delete($id)
    {

        $voli = Voli::find($id);


        if (!$voli) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }


        $file_path = public_path('voli/files/' . $voli->file);
        if (file_exists($file_path)) {
            unlink($file_path);
        }


        $voli->delete();


        return redirect()->route('admin.voli')->with('success', 'Data berhasil dihapus!');
    }
}
