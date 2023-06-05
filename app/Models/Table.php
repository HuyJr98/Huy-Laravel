<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\Table as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Table extends Authenticatable
{
    // use HasFactory;

    use HasApiTokens, Notifiable;

    protected $fillable = [
        'id',
        'username',
        'email',
        'password'
    ];
}
