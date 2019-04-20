@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Refund create form -->
            <form action="refund" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                <label for="exampleInputEmail1">Data</label>
                <input type="text" name="use_date" class="form-control" placeholder="Ex.: aaaa-mm-dd" data-mask="0000-00-00" required>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Tipo de despesa</label>
                <select name="type_id[]" id="js-example-basic-multiple" class="form-control" multiple required>
                    @foreach ($type as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select> 
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Valor Total</label>
                    <input type="text" name="value" id="" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-default">Enviar</button>
            </form>
        </div>
    </div>
@endsection