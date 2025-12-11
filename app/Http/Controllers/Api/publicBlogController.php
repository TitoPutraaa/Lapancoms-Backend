<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\defaultResource;
use App\Models\MainBlog;
use App\Models\Template1;
use App\Models\Template2;
use App\Models\Template3;
use App\Models\Template4;
use App\Models\Template5;
use Illuminate\Http\Request;

class publicBlogController extends Controller
{
    public function index() {
        $data=MainBlog::showAllBlog();
        return new defaultResource(true, 'Semua data blog', $data);
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
}
