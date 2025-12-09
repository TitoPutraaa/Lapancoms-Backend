<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Template1 extends Model
{
    public static function getBlog($id) {
        return DB::table('mainblog')
        ->join('template1', 'mainblog.idBlog', '=', 'template1.idBlog')
        ->join('admin', 'mainblog.idAdmin', '=', 'admin.idAdmin')
        ->where('mainblog.idBlog', $id)
        ->where('visible', '1')
        ->get([
            'mainblog.idBlog',
            'mainblog.idAdmin',
            'username',
            'judul',
            'tglBlog',
            'tamnel',
            'img1',
            'text1'
        ]);
    }
    public static function addBlog($data) {
        $id=DB::table('mainblog')
        ->insertGetId([
            'idAdmin'=>$data['idAdmin'],
            'judul'=>$data['judul'],
            'tglBlog'=>$data['tglBlog'],
            'kdTemplate'=>$data['kdTemplate'],
            'tamnel'=>$data['tamnel']
        ]);
        DB::table('template1')
        ->insert([
            'idBlog'=>$id,
            'img1'=>$data['img1'],
            'text1'=>$data['text1'],
        ]);
    }
}
