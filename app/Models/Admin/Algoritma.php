<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Jawaban;

class Algoritma extends Model
{
    use HasFactory;
    protected $table  ='data_soal';
    public $primaryKey ='id_soal';
    public $timestamps ='true';
    protected $fillable =['id_soal','soal'];

    public function soal(){
        return $this->hasMany(Jawaban::class,'id_soal');
    }

    
}
