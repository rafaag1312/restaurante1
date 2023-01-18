<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reserva;
use Illuminate\Database\Eloquent\Factories\CrossJoinSequence;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\first;

class ReservaController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    public function showAll()
    {
        return view("/misreservas")->with(["reservas"=>
            DB::table('reservas')
            ->crossJoin('horarios')
            ->crossJoin('menu')
            ->select('horarios.fecha', 'horarios.hora', 'reservas.num_personas', 'menu.nombre', 'menu.precio')
            ->where('id_cliente', '=', Auth::id())
            ->where('reservas.fecha_reserva', '=', DB::raw('horarios.id'))
            ->where('reservas.id_menu', '=', DB::raw('menu.id'))
            ->get()
        ]);
    }

    public function showFecha()
    {
        return view("/welcome")->with(["horarios"=>
            DB::table('horarios')
            ->select('fecha')
            ->where('estado','=','Disponible')
            ->groupBy('fecha')
            ->get()
        ]);
    }

    public function showReserva(Request $request)
    {
        $fecha = $request->input('fecha');
        return view("/reserva")->with(["horarios"=>
            DB::table('horarios')
            ->select('hora', 'id')
            ->where('fecha','=',$fecha)
            ->get()
    ]);
    }



    public function makereserva1(Request $request)
    {
        $comensales = $request->input('comensales');
        $hora = $request->input('hora');
        $menu = $request->input('menu');
        $tarjetas = $request->input('tarjeta');

        $id_menu = (DB::table('menu')
        ->select('id')
        ->where('nombre','=',$menu)
        ->get()
        );
        $idm = $id_menu->first()->id;

        $id = Auth::id();

        DB::table('reservas')->insert(
            array(
                   'id' => '0',
                   'id_cliente' => $id,
                   'id_invitado' => null,
                   'id_menu' => $idm,
                   'id_mesa' => '1',
                   'fecha_reserva' => $hora,
                   'num_tarjeta' => $tarjetas,
                   'num_personas' => $comensales,
            )
        );

        DB::update('update horarios set estado = "Reservado a cliente '."$id".'"'.' where id = '."$idm");
        return view("/final");
    }

    public function hacerReserva(Request $request)
    {
        $comensales = $request->input('comensales');
        $horaid = $request->input('id');
        $menu = $request->input('menu');
        $tarjetas = $request->input('tarjeta');
        $nombre = $request->input('name');
        $apellidos = $request->input('apellidos');
        $email = $request->input('email');
        $telefono = $request->input('tel');

        $id_menu = (DB::table('menu')
        ->select('id')
        ->where('nombre','=',$menu)
        ->get()
        );
        


        DB::table('invitados')->insert(
            array(
                   
                   'name' => $nombre,
                   'apellidos' => $apellidos,
                   'email' => $email,
                   'telefono' => $telefono,
            )
        );

       
        $idi = (DB::table('invitados')
        ->select('id')
        ->where('email','=',$email)
        ->get()
        );
        

        DB::table('reservas')->insert(
            array(
                   'id' => '0',
                   'id_cliente' => null,
                   'id_invitado' =>null,
                   'id_menu' => 1,
                   'id_mesa' => '1',
                   'fecha_reserva' => $horaid,
                   'num_tarjeta' => $tarjetas,
                   'num_personas' => $comensales,
            )
        );

        DB::update('update horarios set estado = "Reservado" where id = '."$horaid");
        return view("/reservarealizada");
    }

    public function cancelarReserva(){
        $id = Auth::id();
        DB::delete('delete from reservas where id_cliente = '.$id);
        DB::update('update horarios set estado = "Disponible" where estado = "Reservado a cliente '."$id".'"');
        return view("index");
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
    }
}
