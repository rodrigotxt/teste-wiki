<!DOCTYPE html>
<html lang="pt-BR" ng-app="clientesRecords">
    <head>
        <title>Clientes CRUD com AngularJS</title>

        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') ?>" rel="stylesheet">

        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script src="<?= asset('js/angular.min.js') ?>"></script>
        <script src="<?= asset('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') ?>"></script>
        <script src="<?= asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-input-masks/4.1.0/angular-input-masks-dependencies.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-input-masks/4.1.0/angular-input-masks.br.min.js"></script>


        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('js/app.js') ?>"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0/angular-messages.min.js"></script>
        <script src="<?= asset('app/controllers/clientes.js') ?>"></script>

    </head>
    <body>

        <div class="container">
        <h3>Registro de Clientes</h3>
        <div  ng-controller="clientesController">

            <!-- Table-to-load-the-data Part -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data Nascimento</th>
                        <th>RG</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)"><span class=" glyphicon glyphicon-plus " title="Excluir cliente"></span>Novo cliente</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="cliente in clientes">
                        <td>{{ cliente.id }}</td>
                        <td>{{ cliente.nome_cliente }}</td>
                        <td>{{ cliente.dt_nasc_cliente }}</td>
                        <td>{{ cliente.rg_cliente }}</td>
                        <td>{{ cliente.cpf_cliente }}</td>
                        <td>{{ cliente.telefone_cliente }}</td>
                        <td>
                            <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', cliente.id)">Editar</button>
                            <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(cliente.id)">Apagar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmclientes" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nome</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="nome_cliente" name="nome_cliente" placeholder="Nome" value="{{nome_cliente}}" 
                                        ng-model="cliente.nome_cliente" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmclientes.nome_cliente.$invalid && frmclientes.nome_cliente.$touched">Nome é obrigatório</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Data Nascimento</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="dt_nasc_cliente" name="dt_nasc_cliente" placeholder="Data Nascimento" value="{{dt_nasc_cliente}}" 
                                        ng-model="cliente.dt_nasc_cliente" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmclientes.dt_nasc_cliente.$invalid && frmclientes.dt_nasc_cliente.$touched">Data nascimento é obrigatória</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">RG</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="rg_cliente" name="rg_cliente" placeholder="RG" value="{{rg_cliente}}" 
                                        ng-model="cliente.rg_cliente" ng-required="true">
                                    <span class="help-inline" 
                                        ng-show="frmclientes.rg_cliente.$invalid && frmclientes.rg_cliente.$touched">Número do RG é necessário</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">CPF</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="cpf_cliente" name="cpf_cliente" placeholder="CPF" value="{{cpf_cliente}}" 
                                        ng-model="cliente.cpf_cliente" ng-required="true" ui-br-cpf-mask>
                                    <span class="help-inline" 
                                        ng-show="frmclientes.cpf_cliente.$invalid && frmclientes.cpf_cliente.$touched">CPF é necessário</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Telefone</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="telefone_cliente" name="telefone_cliente" placeholder="Tel" value="{{telefone_cliente}}" 
                                        ng-model="cliente.telefone_cliente" ng-required="true" ui-br-phone-number>
                                    <span class="help-inline" 
                                        ng-show="frmclientes.telefone_cliente.$invalid && frmclientes.telefone_cliente.$touched">Telefone é necessário</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmclientes.$invalid">Salvar Dados</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    </body>
</html>