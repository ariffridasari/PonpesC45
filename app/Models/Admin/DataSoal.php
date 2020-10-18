<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSoal extends Model
{
    protected $table  ='data_soal';
    public $primaryKey ='id_soal';
    public $timestamps ='true';
    protected $fillable =['soal'];

    public function answer(){
        return $this->belongsTo('App\Models\Admin\Jawaban','id_soal');
    }
}
