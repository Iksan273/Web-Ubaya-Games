<?php

namespace App\Http\Controllers;

use App\Models\Cerpen;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CerpenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Auth::user();
        $cerpen=Cerpen::all();

        return view('Admin.seni.cerpen',[
            'user'=>$user,
            'cerpen'=>$cerpen
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $rules = [
            'nama' => 'required|string|max:255',
            'nrp' => 'required|string|max:255',
            'kontingen' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:100480',
        ];

        $messages = [
            'nama_kontingen.required' => 'Nama kontingen harus diisi.',
            'fakultas.required' => 'Fakultas harus diisi.',
            'nrp.required' => 'Fakultas harus diisi.',
            'file.required' => 'File harus di-upload.',
            'file.file' => 'Upload harus berupa file.',
            'file.mimes' => 'File harus dalam format PDF.',
            'file.max' => 'File tidak boleh lebih besar dari 20MB.',
        ];

        $validator = Validator::make($requestData, $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('cerpen.form')
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('cerpen/files'), $filename);

            Cerpen::create([
                'nama' => $request->nama,
                'nrp' => $request->nrp,
                'kontingen' => $request->kontingen,
                'file' => $filename,
            ]);
            Log::info('Data berhasil disimpan ke database.');

            return redirect()->route('pengumpulan.berhasil')->with('success', 'Pengumpulan Cerpen Berhasil');
        } catch (Exception $e) {
            Log::error('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
            return redirect()->route('cerpen.form')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cerpen $cerpen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function delete($id)
    {

        $cerpen = Cerpen::find($id);


        if (!$cerpen) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }


        $file_path = public_path('cerpen/files/' . $cerpen->file);
        if (file_exists($file_path)) {
            unlink($file_path);
        }


        $cerpen->delete();


        return redirect()->route('admin.cerpen')->with('success', 'Data berhasil dihapus!');
    }





}
