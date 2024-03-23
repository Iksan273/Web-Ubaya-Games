<?php

namespace App\Http\Controllers;

use App\Models\Esport;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class EsportController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $esport = Esport::all()->map(function($data){
            $data->formatted_tanggal=Carbon::parse($data->created_at)->format('d-m-Y');
            return $data;
        });
        return view('Admin.esport.esport', [
            'esport' => $esport,
            'user' => $user
        ]);
    }
    public function edit($id)
    {

        $user = Auth::user();
        $esport = Esport::findOrFail($id);
        return view('Admin.esport.esport_edit', [
            'user' => $user,
            'esport' => $esport
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
            return redirect()->route('esport.form')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('esport/files'), $filename);

            Esport::create([
                'nama_kontingen' => $request->nama_kontingen,
                'fakultas' => $request->fakultas,
                'file' => $filename,
            ]);

            return redirect()->route('RegisterBerhasil')->with('success', 'Pendaftaran Cabang Esport Berhasil');
        } catch (Exception $e) {

            return redirect()->route('esport.form')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $esport = Esport::findOrFail($id);

            $updateData = [
                'nama_kontingen' => $request->nama_kontingen,
                'fakultas' => $request->fakultas,
                'status' => $request->status,
                'revisi' => $request->revisi,
            ];



            $esport->update($updateData);

            return redirect()->route('admin.esport')->with('success', 'Data berhasil diupdate!');
        } catch (Exception $e) {
            return redirect()->route('admin.esport')->with('error', 'Terjadi kesalahan saat mengupdate data.');
        }
    }


    public function delete($id)
    {

        $esport = Esport::find($id);


        if (!$esport) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }


        $file_path = public_path('esport/files/' . $esport->file);
        if (file_exists($file_path)) {
            unlink($file_path);
        }


        $esport->delete();


        return redirect()->route('admin.esport')->with('success', 'Data berhasil dihapus!');
    }
}
