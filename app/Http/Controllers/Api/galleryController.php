<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\defaultResource;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class galleryController extends Controller
{
    public function index(Request $request) {
        $admin=$request->user();
        if ($admin->role==='super-admin') {
            $data=Gallery::getAllGambar();
            return new defaultResource(true, 'Semua Data Gambar', $data);
        }else{
            $id=$admin->idAdmin;
            $data=Gallery::getGambarByCreator($id);
            return new defaultResource(true, 'Data Gambar Admin', $data);
        }
    }
    public function show($id) {
        $data=Gallery::getGambarById($id);
        return new defaultResource(true, 'Detail Data Gambar', $data);
    }
    public function store(Request $request) {
        $admin=$request->user();
        
        $nmFile=$request->file('namaGambar');
        $nmFile->storeAs('galery', $nmFile->hashName(), 'public');
        $data=[
            'idAdmin'=>$admin->idAdmin,
            'judulGambar'=>$request->judulGambar,
            'namaGambar'=>$nmFile->hashName(),
        ];
        Gallery::addGambar($data);
        return new defaultResource(true, 'Data berhasil dimasukan', $data);
    }
    public function destroy($id) {
        // $gambar=Gallery::getFileGambar($id);
        // $nmfile=$gambar->namaGambar;
        // Storage::disk('public')->delete('galery/'.$nmfile);
        Gallery::deleteGambar($id);
        return new defaultResource(true, 'gambar berhasil dihapus', null);
    }
}
