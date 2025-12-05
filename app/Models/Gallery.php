<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gallery extends Model
{
    protected $table = 'galery';
    protected $fillable=[
        'idGambar',
        'idAdmin',
        'judulGambar',
        'namaGambar',
        'visible'
    ];
    public static function getAllGambar() {
        return DB::table('galery')
        ->join('admin', 'galery.idAdmin', '=', 'admin.idAdmin')
        ->where('visible', '1')
        ->get([
            'idGambar',
            'galery.idAdmin',
            'judulGambar',
            'namaGambar',
            'username'
        ]);
    }
}
