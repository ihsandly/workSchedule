<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;
    protected $table = "schedule";
    protected $fillable = [];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
