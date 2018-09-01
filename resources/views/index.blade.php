@extends('layouts.startbootstrap')
@section('content')
@push('webservice') 
    <script src="{{ asset('js/hack.js') }}"></script>
 @endpush   


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Home</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        Hack Day!
        {{--@include('tabela1');--}}
    </div>
</div>
<hr />
{{--<div class="row">
    <div id="grafico1" class="col-lg-6">
   
        <a href="#" id="getEugenio" class="btn btn-primary">Get Eugenio</a>       
    </div>
    <div id="tabela1" class="col-lg-6">
        
    </div>
</div>--}}

<div class="row">        
    <div id="tabela1" class="col-lg-12">
            {{--conteudo carregado via ajax--}}        
        </div>
    </div>
</div>    
<script>
        var tempo = window.setInterval(eugenio, 1000);
    </script>
@endsection
