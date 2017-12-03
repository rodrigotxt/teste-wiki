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
                        
                        @if(Session::get('message'))
                        <div class="alert alert-info">
                        {{ Session::get('message') }}
                        </div>
                        @endif

                        {{-- Se tiver clientes no banco --}}

                        @if (count($todosclientes) > 0) 
                            <div class="row">
                                <div class="col-md-12 custyle">
                                <h3>Clientes Cadastrados</h3>
                                <table class="table table-striped custab">
                                <thead>
                                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-xs pull-right"><b>+</b> Novo Cliente</a>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                    @foreach($todosclientes as $cliente)
                                        <tr>
                                            <td>{{ $cliente -> id }}</td>
                                            <td><a href="{{ route('clientes.index') }}/{{ $cliente -> id }}">{{ $cliente -> nome_cliente }}</a></td>
                                            <td>{{ $cliente -> cpf_cliente }}</td>
                                            <td class="text-center">
                                            <form class="form-inline" action="{{ route('clientes.index') }}/{{ $cliente->id }}" method="POST">
                                                <a class='btn btn-info btn-xs' href="{{ route('clientes.index') }}/{{ $cliente -> id }}/edit"><span class="glyphicon glyphicon-edit"></span> Editar</a> 

                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button class="btn btn-xs btn-danger btnRemove" type="submit" name="name" value="Apagar">
                                                    <span class="glyphicon glyphicon-remove" title="Excluir cliente"></span>Apagar
                                                </button>
                                            </form>

                                                <a href="{{ route('clientes.index') }}/{{$cliente->id}}/destroy" class="hidden btn btn-danger btn-xs" title="Deseja realmente excluir o Cliente?" data-toggle="confirmation" data-singleton="true" data-placement="top" data-popout="true"><span class="glyphicon glyphicon-remove" title="Excluir cliente"></span>Excluir</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                </div>
                            </div>
                        @else
                            <h3>Nenhum cliente cadastrado.</h3>
                            <br>
                            <a href="{{ route('clientes.create') }}" class="btn btn-success">Inserir Novo</a>
                        @endif

                        </div>

                        <div class="tab-pane" id="tab2">
                            <h3>Novo Cliente</h3>
                            <form class="" action="{{ route('clientes.index') }}" method="POST">
                              <div class="form-group">
                                <label for="nome_cliente">Nome:</label>
                                <input type="text" name="nome_cliente" value="" placeholder="Nome" class="form-control">
                                {{ ($errors->has('nome_cliente')) ? $errors->first('nome_cliente') : '' }}
                              </div>
                                
                                <div class="form-group">                                    
                                <label for="dt_nasc_cliente">Data Nascimento:</label>
                                <input type="date" name="dt_nasc_cliente" value="" placeholder="08/08/2018" class="form-control">
                                </div>
                                
                                <div class="form-group">                                    
                                <label for="rg_cliente">RG:</label>
                                <input type="text" name="rg_cliente" value="" placeholder="" class="form-control">
                                </div>
                                
                                <div class="form-group">                                    
                                <label for="telefone_cliente">Telefone:</label>
                                <input id="telefone" type="text" name="telefone_cliente" value="" placeholder="Telefone" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                <label for="cpf_cliente">CPF:</label>
                                <input id="cpf" name="cpf_cliente" placeholder="CPF" class="form-control">
                                {{ ($errors->has('cpf_cliente')) ? $errors->first('cpf_cliente') : '' }}<br>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary">Salvar Dados</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection