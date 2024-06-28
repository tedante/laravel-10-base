<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $table = 'password_reset_tokens';

    protected $primaryKey = 'email';
    
    public $timestamps = true;
    
    public $incrementing = false;

    protected $fillable = [
        'email', 'token', 'expired_at'
    ];

    protected $hidden = [
        'token'
    ];
}
