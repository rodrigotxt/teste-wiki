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
                            <h3><span class=" glyphicon glyphicon-user "></span> Detalhes do Cliente</h3>
                            <ul class="list-group">
								<h4 class="list-group-item list-group-item-success"> {{ $detailpage->nome_cliente }}</h4>
								<li class="list-group-item"><span class=" glyphicon glyphicon-chevron-right "></span> Data Nascimento: {{ $detailpage->dt_nasc_cliente }}</li>
								<li class="list-group-item"><span class=" glyphicon glyphicon-phone-alt "></span> Telefone: {{ $detailpage->telefone_cliente }}</li>
								<li class="list-group-item"><span class=" glyphicon glyphicon-chevron-right "></span> RG: {{ $detailpage->rg_cliente }}</li>
								<li class="list-group-item"><span class=" glyphicon glyphicon-chevron-right "></span> CPF: {{ $detailpage->cpf_cliente }}</li>
								<li class="list-group-item"><span class=" glyphicon glyphicon-calendar "></span> Cadastro: {{ date('d/m/Y', strtotime($detailpage->created_at)) }}</li>
							</ul>

							<form class="form-inline" action="{{ route('clientes.index') }}/{{ $detailpage->id }}" method="POST">
							<a href="javascript:history.back(-1);" class="btn btn-default">Voltar</a>
                                                <a class='btn btn-info' href="{{ route('clientes.index') }}/{{ $detailpage -> id }}/edit"><span class="glyphicon glyphicon-edit"></span> Editar</a> 

                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button class="btn btn-danger btnRemove" type="submit" name="name" value="Apagar">
                                                    <span class="glyphicon glyphicon-remove" title="Excluir cliente"></span>Apagar
                                                </button>
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