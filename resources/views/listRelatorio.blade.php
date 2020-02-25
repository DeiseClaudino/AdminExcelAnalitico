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
            @foreach($relatorio as $rel)
                <tr>
                    <th scope="row">{{$rel->id_reg}}</th>
                    <td>{{$rel->nome}}</td>
                    <td>{{$rel->data_nasc}}</td>
                    <td>{{$rel->email}}</td>
                    <td>{{$rel->estado}}</td>
                    <td>{{$rel->cidade}}</td>
                    <td>{{$rel->endereco}}</td>
                    <td>{{$rel->data_cadastro}}</td>
                </tr> 
            @endforeach

            </tbody>
        </table>
        <nav class="page-navigation">
            {{ $relatorio->links() }}
        </nav>
    </div>
</div>
@endsection
