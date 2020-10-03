<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $table  ='data_soal';
    public $primaryKey ='id_soal';
    public $timestamps ='true';
    protected $fillable =['soal'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
