<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table  ='data_jawaban';
    public $primaryKey ='id_soal';
    // public $foregeinKey ='id_soal';
    public $timestamps ='true';
    protected $fillable =['id_soal','kode','kunci'];

    public function question()
    {
        return $this->hasMany('App\Models\Admin\DataSoal','id_soal');
    }
}
