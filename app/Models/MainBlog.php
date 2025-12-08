<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MainBlog extends Model
{
    protected $table ='mainblog';
    protected $fillable =[
        'idBlog',
        'idAdmin',
        'judul',
        'tglBlog',
        'kdTemplate',
        'tamnel',
        'visible'
    ];
    public static function showAllBlog() {
        return DB::table('mainblog')
        ->join('admin', 'mainblog.idAdmin', '=', 'admin.idAdmin')
        ->where('visible', '1')
        ->orderBy('tglBlog','desc')
        ->get([
            'idBlog',
            'mainblog.idAdmin',
            'username',
            'judul',
            'tglBlog',
            'tamnel'
        ]);
    }
    public static function getBlogByCreator($id) {
        return DB::table('mainblog')
        ->join('admin', 'mainblog.idAdmin', '=', 'admin.idAdmin')
        ->where('mainblog.idAdmin', $id)
        ->where('visible', '1')
        ->orderBy('tglBlog','desc')
        ->get([
            'idBlog',
            'mainblog.idAdmin',
            'username',
            'judul',
            'tglBlog',
            'tamnel'
        ]);
    }
    public static function getBlogById($id) {
        $kd=DB::table('mainblog')
        ->where('idBlog', $id)
        ->get('kdTemplate')
        ->first();

        switch ($kd->kdTemplate) {
            case '1':
                $template='template1';
                break;
            case '2':
                $template='template2';
                break;
            case '3':
                $template='template3';
                break;
            case '4':
                $template='template4';
                break;
            case '5':
                $template='template5';
                break;
            default:
                break;
        }

        return DB::table('mainblog')
        ->join($template, 'mainblog.idBlog', '=', $template.'.idBlog')
        ->join('admin', 'mainblog.idAdmin', '=', 'admin.idAdmin')
        ->where('mainblog.idBlog', $id)
        ->where('visible', '1')
        ->get();
    }
    public static function addMainBlog($data) {
        $id=DB::table('mainblog')
        ->insertGetId([
            'idAdmin'=>$data['idAdmin'],
            'judul'=>$data['judul'],
            'tglBlog'=>$data['tglBlog'],
            'kdTemplate'=>$data['kdTemplate'],
            'tamnel'=>$data['tamnel']
        ]);
        return $id;
    }
    public static function deleteBlog($id) {
        DB::table('mainblog')
        ->where('idBlog', $id)
        ->update(['visible'=>'0']);
    }
}
