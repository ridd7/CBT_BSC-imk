<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'siswa';
    protected $guarded = [];

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_siswa', 'id_siswa');
    }
}
