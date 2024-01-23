<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['is_deleted','user_id']; //is_deleted için  dışarıdan veri atanmasına izin verilmiş demektir.

    public function scopeNotDeleted($query){
        return $query->where('is_deleted',0); //Böylece is_deleted=0 olana NotDeleted sorgusu ismini verdik artık direk ismiyle kullanıcaz.

    }

    public function user(){
        return $this->belongsTo(User::class); //Bir kitap bir kullanıcı tarafından eklenir.Bire bir ilişki.
    }
}
