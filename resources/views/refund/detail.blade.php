@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <center><h2>Detalhes</h2></center>
        <table class="table">
            <thead>
                <tr>
                    <th>{{ $refundName->name }}</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Valor total:</th>
                    <th></th>
                    <th>{{ $refundDetail->value }}</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($typeNames as $type)
                <tr>
                    <td>{{$type->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('refund.edit', $refundDetail->id ) ,  $refundDetail->id }}" class="btn btn-success">Aprovar</a>
    </div>
    <div class="col-md-3"></div>
@endsection