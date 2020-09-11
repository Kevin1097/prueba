<?php

namespace App\Http\Controllers;

use App\Eloquent\Usuario;
use App\Eloquent\Usuario_auxiliar;
use App\Traits\ApiResponser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsuarioController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $data = Usuario::with('usuario_auxiliar')->get();
            /* $data=Usuario_auxiliar::all(); */
            return $this->successResponse($data, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return $this->successResponse($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules =
            [
                'email' => 'required|email',
                'password' => 'required|max:200',
                'nombres' => 'required|max:200',
                'apellidos' => 'required|max:200',
                'documento' => 'required|max:200',
                'genero' => 'required|integer|max:11',
                'pais_resi' => 'required|integer|max:11',
                'pais_naci' => 'required|integer|max:11',
                'fecha_naci' => 'required|date',
                'pais' => 'required|max:255',
                'numero' => 'required|max:20',
                'terminos_condiciones' => 'required|max:20',
                'tipo_usuario' => 'required|integer|max:11',
                'estado_usuario' => 'required|integer|max:11',
                'conocimiento' => 'required|max:3000',
                'fecha_coaching' => 'required|integer|max:11',
                'escuela' => 'required|max:300',
                'especialidad' => 'required|max:300',
                'estado' => 'required|max:10',
                'foto_perfil' => 'required|max:500',
                'correo_paypal' => 'required|max:100'
            ];
        $this->validate($request, $rules);
        $email = $request->email;
        $password = $request->password;
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $documento = $request->documento;
        $genero = $request->genero;
        $pais_resi = $request->pais_resi;
        $pais_naci = $request->pais_naci;
        $fecha_naci = $request->fecha_naci;
        $pais = $request->pais;
        $numero = $request->numero;
        $terminos_condiciones = $request->terminos_condiciones;
        $tipo_usuario = $request->tipo_usuario;
        $estado_usuario = $request->estado_usuario;
        $conocimiento = $request->conocimiento;
        $fecha_coaching = $request->fecha_coaching;
        $escuela = $request->escuela;
        $especialidad = $request->especialidad;
        $estado = $request->estado;
        $foto_perfil = $request->foto_perfil;
        $correo_paypal = $request->correo_paypal;
        /* 'id_usuario',
        'conocimiento',
        'fecha_coaching',
        'escuela',
        'especialidad',
        'estado',
        'foto_perfil',
        'correo_paypal' */
        /* 'email',
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
        'estado_usuario', */

        try {
            $data = Usuario::firstOrCreate(
                ['documento' => $documento, 'email' => $email],
                [
                    'email' => $email,
                    'password' => $password,
                    'nombres' => $nombres,
                    'apellidos' => $apellidos,
                    'documento' => $documento,
                    'genero' => $genero,
                    'pais_resi' => $pais_resi,
                    'pais_naci' => $pais_naci,
                    'fecha_naci' => $fecha_naci,
                    'pais' => $pais,
                    'numero' => $numero,
                    'terminos_condiciones' => $terminos_condiciones,
                    'tipo_usuario' => $tipo_usuario,
                    'estado_usuario' => $estado_usuario
                ]
            );
            $id_Usuario = $data->id_usuario;
            $data = Usuario_auxiliar::firstOrCreate(
                ['id_usuario' => $id_Usuario],
                [
                    'conocimiento' => $conocimiento,
                    'fecha_coaching' => $fecha_coaching,
                    'escuela' => $escuela,
                    'especialidad' => $apellidos,
                    'estado' => $estado,
                    'foto_perfil' => $foto_perfil,
                    'correo_paypal' => $correo_paypal
                ]
            );
            $data = Usuario::find($id_Usuario);
            return $this->successResponse($data, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return $this->successResponse($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            $data = Usuario::with('usuario_auxiliar')->find($id);
            /* $data=Usuario_auxiliar::all(); */
            return $this->successResponse($data, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return $this->successResponse($th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules =
            [
                'email' => 'required|email',
                'password' => 'required|max:200',
                'nombres' => 'required|max:200',
                'apellidos' => 'required|max:200',
                'documento' => 'required|max:200',
                'genero' => 'required|integer|max:11',
                'pais_resi' => 'required|integer|max:11',
                'pais_naci' => 'required|integer|max:11',
                'fecha_naci' => 'required|date',
                'pais' => 'required|max:255',
                'numero' => 'required|max:20',
                'terminos_condiciones' => 'required|max:20',
                'tipo_usuario' => 'required|integer|max:11',
                'estado_usuario' => 'required|integer|max:11',
                'conocimiento' => 'required|max:3000',
                'fecha_coaching' => 'required|integer|max:11',
                'escuela' => 'required|max:300',
                'especialidad' => 'required|max:300',
                'estado' => 'required|max:10',
                'foto_perfil' => 'required|max:500',
                'correo_paypal' => 'required|max:100'
            ];
        $this->validate($request, $rules);
        $email = $request->email;
        $password = $request->password;
        $nombres = $request->nombres;
        $apellidos = $request->apellidos;
        $documento = $request->documento;
        $genero = $request->genero;
        $pais_resi = $request->pais_resi;
        $pais_naci = $request->pais_naci;
        $fecha_naci = $request->fecha_naci;
        $pais = $request->pais;
        $numero = $request->numero;
        $terminos_condiciones = $request->terminos_condiciones;
        $tipo_usuario = $request->tipo_usuario;
        $estado_usuario = $request->estado_usuario;
        $conocimiento = $request->conocimiento;
        $fecha_coaching = $request->fecha_coaching;
        $escuela = $request->escuela;
        $especialidad = $request->especialidad;
        $estado = $request->estado;
        $foto_perfil = $request->foto_perfil;
        $correo_paypal = $request->correo_paypal;
        try {
            $usuario_auxiliar=null;
            $usuario_auxiliar = Usuario_auxiliar::where('id_usuario', '=', $id)->first();

            // Si existe
            if ($usuario_auxiliar!= null) {
                $usuario_auxiliar->conocimiento = $conocimiento;
                $usuario_auxiliar->fecha_coaching = $fecha_coaching;
                $usuario_auxiliar->escuela = $escuela;
                $usuario_auxiliar->especialidad = $especialidad;
                $usuario_auxiliar->estado = $estado;
                $usuario_auxiliar->foto_perfil = $foto_perfil;
                $usuario_auxiliar->correo_paypal = $correo_paypal;

                $usuario_auxiliar->save();
            }


            $usuario = Usuario::findOrFail($id);
            $usuario->email = $email;
            $usuario->password = $password;
            $usuario->nombres = $nombres;
            $usuario->apellidos = $apellidos;
            $usuario->documento = $documento;
            $usuario->genero = $genero;
            $usuario->pais_resi = $pais_resi;
            $usuario->pais_naci = $pais_naci;
            $usuario->fecha_naci = $fecha_naci;
            $usuario->pais = $pais;
            $usuario->numero = $numero;
            $usuario->terminos_condiciones = $terminos_condiciones;
            $usuario->tipo_usuario = $tipo_usuario;
            $usuario->estado_usuario = $estado_usuario;
            $usuario->save();
            return $this->successResponse($usuario, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return $this->successResponse($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $data = Usuario_auxiliar::where('id_usuario', $id)->delete();
            $data = Usuario::where('id_usuario', $id)->delete();
            return $this->successResponse($data, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return $this->successResponse($th->getMessage());
        }
    }
}
