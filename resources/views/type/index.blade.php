@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="type" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Descrição de tipo de despesa</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>           
            <button type="submit" class="btn btn-default">Cadastrar</button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <center><h3>Tipos de despesa cadastrados</h3></center>
        <table class="table table-responsive text-center">
            <tr>
                <th style="text-align: center;">Descrição</th>
            </tr>
            @foreach($type as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="col-md-3"></div>
</div>
@endsection