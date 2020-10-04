<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Jawaban;

class DataSoal extends Model
{
    protected $table  ='data_soal';
    public $primaryKey ='id_soal';
    public $timestamps ='true';
    protected $fillable =['soal'];

    public function jawaban(){
        return $this->hasMany(Jawaban::class,'id_soal');
    }
}
