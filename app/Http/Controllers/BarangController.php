<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function addIndex() {
        return view("addBarang");
    }

    public function post_addBarang(Request $request) {
        // dd($request);
        $request->validate([
            "barang_nama" => "required",
            "barang_deskripsi" => "required",
            "barang_harga" => "required|numeric|between:2.50,99.99",
            "barang_stok" => "required|numeric",
            "barang_kategori" => "required",
            "barang_gambar" => "required|mimes:png,jpg,jpeg|max:2048"
        ]);

        $imageName = $request->barang_gambar->getClientOriginalName();
        $uploadedImage = $request->file("barang_gambar");
        $uploadedImage->move(public_path().'/images/', $imageName);
        // $replacement = "." . $request->barang_gambar->extension();
        // dd(preg_replace("/\.tmp/", $replacement, $request->barang_gambar->path()));
        return redirect()->route("tambah-barang")->with(["barangAdded" => true, "imageName" => $imageName, "data" => $request->except(["_token", "barang_gambar"])]); 
        // return view("addBarangSuccess", ["imageName" => $imageName]); 
    }
}
