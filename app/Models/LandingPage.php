<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LandingPage extends Model
{
    protected $table = 'landingpage';
    protected $fillable=[
        'idPage',
        'idAdmin',
        'home_h1',
        'home_p1',
        'about_h1',
        'about_p1',
        'map_h1',
        'map_p1',
        'footer_p1',
        'instagram',
        'facebook',
        'youtube'
    ];
    public static function showData() {
        return DB::table('landingpage')
        ->where('idPage', '1')
        ->get([
            'idPage',
            'idAdmin',
            'home_h1',
            'home_p1',
            'about_h1',
            'about_p1',
            'map_h1',
            'map_p1',
            'footer_p1',
            'instagram',
            'facebook',
            'youtube'
        ]);
    }
    public static function hh1($data) {
        DB::table('landingpage')
        ->where('idPage', '1')
        ->update([
            'home_h1'=>$data['home_h1']
        ]);
    }
    public static function hp1($data) {
        DB::table('landingpage')
        ->where('idPage', '1')
        ->update([
            'home_p1'=>$data['home_p1']
        ]);
    }
    public static function ah1($data) {
        DB::table('landingpage')
        ->where('idPage', '1')
        ->update([
            'about_h1'=>$data['about_h1']
        ]);
    }
    public static function ap1($data) {
        DB::table('landingpage')
        ->where('idPage', '1')
        ->update([
            'about_p1'=>$data['about_p1']
        ]);
    }
    public static function mh1($data) {
        DB::table('landingpage')
        ->where('idPage', '1')
        ->update([
            'map_h1'=>$data['map_h1']
        ]);
    }
    public static function mp1($data) {
        DB::table('landingpage')
        ->where('idPage', '1')
        ->update([
            'map_p1'=>$data['map_p1']
        ]);
    }
    public static function fp1($data) {
        DB::table('landingpage')
        ->where('idPage', '1')
        ->update([
            'footer_p1'=>$data['footer_p1']
        ]);
    }
    public static function upLink($data) {
        DB::table('landingpage')
        ->where('idPage', '1')
        ->update([
            'instagram'=>$data['instagram'],
            'facebook'=>$data['facebook'],
            'youtube'=>$data['youtube']
        ]);
    }
}
