<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Template1 extends Model
{
    public static function addBlog($data) {
        DB::table('template1')
        ->insert([
            'idBlog'=>$data['idBlog'],
            'img1'=>$data['img1'],
            'text1'=>$data['text1'],
        ]);
    }
}
