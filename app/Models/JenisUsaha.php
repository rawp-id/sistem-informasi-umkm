<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUsaha extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function umkms()
    {
        return $this->hasMany(Umkm::class);
    }
}
