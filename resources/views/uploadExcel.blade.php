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
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
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
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" accept=".xlsx, .xls, .csv" name="file" class="custom-file-input" id="uploadExcel" required autofocus>
                    <label class="custom-file-label" for="uploadExcel">Importar Excel</label>
                    @error('uploadExcel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <br><br>
                    <button class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
