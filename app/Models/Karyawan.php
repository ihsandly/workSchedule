<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = "karyawan";
    protected $fillable = ["nik", "nama_karyawan", "jabatan", "jenis_kelamin"];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
