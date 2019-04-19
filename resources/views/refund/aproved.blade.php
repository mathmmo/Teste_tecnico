@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <center><h3>Tipos de despesa cadastrados</h3></center>
        <table class="table table-responsive text-center">
            <tr>
                <th style="text-align: center;">Funcionario</th>
                <th style="text-align: center;">Data</th>
                <th style="text-align: center;">Valor</th>
                <th style="text-align: center;">Detalhes</th>
            </tr>
            @foreach($aproved as $item)
                <tr>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->use_date }}</td>
                    <td>{{ $item->value }}</td>
                    <td><i class="fas fa-check table-icon success"></i>Aprovado</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="col-md-3"></div>
@endsection