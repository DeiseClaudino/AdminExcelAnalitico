@extends('layouts.app')
@section('content')
@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
<div class="container">
    <h3>Usuários Cadastrados por Ano</h3>
    <div class="row justify-content-center">
        <div style="width: 50%">
            {!! $relatorioChart->container() !!}
        </div>
    </div>
</div>
@endsection