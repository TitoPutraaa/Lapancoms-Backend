<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\defaultResource;
use App\Models\LandingPage;
use Illuminate\Http\Request;

class publicLpController extends Controller
{
    public function index() {
        $data=LandingPage::showData();
        return new defaultResource(true, 'data landing page', $data);
    }
}
