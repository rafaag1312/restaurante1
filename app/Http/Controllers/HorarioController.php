<?php

namespace App\Http\Controllers;

use console;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HorarioController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $result=Horario::select('fecha')
      ->where('estado','Disponible')
      ->groupBy('fecha')
      ->get();

      $data = array();

      foreach($result as $row){

        $data[] = array(

            'id' => $row["id"],
            'title' => "",
            'start' => $row["fecha"],
            'end' => $row["fecha"]
        
        );
      }
        return response()->json($data);       
    }

  public function  ajax (Request $request){
    
    switch ($request->type){

            case 'showHours':
                $result = Horario::where([
                    ['fecha','=',$request->get('fecha')],
                    ['estado','Disponible']
                ])->get();

            $horas = array();

            foreach ($result as $row){
                $horas [] = array(
                    'id' => $row['id'],
                    'hora'=> date('H:i',strtotime($row["hora"]))

                );
            } 

            return response()->json($horas);
       
            break;

    }
  }

  public function idfecha(Request $request) {
    $id = $request->input('hora_id');
    return response()->json($id);
    
    
   
  }

  public function otraVista($id)
    {

           
            return view("/reserva")->with(['id'=>$id])->with(["menu"=>
                DB::table('menu')
                ->select('nombre', 'precio')
                ->get()
            ])->with(["cliente"=>
                DB::table('users')
                ->select('name', 'apellidos', 'email', 'telefono')
                ->where('id', '=', Auth::id())
                ->get()
            ])->with(["tarjetas"=>
                DB::table('tarjetas')
                ->select('num_tarjeta')
                ->where('id_cliente', '=', Auth::id())
                ->get()
            ]);
        

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
