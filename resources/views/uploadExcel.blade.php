@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3> Upload Excel</h3>
            <br>
            <p>Olá Administrador, para manter os relatórios de usuários sempre atualizados, 
            faça o upload de sua planilha clicando na àrea abaixo, mas <strong>ATENÇÃO</strong> 
            os formatos aceitos são: <strong>xlsx, xls, csv</strong></p>
            <div class="custom-file">
                <input type="file" accept=".xlsx, .xls, .csv" class="custom-file-input" id="uploadExcel">
                <label class="custom-file-label" for="uploadExcel">Importar Excel</label>
            </div>
            <br><br>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</div>
@endsection
