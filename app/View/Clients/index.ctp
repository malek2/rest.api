



<div class="container" ng-controller="ClientsController">

    <h3>Clients</h3>

    <table class="table table-bordered table-condensed table-hover table-striped table-responsive">
        <thead><tr>

                <th>Name</th>
                <th>Domain Name</th>
                <th>mot de passe</th>
                <th>raison social</th>
                <th>matricule fiscale</th>
                <th>email</th>
                <th>adress</th>
                <th>phone</th>
                <th>fax</th>
                <th>action</th>

            </tr></thead>
        <tbody>
            <tr ng-repeat="u in users">
                <td>{{ u.Client.username}}</td>
                <td>{{ u.Domain.name}}</td>
                <td>{{ u.Client.password}}</td>
                <td>{{ u.Client.rc}}</td>
                <td>{{ u.Client.mf}}</td>
                <td>{{ u.Client.email}}</td>
                <td>{{ u.Client.adress}}</td>
                <td>{{ u.Client.phone}}</td>
                <td>{{ u.Client.fax}}</td>
                <td>
                    <button class="btn" ng-click="edit_Client(u.Client.id)">
                        <span class="glyphicon glyphicon-pencil"></span>modifier
                    </button>
             
                
                    <button class="btn" ng-click="delete_Client(u.Client.id)">
                        <span class="glyphicon glyphicon-remove"></span>supprimer
                    </button>
                   </td>

            </tr>
        </tbody>

    </table>
    </div>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
            var app = angular.module("appNews", []);
            app.controller("ClientsController", ClientsController);
            function ClientsController($scope,$http) {
                $http.get("http://local.dev/rest.api.news/clients.json").success(function(response) {
                    console.log(response);
                    $scope.users = response;
                });
            }
        <?php echo $this->Html->scriptEnd(); ?>
<?php echo $this->Html->script('ng/clientsApp', array('inline' => false)); ?>