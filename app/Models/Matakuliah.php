<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matakuliah;

class Matakuliah extends Model
{
    protected $table='matakuliah'; 
    
    public function mahasiswa_matakuliah(){
        return $this->belongsToMany(Mahasiswa_Matakuliah::class);
    }
}
