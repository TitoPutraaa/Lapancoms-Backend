<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Template2 extends Model
{
    public static function addBlog($data) {
        DB::table('template2')->insert([
            'idBlog'=>$data['idBlog'],
            'img1'=>$data['img1'],
            'img2'=>$data['img2'],
            'text1'=>$data['text1'],
            'text2'=>$data['text2'],
        ]);
    }
}
