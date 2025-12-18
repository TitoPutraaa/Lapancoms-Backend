<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\defaultResource;
use App\Models\Admin;
use App\Models\MainBlog;
use App\Models\Template1;
use App\Models\Template2;
use App\Models\Template3;
use App\Models\Template4;
use App\Models\Template5;
use Carbon\Carbon;
use Illuminate\Http\Request;

class blogController extends Controller
{
    public function index(Request $request) {
        $admin=$request->user();
        if ($admin->role==='super-admin') {
            $data=MainBlog::showAllBlog();
            return new defaultResource(true, 'Semua data blog', $data);
        }else{
            $id=$admin->idAdmin;
            $data=MainBlog::getBlogByCreator($id);
            return new defaultResource(true, 'Semua data blog', $data);
        }
    }
    public function show($id) {
        $kd=MainBlog::getKdBlog($id);
        switch ($kd->kdTemplate) {
            case '1':
                $data=Template1::getBlog($id);
                break;
            case '2':
                $data=Template2::getBlog($id);
                break;
            case '3':
                $data=Template3::getBlog($id);
                break;
            case '4':
                $data=Template4::getBlog($id);
                break;
            case '5':
                $data=Template5::getBlog($id);
                break;
            default:
                break;
            }
        return new defaultResource(true, 'data blog', $data);
    }
    public function store(Request $request) {
        $template=$request->kdTemplate;
        $idAdmin=$request->user()->idAdmin;
        $time=Carbon::now();
        $data1=[];
        switch ($template) {
            case '1':
                
                $fimg1=$request->file('img1');
                $img1=$fimg1->hashname();
                $fimg1->storeAs('template', $img1, 'public');

                $data=[
                    'idAdmin'=>$idAdmin,
                    'judul'=>$request->judul,
                    'tglBlog'=>$time,
                    'kdTemplate'=>$request->kdTemplate,
                    'tamnel'=>$img1,
                    'img1'=>$img1,
                    'text1'=>$request->text1
                ];
                Template1::addBlog($data);
                break;
            case '2':
                
                $fimg1=$request->file('img1');
                $img1=$fimg1->hashname();
                $fimg1->storeAs('template', $img1, 'public');

                $fimg2=$request->file('img2');
                $img2=$fimg2->hashname();
                $fimg2->storeAs('template', $img2, 'public');

                $data=[
                    'idAdmin'=>$idAdmin,
                    'judul'=>$request->judul,
                    'tglBlog'=>$time,
                    'kdTemplate'=>$request->kdTemplate,
                    'tamnel'=>$img1,
                    'img1'=>$img1,
                    'img2'=>$img2,
                    'text1'=>$request->text1,
                    'text2'=>$request->text2
                ];
                Template2::addBlog($data);
                break;
            case '3':
                
                $fimg1=$request->file('img1');
                $img1=$fimg1->hashname();
                $fimg1->storeAs('template', $img1, 'public');

                $fimg2=$request->file('img2');
                $img2=$fimg2->hashname();
                $fimg2->storeAs('template', $img2, 'public');

                $fimg3=$request->file('img3');
                $img3=$fimg3->hashname();
                $fimg3->storeAs('template', $img3, 'public');

                $data=[
                    'idAdmin'=>$idAdmin,
                    'judul'=>$request->judul,
                    'tglBlog'=>$time,
                    'kdTemplate'=>$request->kdTemplate,
                    'tamnel'=>$img1,
                    'img1'=>$img1,
                    'img2'=>$img2,
                    'img3'=>$img3,
                    'text1'=>$request->text1,
                    'text2'=>$request->text2,
                    'text3'=>$request->text3,
                    'text4'=>$request->text4
                ];
                Template3::addBlog($data);
                break;
            case '4':
                
                $fimg1=$request->file('img1');
                $img1=$fimg1->hashname();
                $fimg1->storeAs('template', $img1, 'public');

                $fimg2=$request->file('img2');
                $img2=$fimg2->hashname();
                $fimg2->storeAs('template', $img2, 'public');

                $fimg3=$request->file('img3');
                $img3=$fimg3->hashname();
                $fimg3->storeAs('template', $img3, 'public');

                $fimg4=$request->file('img4');
                $img4=$fimg4->hashname();
                $fimg4->storeAs('template', $img4, 'public');

                $data=[
                    'idAdmin'=>$idAdmin,
                    'judul'=>$request->judul,
                    'tglBlog'=>$time,
                    'kdTemplate'=>$request->kdTemplate,
                    'tamnel'=>$img1,
                    'img1'=>$img1,
                    'img2'=>$img2,
                    'img3'=>$img3,
                    'img4'=>$img4,
                    'text1'=>$request->text1,
                    'text2'=>$request->text2,
                    'text3'=>$request->text3,
                    'text4'=>$request->text4
                ];
                Template4::addBlog($data);
                break;
            case '5':
                
                $fimg1=$request->file('img1');
                $img1=$fimg1->hashname();
                $fimg1->storeAs('template', $img1, 'public');

                $fimg2=$request->file('img2');
                $img2=$fimg2->hashname();
                $fimg2->storeAs('template', $img2, 'public');

                $data=[
                    'idAdmin'=>$idAdmin,
                    'judul'=>$request->judul,
                    'tglBlog'=>$time,
                    'kdTemplate'=>$request->kdTemplate,
                    'tamnel'=>$img1,
                    'img1'=>$img1,
                    'img2'=>$img2,
                    'text1'=>$request->text1,
                    'text2'=>$request->text2
                ];
                Template5::addBlog($data);
                break;
            default:
                break;
        }
        Admin::plusBlog($idAdmin);
        return new defaultResource(true, 'blog berhasil di post', $data1);
    }
    public function destroy($id) {
        MainBlog::deleteBlog($id);
        return new defaultResource(true, 'blog berhasil dihapus', null);
    }
}
