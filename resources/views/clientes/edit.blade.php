@extends('layouts.app')

@section('content')




<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Painel de Clientes</h3>
                    <span class="pull-right">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class="active hidden"><a href="#tab1" data-toggle="tab">Ver Todos</a></li>
                        </ul>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content">                        
                        <div class="tab-pane active" id="tab1">
                            <h3>Editar cliente</h3>
                            <form action="{{ route('clientes.index') }}/{{ $detailpage->id }}" method="POST">
                              <div class="form-group">
                                <label for="nome_cliente">Nome:</label>
                                <input type="text" name="nome_cliente" value="{{ $detailpage->nome_cliente }}" placeholder="Nome" class="form-control">
                                {{ ($errors->has('nome_cliente')) ? $errors->first('nome_cliente') : '' }}
                              </div>
                                
                                <div class="form-group">                                    
                                <label for="dt_nasc_cliente">Data Nascimento:</label>
                                <input type="date" name="dt_nasc_cliente" value="{{ $detailpage->dt_nasc_cliente }}" placeholder="08/08/2018" class="form-control">
                                </div>
                                
                                <div class="form-group">                                    
                                <label for="rg_cliente">RG:</label>
                                <input type="text" name="rg_cliente" value="{{ $detailpage->rg_cliente }}" placeholder="" class="form-control">
                                </div>
                                
                                <div class="form-group">                                    
                                <label for="telefone_cliente">Telefone:</label>
                                <input id="telefone" type="text" name="telefone_cliente" value="{{ $detailpage->telefone_cliente }}" placeholder="Telefone" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                <label for="cpf_cliente">CPF:</label>
                                <input id="cpf" name="cpf_cliente" placeholder="CPF" class="form-control" value="{{ $detailpage->cpf_cliente }}">
                                {{ ($errors->has('cpf_cliente')) ? $errors->first('cpf_cliente') : '' }}<br>
                                </div>
                                <input type="hidden" name="_method" value="put">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" name="name" value="Salvar" class="btn btn-primary">
                            <a href="{{ route('clientes.index') }}" class="btn btn-default">Voltar</a>
                        </form>

                        <!-- 
                        /*
                                    $table->string('nome_cliente', 100);
                                    $table->date('dt_nasc_cliente');
                                    $table->string('rg_cliente', 50);
                                    $table->integer('cpf_cliente');
                                    $table->string('telefone_cliente', 16);
                        */ -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection