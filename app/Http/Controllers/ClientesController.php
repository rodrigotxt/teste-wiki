<?php

// use App\Clientes; 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Clientes;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $clientes =  Clientes::all();
        if (request()->is('api/*')) {
            return $clientes;
        }
        return view('clientes.index',['todosclientes' => $clientes]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome_cliente' => 'required',
            'cpf_cliente' => 'required',
        ]);
        
        $clientes = new clientes;
        $clientes->nome_cliente = $request->nome_cliente;
        
        $clientes->dt_nasc_cliente = $clientes->date_mysql($request->dt_nasc_cliente);

        $clientes->rg_cliente = $request->rg_cliente;
        $clientes->telefone_cliente = $request->telefone_cliente;
        $clientes->cpf_cliente = $request->cpf_cliente;
        $clientes->save();
        return redirect('clientes')->with('message', 'Cliente inserido com sucesso!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = Clientes::find($id);
        if(!$clientes){
            abort(404);
        }
        if (request()->is('api/*')) {
            return $clientes;
        }
        return view('clientes.details')->with('detailpage', $clientes);        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = Clientes::find($id);
        if(!$clientes){
            abort(404);
        }
        return view('clientes.edit')->with('detailpage', $clientes);
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
        $this->validate($request, [
            'nome_cliente' => 'required',
            'dt_nasc_cliente' => 'required',
            'cpf_cliente' => 'required',
        ]);
        
        $clientes = clientes::find($id);
        $clientes->nome_cliente = $request->nome_cliente;
        $clientes->dt_nasc_cliente = $request->dt_nasc_cliente;
        $clientes->rg_cliente = $request->rg_cliente;
        $clientes->telefone_cliente = $request->telefone_cliente;
        $clientes->cpf_cliente = $request->cpf_cliente;
        $clientes->save();
        return redirect('clientes')->with('message', 'Cliente editado com sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = clientes::find($id);
        $clientes->delete();
        return redirect('clientes')->with('message', 'Cliente apagado com sucesso!');
    }

}
