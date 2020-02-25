@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Registros de Usuários</h3>
    <div class="row justify-content-center">
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data Nasc</th>
                    <th scope="col">Email</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Data Cadastro</th>
                </tr>
            </thead>
            <tbody>
            @foreach($relatorio as $relatorio)
                <tr>
                    <th scope="row">{{$relatorio->id_reg}}</th>
                    <td>{{$relatorio->nome}}</td>
                    <td>{{$relatorio->data_nasc}}</td>
                    <td>{{$relatorio->email}}</td>
                    <td>{{$relatorio->estado}}</td>
                    <td>{{$relatorio->cidade}}</td>
                    <td>{{$relatorio->endereco}}</td>
                    <td>{{$relatorio->data_cadastro}}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection
