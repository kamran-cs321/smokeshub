<?php

namespace App\Models;

//  use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
//    use HasFactory;
    protected $fillable = [
        'username', 'email'
    ];
    protected $table = 'admin_users';
    protected $hidden = array('password', 'token');

}
