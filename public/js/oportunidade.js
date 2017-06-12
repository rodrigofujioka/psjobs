'use strict';
var app = angular.module('cdg', []);

// Service
app.factory('oportunidadeService', function ($http) {
    return {
        lista: function () {
            return $http.get('/api/oportunidades');
        },
        cadastra: function (data) {
            return $http.post('/api/oportunidades', data);
        },
        edita: function (data) {
            var id = data.id;
            delete data.id;
            return $http.put('/api/oportunidade/' + id, data);
        },
        exclui: function (id) {
            return $http.delete('/api/oportunidade/' + id)
        }
    }
});

// Controller
app.controller('oportunidadeController', function ($scope, oportunidadeService) {
    $scope.listar = function () {
        oportunidadeService.lista().success(function (data) {
            $scope.oportunidades = data;
        });
    }

    $scope.editar = function (data) {
        $scope.oportunidade = data;
        $('#myModal').modal('show');
    }

    $scope.salvar = function () {
        if ($scope.oportunidade.id) {
            oportunidadeService.edita($scope.oportunidade).success(function (res) {
                $scope.listar();
                $('#myModal').modal('hide');
            });
        } else {
            oportunidadeService.cadastra($scope.oportunidade).success(function (res) {
                $scope.listar();
                $('#myModal').modal('hide');
            });
        }
    }

    $scope.excluir = function (data) {
        if (confirm("Tem certeza que deseja excluir?")) {
            oportunidadeService.exclui(data.id).success(function (res) {
                $scope.listar();
            });
        }
    }
});