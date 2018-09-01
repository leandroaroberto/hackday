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
        <td>{{$dado['consumo']}}</td>
        <td>@if($dado['consumo'] > 1 AND $dado['consumo'] <= 100 )<span class="label label-warning">{{'Atenção'}}</span>@endif</td>  
        <td>{{$dado['conexao']}}</td> 
        <td>{{$dado['obs']}}</td>         
      </tr>
      
    @endforeach
    </tbody>
</table>
