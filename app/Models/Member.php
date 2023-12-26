<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'no_hp',
        'gender',
        'alamat' ,
    ];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
