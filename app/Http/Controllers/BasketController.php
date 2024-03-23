<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class BasketController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $basket = Basket::all();
        $basket = Basket::all()->map(function($data){
            $data->formatted_tanggal=Carbon::parse($data->created_at)->format('d-m-Y');
            return $data;
        });
        return view('admin.basket.basket', [
            'basket' => $basket,
            'user' => $user
        ]);
    }
    public function edit($id)
    {

        $user = Auth::user();
        $basket = Basket::findOrFail($id);
        return view('admin.basket.basket_edit', [
            'user' => $user,
            'basket' => $basket
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
            return redirect()->route('basket.form')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('basket/files'), $filename);

            Basket::create([
                'nama_kontingen' => $request->nama_kontingen,
                'fakultas' => $request->fakultas,
                'file' => $filename,
            ]);

            return redirect()->route('basket.form')->with('success', 'Data berhasil disimpan.');
        } catch (Exception $e) {

            return redirect()->route('basket.form')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $basket = Basket::findOrFail($id);

            $updateData = [
                'nama_kontingen' => $request->nama_kontingen,
                'fakultas' => $request->fakultas,
                'status' => $request->status,
                'revisi' => $request->revisi,
            ];


            $basket->update($updateData);

            return redirect()->route('admin.basket')->with('success', 'Data berhasil diupdate!');
        } catch (Exception $e) {
            return redirect()->route('admin.basket')->with('error', 'Terjadi kesalahan saat mengupdate data.');
        }
    }


    public function delete($id)
    {

        $basket = Basket::find($id);


        if (!$basket) {
            return redirect()->back()->with('error', 'Data tidak ditemukan!');
        }


        $file_path = public_path('basket/files/' . $basket->file);
        if (file_exists($file_path)) {
            unlink($file_path);
        }


        $basket->delete();


        return redirect()->route('admin.basket')->with('success', 'Data berhasil dihapus!');
    }
}
