@extends('templates.template')

@section('content')
    <h1 class="text-center">Nova Imagem</h1>
    <hr/>
    <div class="col-8 m-auto">
        @if(isset($errors) && count($errors)>0)
            <div class="text-center alert alert-danger" role="alert">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br/>
                @endforeach
            </div>
        @endif
        <form name="cadastro_imagem" id="cadastro_imagem" method="post" action="{{url('images')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Imagem *</label>
                <input type="file" class="form-control" name="image" id="image" required/>
                <input type="hidden" name="pedido_id" id="pedido_id" value="{{$pedido_id}}"/>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>
@endsection()