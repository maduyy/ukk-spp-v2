<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spp extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];

    public function siswas(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }
    public function tunggakans(): HasMany
    {
        return $this->hasMany(Tunggakan::class);
    }
}
