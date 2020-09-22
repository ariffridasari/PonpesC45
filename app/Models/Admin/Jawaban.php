<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Algoritma;


class Jawaban extends Model
{
    use HasFactory;
    protected $table  ='data_jawaban';
    public $primaryKey ='id_jwb';
    // public $foregeinKey ='id_soal';
    public $timestamps ='true';
    protected $fillable =['id_jwb','id_soal','kode','kunci'];

    public function jawaban()
    {
        return $this ->belongsTo(Algoritma::class,'id_soal','id_soal');
    }
}
