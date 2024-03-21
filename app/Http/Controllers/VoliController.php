<?php

namespace App\Http\Controllers;

use App\Models\Voli;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VoliController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $volis = Voli::all();
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

            return redirect()->route('voli.form')->with('success', 'Data berhasil disimpan.');
        } catch (Exception $e) {

            return redirect()->route('voli.form')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function update(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'nama_kontingen' => 'required',
        //     'fakultas' => 'required',
        //     'file' => 'sometimes|file|mimes:pdf,doc,docx|max:2048',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        try {
            $voli = Voli::findOrFail($id);

            $updateData = [
                'nama_kontingen' => $request->nama_kontingen,
                'fakultas' => $request->fakultas,
            ];

            // Hanya update file jika ada file baru yang diunggah
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('voli/files'), $filename);
                $updateData['file'] = $filename;
            }

            $voli->update($updateData);

            return redirect()->route('admin.voli')->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->route('admin.voli')->with('error', 'Terjadi kesalahan saat mengupdate data.');
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
