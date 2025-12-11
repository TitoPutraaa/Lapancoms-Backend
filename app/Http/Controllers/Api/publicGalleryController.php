<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\defaultResource;
use App\Models\Gallery;
use Illuminate\Http\Request;

class publicGalleryController extends Controller
{
    public function index() {
        $data=Gallery::getAllGambar();
        return new defaultResource(true, 'Semua Data Gambar', $data);
    }
    public function show($id) {
        $data=Gallery::getGambarById($id);
        return new defaultResource(true, 'Detail Data Gambar', $data);
    }
}
