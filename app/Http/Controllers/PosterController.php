<?php

namespace App\Http\Controllers;

use App\Models\Poster;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Auth::user();
        $poster=Poster::all();

        return view('Admin.seni.poster',[
            'user'=>$user,
            'poster'=>$poster
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
            return redirect()->route('poster.form')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('poster/files'), $filename);

            Poster::create([
                'nama' => $request->nama,
                'nrp' => $request->nrp,
                'kontingen' => $request->kontingen,
                'file' => $filename,
            ]);

            return redirect()->route('pengumpulan.berhasil')->with('success', 'Pengumpulan Poster Berhasil');
        } catch (Exception $e) {

            return redirect()->route('poster.form')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Poster $poster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poster $poster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poster $poster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {

        $poster= Poster::find($id);


        if (!$poster) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }


        $file_path = public_path('poster/files/' . $poster->file);
        if (file_exists($file_path)) {
            unlink($file_path);
        }


        $poster->delete();


        return redirect()->route('admin.poster')->with('success', 'Data berhasil dihapus!');
    }

}
