<?php

namespace App\Http\Controllers;

use App\Models\Komik;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class KomikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Auth::user();
        $komik=Komik::all();

        return view('Admin.seni.komik',[
            'user'=>$user,
            'komik'=>$komik
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
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:100480',
        ];

        $messages = [
            'nama_kontingen.required' => 'Nama kontingen harus diisi.',
            'fakultas.required' => 'Fakultas harus diisi.',
            'nrp.required' => 'Fakultas harus diisi.',
            'file.required' => 'File harus di-upload.',
            'file.image' => 'Upload harus berupa gambar.',
            'file.mimes' => 'File harus dalam format Jpeg,Png,jpg,gif.',
            'file.max' => 'File tidak boleh lebih besar dari 100MB.',
        ];

        $validator = Validator::make($requestData, $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('komik.form')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('komik/files'), $filename);

            Komik::create([
                'nama' => $request->nama,
                'nrp' => $request->nrp,
                'kontingen' => $request->kontingen,
                'foto_komik' => $filename,
            ]);
            Log::info('Data berhasil disimpan ke database.');

            return redirect()->route('pengumpulan.berhasil')->with('success', 'Pengumpulan Komik Berhasil');
        } catch (Exception $e) {
            Log::error('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
            return redirect()->route('komik.form')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Komik $komik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komik $komik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Komik $komik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {

        $komik = Komik::find($id);


        if (!$komik) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }


        $file_path = public_path('komik/files/' . $komik->foto_komik);
        if (file_exists($file_path)) {
            unlink($file_path);
        }


        $komik->delete();


        return redirect()->route('admin.komik')->with('success', 'Data berhasil dihapus!');
    }
}
