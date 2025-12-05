<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\defaultResource;
use App\Models\Gallery;
use Illuminate\Http\Request;

class galleryController extends Controller
{
    public function index() {
        $data=Gallery::getAllGambar();
        return new defaultResource(true, 'Data Gambar', $data);
    }
}
