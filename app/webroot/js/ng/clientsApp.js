var app = angular.module("appNews", []);
app.controller("ClientsController", ClientsController);
function ClientsController($scope, $http) {
    $http.get("http://local.dev/rest.api.news/clients.json").success(function (response) {
        //console.log(response);
        $scope.users = response;
    });
    $scope.edit = true;
    
    
    
    $scope.create = function () {
        $('#confirmModal').modal('show');
    };
    
    $scope.submit = function () {
        var clients = {};
        if ($scope.id) {
            clients = {
                "id": $scope.id,
                "username": $scope.username,
                "domain": $scope.domain,
                "password": $scope.password,
                "rc": $scope.rc,
                "mf": $scope.mf,
                "email": $scope.email,
                "adress": $scope.adress,
                "phone": $scope.phone,
                "fax": $scope.fax,
            
            
            };
        } else {
            clients = {
                "username": $scope.username,
                "domain": $scope.domain,
                "password": $scope.password,
                "rc": $scope.rc,
                "mf": $scope.mf,
                "email": $scope.email,
                "adress": $scope.adress,
                "phone": $scope.phone,
                "fax": $scope.fax,
            };
        }
        $http.post("http://local.dev/rest.api.news/clients/edit_client/", clients)
                .success(function (data) {
                    console.log(clients);
                    $scope.id = "";
                    $scope.username = "";
                    $scope.domain = "";
                    $scope.password= "";
                    $scope.rc= "";
                    $scope.email= "";
                    $scope.mf= "";
                    $scope.phone= "";
                    $scope.adress= "";
                    $scope.fax= "";
                    
                    $("#alert").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Succes!</strong>Opération réussie</div>');
                    $http.get("http://local.dev/rest.api.news/clients.json").success(function (response) {
                        console.log(response);
                        $scope.users = response;
                    });
                });
    };
    
    $scope.editClient = function (id) {
       
//        if (id === 'new') {
//            $scope.edit = true;
//        }
//        else {
//            $scope.edit = false;
//        }
 $('#confirmModal').modal('show');
        $http.get("http://local.dev/rest.api.news/clients/edit_client/" + id)
                .success(function (data) {
                    console.log(data);
                    $scope.id = data.Client.id;
                    console.log($scope.id);
                    $scope.username = data.Client.username;
                    $scope.domain = data.Domain.name;
                    $scope.rc = data.Client.rc;
                    $scope.password = data.Client.password;
                    $scope.mf = data.Client.mf;
                    $scope.fax = data.Client.fax;
                    $scope.phone = data.Client.phone;
                    $scope.adress = data.Client.adress;
                    $scope.email = data.Client.email;
                    
                    
                
                
                });

    };

    $scope.delete_Client = function (id) {
        var r = confirm("Êtes vous sur de vouloir supprimer ce client ?");
        if (r === true) {
            $http.delete("http://local.dev/rest.api.news/clients/delete_client/" + id).success(function (data) {
                console.log(data);
                window.location.href = 'http://local.dev/rest.api.news/Clients/add';
            });
        }
    };

}