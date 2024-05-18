<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $foto = Foto::all();

        return view('Admin.seni.foto', [
            'user' => $user,
            'foto' => $foto
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
            'foto1_kategori1' => 'required|image|mimes:jpeg,png,jpg,gif|max:100480',
            'foto1_kategori2' => 'required|image|mimes:jpeg,png,jpg,gif|max:100480',
        ];

        $messages = [
            'nama_kontingen.required' => 'Nama kontingen harus diisi.',
            'fakultas.required' => 'Fakultas harus diisi.',
            'nrp.required' => 'Fakultas harus diisi.',
            'foto1_kategori1.required' => 'File harus di-upload.',
            'foto1_kategori1.file' => 'Upload harus berupa gambar.',
            'foto1_kategori1.mimes' => 'File harus dalam format gambar.',
            'foto1_kategori1.max' => 'File tidak boleh lebih besar dari 20MB.',
            'foto1_kategori2.required' => 'File harus di-upload.',
            'foto1_kategori2.file' => 'Upload harus berupa gambar.',
            'foto1_kategori2.mimes' => 'File harus dalam format gambar.',
            'foto1_kategori2.max' => 'File tidak boleh lebih besar dari 20MB.',
        ];

        $validator = Validator::make($requestData, $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('foto.form')
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $filename1 = null;
            if ($request->hasFile('foto1_kategori1')) {
                $file1 = $request->file('foto1_kategori1');
                $filename1 = time() . '_' . $file1->getClientOriginalName();
                $file1->move(public_path('foto/files'), $filename1);
            }

            $filename2 = null;
            if ($request->hasFile('foto2_kategori1')) {
                $file2 = $request->file('foto2_kategori1');
                $filename2 = time() . '_' . $file2->getClientOriginalName();
                $file2->move(public_path('foto/files'), $filename2);
            }

            $filename3 = null;
            if ($request->hasFile('foto3_kategori1')) {
                $file3 = $request->file('foto3_kategori1');
                $filename3 = time() . '_' . $file3->getClientOriginalName();
                $file3->move(public_path('foto/files'), $filename3);
            }

            $filename4 = null;
            if ($request->hasFile('foto4_kategori1')) {
                $file4 = $request->file('foto4_kategori1');
                $filename4 = time() . '_' . $file4->getClientOriginalName();
                $file4->move(public_path('foto/files'), $filename4);
            }

            $filename5 = null;
            if ($request->hasFile('foto5_kategori1')) {
                $file5 = $request->file('foto5_kategori1');
                $filename5 = time() . '_' . $file5->getClientOriginalName();
                $file5->move(public_path('foto/files'), $filename5);
            }

            $filename6 = null;
            if ($request->hasFile('foto1_kategori2')) {
                $file6 = $request->file('foto1_kategori2');
                $filename6 = time() . '_' . $file6->getClientOriginalName();
                $file6->move(public_path('foto/files'), $filename6);
            }

            $filename7 = null;
            if ($request->hasFile('foto2_kategori2')) {
                $file7 = $request->file('foto2_kategori2');
                $filename7 = time() . '_' . $file7->getClientOriginalName();
                $file7->move(public_path('foto/files'), $filename7);
            }

            $filename8 = null;
            if ($request->hasFile('foto3_kategori2')) {
                $file8 = $request->file('foto3_kategori2');
                $filename8 = time() . '_' . $file8->getClientOriginalName();
                $file8->move(public_path('foto/files'), $filename8);
            }

            $filename9 = null;
            if ($request->hasFile('foto4_kategori2')) {
                $file9 = $request->file('foto4_kategori2');
                $filename9 = time() . '_' . $file9->getClientOriginalName();
                $file9->move(public_path('foto/files'), $filename9);
            }

            $filename10 = null;
            if ($request->hasFile('foto5_kategori2')) {
                $file10 = $request->file('foto5_kategori2');
                $filename10 = time() . '_' . $file10->getClientOriginalName();
                $file10->move(public_path('foto/files'), $filename10);
            }

            // Simpan data ke dalam database
            Foto::create([
                'nama' => $request->nama,
                'nrp' => $request->nrp,
                'kontingen' => $request->kontingen,
                'foto1_kategori1' => $filename1 ,
                'foto2_kategori1' => $filename2 ,
                'foto3_kategori1' => $filename3 ,
                'foto4_kategori1' => $filename4 ,
                'foto5_kategori1' => $filename5 ,

                'foto1_kategori2' => $filename6 ,
                'foto2_kategori2' => $filename7 ,
                'foto3_kategori2' => $filename8 ,
                'foto4_kategori2' => $filename9 ,
                'foto5_kategori2' => $filename10 ,

            ]);
            Log::info('Data berhasil disimpan ke database.');

            return redirect()->route('pengumpulan.berhasil')->with('success', 'Pengumpulan Fotografi Berhasil');
        } catch (Exception $e) {
            Log::error('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
            return redirect()->route('foto.form')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foto $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            // Cari entri foto berdasarkan ID
            $foto = Foto::find($id);

            // Hapus file foto dari direktori penyimpanan jika ada
            if ($foto) {
                for ($i = 1; $i <= 5; $i++) {
                    $filename = $foto->{'foto' . $i . '_kategori1'};
                    if ($filename) {
                        $filepath = public_path('foto/files/' . $filename);
                        if (file_exists($filepath)) {
                            unlink($filepath); // Hapus file dari direktori
                        }
                    }

                    $filename = $foto->{'foto' . $i . '_kategori2'};
                    if ($filename) {
                        $filepath = public_path('foto/files/' . $filename);
                        if (file_exists($filepath)) {
                            unlink($filepath); // Hapus file dari direktori
                        }
                    }
                }

                // Hapus entri foto dari database
                $foto->delete();

                return redirect()->route('admin.foto')->with('success', 'Foto berhasil dihapus.');
            } else {
                return redirect()->route('admin.foto')->with('error', 'Foto tidak ditemukan.');
            }
        } catch (Exception $e) {
            return redirect()->route('admin.foto')->with('error', 'Terjadi kesalahan saat menghapus foto.');
        }
    }
}
