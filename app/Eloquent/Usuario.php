<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent\Usuario_auxiliar;


class Usuario extends Model
{
    //Filtrado
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = [
        'email',
        'password',
        'nombres',
        'apellidos',
        'documento',
        'genero',
        'pais_resi',
        'pais_naci',
        'fecha_naci',
        'pais',
        'numero',
        'terminos_condiciones',
        'tipo_usuario',
        'estado_usuario',
    ];

    protected $hidden = [
        'password',
    ];
    public $timestamps = false;

   /*  public function usuario_auxiliar(){
        return $this->hasOne(Usuario_auxiliar::class,'id_usuario','id_usuario');
    } */
    public function usuario_auxiliar(){
        return $this->belongsTo(Usuario_auxiliar::class, 'id_usuario');
    }

}