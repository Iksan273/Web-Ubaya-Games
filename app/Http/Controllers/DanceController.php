<?php

namespace App\Http\Controllers;

use App\Models\Dance;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dance = Dance::all()->map(function($data){
            $data->formatted_tanggal=Carbon::parse($data->created_at)->format('d-m-Y');
            return $data;
        });
        return view('Admin.dance.dance', [
            'dance' => $dance,
            'user' => $user
        ]);
    }
    public function edit($id)
    {

        $user = Auth::user();
        $dance = Dance::findOrFail($id);
        return view('Admin.dance.dance_edit', [
            'user' => $user,
            'dance' => $dance
        ]);
    }
    public function store(Request $request)
    {
        $requestData = $request->all();
        $rules = [
            'nama_kontingen' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:100480',
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
            return redirect()->route('dance.form')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('dance/files'), $filename);

            Dance::create([
                'nama_kontingen' => $request->nama_kontingen,
                'fakultas' => $request->fakultas,
                'file' => $filename,
            ]);

            return redirect()->route('RegisterBerhasil')->with('success', 'Pendaftaran Cabang Dance Berhasil');
        } catch (Exception $e) {

            return redirect()->route('dance.form')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $dance = Dance::findOrFail($id);

            $updateData = [
                'nama_kontingen' => $request->nama_kontingen,
                'fakultas' => $request->fakultas,
                'status' => $request->status,
                'revisi' => $request->revisi,
            ];



            $dance->update($updateData);

            return redirect()->route('admin.dance')->with('success', 'Data berhasil diupdate!');
        } catch (Exception $e) {
            return redirect()->route('admin.dance')->with('error', 'Terjadi kesalahan saat mengupdate data.');
        }
    }


    public function delete($id)
    {

        $dance = Dance::find($id);


        if (!$dance) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }


        $file_path = public_path('dance/files/' . $dance->file);
        if (file_exists($file_path)) {
            unlink($file_path);
        }


        $dance->delete();


        return redirect()->route('admin.dance')->with('success', 'Data berhasil dihapus!');
    }
}
