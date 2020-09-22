<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table  ='posts';
    public $primaryKey ='id';
    public $timestamps ='true';
    protected $fillable =['no_pendaftaran','nama_peserta','alamat'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
