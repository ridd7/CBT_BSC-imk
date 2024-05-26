<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Tentor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tentor';
    protected $guarded = [];

    public function ujian()
    {
        return $this->hasMany(Ujian::class, 'id_tentor', 'id_tentor');
    }
}
