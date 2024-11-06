<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;

    protected $table="password_reset_tokens";

    protected $fillable=[
        "email",
        "token",
        "created_at"
    ];

    protected $guarded=['updated_at'];

    protected $hidden = ['created_at','updated_at'];
}
