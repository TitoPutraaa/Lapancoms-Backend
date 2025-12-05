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
    protected $fillable=[
        'idAdmin',
        'username',
        'password',
        'role'
    ];
    public static function getAdmin($usn) {
        return DB::table('admin')
        ->where('username', $usn)
        ->where('status', '1')
        ->get([
            'idAdmin',
            'username',
            'password'
        ]);
    }
}
