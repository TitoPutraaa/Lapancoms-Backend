<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\defaultResource;
use App\Models\LandingPage;
use Illuminate\Http\Request;

class LpController extends Controller
{
    public function index() {
        $data=LandingPage::showData();
        return new defaultResource(true, 'data landing page', $data);
    }
    public function up_s1h1(Request $request) {
        $data=[
            'home_h1'=>$request->home_h1
        ];
        LandingPage::hh1($data);
        return new defaultResource(true, 'update berhasil', null);
    }
    public function up_s1p1(Request $request) {
        $data=[
            'home_p1'=>$request->home_p1
        ];
        LandingPage::hp1($data);
        return new defaultResource(true, 'update berhasil', null);
    }
    public function up_s2h1(Request $request) {
        $data=[
            'about_h1'=>$request->about_h1
        ];
        LandingPage::ah1($data);
        return new defaultResource(true, 'update berhasil', null);
    }
    public function up_s2p1(Request $request) {
        $data=[
            'about_p1'=>$request->about_p1
        ];
        LandingPage::ap1($data);
        return new defaultResource(true, 'update berhasil', null);
    }
    public function up_s3h1(Request $request) {
        $data=[
            'map_h1'=>$request->map_h1
        ];
        LandingPage::mh1($data);
        return new defaultResource(true, 'update berhasil', null);
    }
    public function up_s3p1(Request $request) {
        $data=[
            'map_p1'=>$request->map_p1
        ];
        LandingPage::mp1($data);
        return new defaultResource(true, 'update berhasil', null);
    }
    public function up_fp1(Request $request) {
        $data=[
            'footer_p1'=>$request->footer_p1
        ];
        LandingPage::fp1($data);
        return new defaultResource(true, 'update berhasil', null);
    }
    public function up_link(Request $request) {
        $data=[
            'instagram'=>$request->instagram,
            'facebook'=>$request->facebook,
            'youtube'=>$request->youtube
        ];
        LandingPage::upLink($data);
        return new defaultResource(true, 'update berhasil', null);
    }
}
