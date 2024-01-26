<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone'];

    public function client()
    {
        return $this->hasOne(Client::class);
    }

}
