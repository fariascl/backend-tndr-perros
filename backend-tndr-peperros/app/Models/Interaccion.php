<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Perro;

class Interaccion extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'interaccion';
    
    public $timestamps = true;
    public $fillable = [
        "perro_interesado_id",
        "perro_candidato_id",
        "preferencia"
    ];

    public function perro(){
        return $this->belongsTo(Perro::class, "perro_interesado_id", "perro_candidato_id");
    }
}
