app.controller('clientesController', function($filter, $scope, $http, API_URL) {

    //buscar todos clientes através da API
    $http.get(API_URL + "clientes")
            .then(function(response) {
                $scope.clientes = response.data;
            });
    

    //mostrar formulário no modal
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Inserir novo Cliente";
                break;
            case 'edit':
                $scope.form_title = "Detalhes do cliente";
                $scope.id = id;
                $http.get(API_URL + 'clientes/' + id)
                        .then(function(response) {
                            console.log(response.data);
                            $scope.cliente = response.data;
                        });
                break;
            default:
                break;
        }
        $('#myModal').modal('show');
    }

    //salvar novo / atualizar existente
    $scope.save = function(modalstate, id) {
        var url = API_URL + "clientes";
        
        //append cliente id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.cliente),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {
            console.log(response);
            location.reload();
        }), function errorCallback(response) {
    // called asynchronously if an error occurs
    // or server returns response with an error status.
            console.log(response);
            alert('Um erro ocorreu. Por favor verifique o log para detalhes');
        }};
    

    //deletar registro
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Deseja deletar?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'clientes/' + id
            }).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Não foi possível apagar');
                    });
        } else {
            return false;
        }
    }
});