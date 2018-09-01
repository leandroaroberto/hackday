@extends('layouts.startbootstrap')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Home</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        Hack Day!
        <p>This is the Eugenio Token:</p>
        @include('tabela1');
    </div>
</div>
<hr />
<div class="row">
    <div id="grafico1" class="col-lg-6">
        {{--conteudo carregado via ajax--}} 
        <a href="#" id="getEugenio" class="btn btn-primary">Get Eugenio</a>       
    </div>
    <div id="tabela1" class="col-lg-6">
        {{--conteudo carregado via ajax--}}        
    </div>
</div>


@endsection
