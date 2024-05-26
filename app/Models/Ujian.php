<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ujian';

    protected $guarded = [];

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function tentor()
    {
        return $this->belongsTo(Tentor::class, 'id_tentor', 'id_tentor')->withTrashed();
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_ujian', 'id_ujian');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
