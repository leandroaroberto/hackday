<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Status</th>
        <th scope="col">Consumo</th>
        <th scope="col">Conexão</th>
        <th scope="col">Obs</th>        
      </tr>
    </thead>
    <tbody>
      @foreach($dados as $dado)      
      <tr>
        <td>{{$dado['nome']}}</td>       
        <td>{{$dado['status']}}</td>           
        <td>          
            @if($dado['consumo'] <= 50 )<span class="label label-default">{{'Desligado'}}</span>@endif
         @if($dado['consumo'] > 50 AND $dado['consumo'] <= 100 )<span class="label label-warning">{{'Atenção'}} </span>&nbsp; {{$dado['consumo'] .' Kwh' }}@endif
          @if($dado['consumo'] > 100 AND $dado['consumo'] <= 350)<span class="label label-success">{{'Ok'}}</span>&nbsp; {{$dado['consumo'] .' Kwh' }}@endif
          @if($dado['consumo'] > 350 AND $dado['consumo'] <= 380)<span class="label label-warning">{{'Atenção'}}</span>&nbsp; {{$dado['consumo'] .' Kwh' }}@endif
          @if($dado['consumo'] > 380)<span class="label label-danger">{{'Alerta'}}</span>@endif  
        </td>  
        <td>@if($dado['conexao']==0)<span class="label label-default">{{'Inativo'}}</span>@else<span class="label label-success">{{'Ativo'}}</span>@endif</td> 
        <td>{{$dado['obs']}}</td>         
      </tr>
      
    @endforeach
    </tbody>
</table>
