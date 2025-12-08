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
    public static function getGambarByCreator($id) {
        return DB::table('galery')
        ->join('admin', 'galery.idAdmin', '=', 'admin.idAdmin')
        ->where('galery.idAdmin', $id)
        ->where('visible', '1')
        ->get([
            'idGambar',
            'galery.idAdmin',
            'judulGambar',
            'namaGambar',
            'username'
        ]);
    }
    public static function getFileGambar($id) {
        return DB::table('galery')
        ->where('idGambar', $id)
        ->get('namaGambar')
        ->first();
    }
    public static function getGambarById($id) {
        return DB::table('galery')
        ->join('admin', 'galery.idAdmin', '=', 'admin.idAdmin')
        ->where('idGambar', $id)
        ->where('visible', '1')
        ->get([
            'idGambar',
            'galery.idAdmin',
            'judulGambar',
            'namaGambar',
            'username'
        ]);
    }
    public static function addGambar($data)  {
        return DB::table('galery')
        ->insert([
            'idAdmin'=>$data['idAdmin'],
            'judulGambar'=>$data['judulGambar'],
            'namaGambar'=>$data['namaGambar']
        ]);
    }
    public static function deleteGambar($id) {
        DB::table('galery')
        ->where('idGambar', $id)
        ->update(['visible'=>'0']);
    }
}
