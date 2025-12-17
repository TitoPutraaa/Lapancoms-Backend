<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Template3 extends Model
{
    public static function getBlog($id) {
        return DB::table('mainblog')
        ->join('template3', 'mainblog.idBlog', '=', 'template3.idBlog')
        ->join('admin', 'mainblog.idAdmin', '=', 'admin.idAdmin')
        ->where('mainblog.idBlog', $id)
        ->where('visible', '1')
        ->get([
            'mainblog.idBlog',
            'mainblog.idAdmin',
            'username',
            'judul',
            'kdTemplate',
            'tglBlog',
            'tamnel',
            'img1',
            'img2',
            'img3',
            'text1',
            'text2',
            'text3',
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
        DB::table('template3')
        ->insert([
            'idBlog'=>$id,
            'img1'=>$data['img1'],
            'img2'=>$data['img2'],
            'img3'=>$data['img3'],
            'text1'=>$data['text1'],
            'text2'=>$data['text2'],
            'text3'=>$data['text3'],
        ]);
    }
}
