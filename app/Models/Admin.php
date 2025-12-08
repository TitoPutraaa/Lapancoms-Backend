<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Admin extends User
{
    use HasApiTokens;
    protected $table = 'admin';
    protected $primaryKey = 'idAdmin';
    protected $hidden = ['password'];
    protected $fillable=[
        'idAdmin',
        'username',
        'password',
        'role'
    ];
    public static function showAllAdmin() {
        return DB::table('admin')
        ->where('role', 'admin')
        ->where('status', '1')
        ->get([
            'idAdmin',
            'username',
            'password'
        ]);
    }
    public static function getAdminById($id)  {
        return DB::table('admin')
        ->where('idAdmin', $id)
        ->where('status', '1')
        ->get([
            'idAdmin',
            'username',
            'password'
        ]);
    }
    public static function addAdmin($data){
        DB::table('admin')
        ->insert([
            'username'=>$data['username'],
            'password'=>$data['password'],
            'role'=>'admin'
        ]);
    }
    public static function deleteAdmin($id) {
        DB::table('admin')
        ->where('idAdmin', $id)
        ->update(['status'=>'0']);
    }
}
