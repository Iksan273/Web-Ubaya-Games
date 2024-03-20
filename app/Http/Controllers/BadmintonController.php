<?php

namespace App\Http\Controllers;

use App\Models\Badminton;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BadmintonController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $badminton = Badminton::all();
        return view('admin.badminton.badminton', [
            'badminton' => $badminton,
            'user' => $user
        ]);
    }
    public function edit($id)
    {

        $user = Auth::user();
        $badminton = Badminton::findOrFail($id);
        return view('admin.badminton.badminton_edit', [
            'user' => $user,
            'voli' => $badminton
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
            return redirect()->route('badminton.form')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('badminton/files'), $filename);

            Badminton::create([
                'nama_kontingen' => $request->nama_kontingen,
                'fakultas' => $request->fakultas,
                'file' => $filename,
            ]);

            return redirect()->route('badminton.index')->with('success', 'Data berhasil disimpan.');
        } catch (Exception $e) {

            return redirect()->route('badminton.index')->with('error', 'Terjadi kesalahan saat menyimpan data.');
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
            $badminton = Badminton::findOrFail($id);

            $updateData = [
                'nama_kontingen' => $request->nama_kontingen,
                'fakultas' => $request->fakultas,
            ];

            // Hanya update file jika ada file baru yang diunggah
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('badminton/files'), $filename);
                $updateData['file'] = $filename;
            }

            $badminton->update($updateData);

            return redirect()->route('admin.badminton')->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->route('admin.badminton')->with('error', 'Terjadi kesalahan saat mengupdate data.');
        }
    }


    public function delete($id)
    {

        $badminton = Badminton::find($id);


        if (!$badminton) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }


        $file_path = public_path('badminton/files/' . $badminton->file);
        if (file_exists($file_path)) {
            unlink($file_path);
        }


        $badminton->delete();


        return redirect()->route('admin.voli')->with('success', 'Data berhasil dihapus!');
    }
}
