<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\defaultResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function index() {
        $data=Admin::showAllAdmin();
        return new defaultResource(true, 'data admin', $data);
    }
    public function show($id) {
        $data=Admin::getAdminById($id);
        return new defaultResource(true, 'detail admin', $data);
    }
    public function store(Request $request) {
        $request->validate([
            'username'=>'required|string',
            'password'=>'required|string'
        ]);
        $admin=[
            'username'=>$request->username,
            'password'=>Hash::make($request->password)
        ];
        Admin::addAdmin($admin);
        return new defaultResource(true, 'data berhasil ditambahkan', $admin);
    }
}
