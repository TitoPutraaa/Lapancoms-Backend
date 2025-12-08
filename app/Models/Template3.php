<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Template3 extends Model
{
    public static function addBlog($data) {
        DB::table('template3')->insert([
            'idBlog'=>$data['idBlog'],
            'img1'=>$data['img1'],
            'img2'=>$data['img2'],
            'img3'=>$data['img3'],
            'text1'=>$data['text1'],
            'text2'=>$data['text2'],
            'text3'=>$data['text3'],
            'text4'=>$data['text4']
        ]);
    }
}
