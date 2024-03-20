<?php

namespace App\Http\Controllers;

use App\Models\Futsal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class FutsalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $futsal = Futsal::all();
        return view('admin.futsal.futsal', [
            'futsal' => $futsal,
            'user' => $user
        ]);
    }
    public function edit($id)
    {

        $user = Auth::user();
        $futsal = Futsal::findOrFail($id);
        return view('admin.futsal.futsal_edit', [
            'user' => $user,
            'esport' => $futsal
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
            return redirect()->route('futsal.form')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('futsal/files'), $filename);

            Futsal::create([
                'nama_kontingen' => $request->nama_kontingen,
                'fakultas' => $request->fakultas,
                'file' => $filename,
            ]);

            return redirect()->route('futsal.index')->with('success', 'Data berhasil disimpan.');
        } catch (Exception $e) {

            return redirect()->route('futsal.index')->with('error', 'Terjadi kesalahan saat menyimpan data.');
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
            $futsal = Futsal::findOrFail($id);

            $updateData = [
                'nama_kontingen' => $request->nama_kontingen,
                'fakultas' => $request->fakultas,
            ];

            // Hanya update file jika ada file baru yang diunggah
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('futsal/files'), $filename);
                $updateData['file'] = $filename;
            }

            $futsal->update($updateData);

            return redirect()->route('admin.futsal')->with('success', 'Data berhasil diupdate!');
        } catch (Exception $e) {
            return redirect()->route('admin.futsal')->with('error', 'Terjadi kesalahan saat mengupdate data.');
        }
    }


    public function delete($id)
    {

        $futsal = Futsal::find($id);


        if (!$futsal) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }


        $file_path = public_path('futsal/files/' . $futsal->file);
        if (file_exists($file_path)) {
            unlink($file_path);
        }


        $futsal->delete();


        return redirect()->route('admin.futsal')->with('success', 'Data berhasil dihapus!');
    }
}
