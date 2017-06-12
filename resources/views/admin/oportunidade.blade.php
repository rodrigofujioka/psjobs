@extends('layouts.app-admin')

@section('content')
    <div class="container" ng-init="listar()">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Painel Administrativo - PSJOBS</div>

                    <div class="panel-body">
                        <div class="form-group row add">
                            <div class="col-md-12">
                                <button type="button" data-toggle="modal" data-target="#create-item"
                                        class="btn btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span> Adicionar Vaga
                                </button>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Data Início</th>
                                <th>Data Fim</th>
                                <th class="text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="oportunidade in oportunidades | filter: pesquisar">
                                <td>@{{ oportunidade.id }}</td>
                                <td>@{{ oportunidade.titulo }}</td>
                                <td>@{{ oportunidade.dt_inicio }}</td>
                                <td>@{{ oportunidade.dt_fim }}</td>
                                <td class="text-center">
                                    <button class="edit-modal btn btn-info" ng-click="editar(pessoa)">
                                        <span class="glyphicon glyphicon-edit"> Editar</span>
                                    </button>
                                    <button class="edit-modal btn btn-danger" ng-click="excluir(pessoa)">
                                        <span class="glyphicon glyphicon-trash"> Excluir</span>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Create Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Adicionar nova vaga</h4>
                    <div class="modal-body">
                        <form class="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control"
                                       ng-model="oportunidade.nome"/>
                            </div>
                            <div class="form-group">
                                <label for="resumo">Resumo</label>
                                <textarea class="form-control" rows="8" name="resumo" id="resumo"
                                          ng-model="oportunidade.resumo"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="dt_inicio">Data Inicio</label>
                                <input type="text" name="dt_inicio" id="dt_inicio" class="form-control"
                                       ng-model="oportunidade.dt_inicio"/>
                            </div>
                            <div class="form-group">
                                <label for="dt_fim">Data Fim</label>
                                <input type="text" name="dt_fim" id="dt_fim" class="form-control"
                                       ng-model="oportunidade.dt_fim"/>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" ng-click="salvar()">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="node_modules/angular/angular.js"></script>
    <script type="text/javascript" src="public/js/oportunidade.js"></script>
@endsection
