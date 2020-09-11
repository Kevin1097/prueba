<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;


class Usuario_auxiliar extends Model
{
    //Filtrado
    protected $table = 'usuarios_auxiliar';
    protected $primaryKey = 'id_reg_auxiliar';
    protected $fillable = [
        'id_usuario',
        'conocimiento',
        'fecha_coaching',
        'escuela',
        'especialidad',
        'estado',
        'foto_perfil',
        'correo_paypal'
    ];

    protected $hidden = [
        'id_reg_auxiliar',
    ];
    public $timestamps = false;
    /* public function usuario(){
        return $this->belongsTo(Usuario::class, 'id_usuario');
    } */
    public function usuario(){
        return $this->hasOne(usuario::class,'id_usuario','id_usuario');
    }

}