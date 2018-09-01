<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Cidade</th>
        <th scope="col">UF</th>
      </tr>
    </thead>
    <tbody>
    @foreach($dados as $dado)
      <tr>
        <th scope="row">1</th>
        <td>{{$dado->nome}}</td>   
        <td>{{$dado->cidade}}</td>  
        <td>{{$dado->estado}}</td>               
      </tr>
    @endforeach
    </tbody>
</table>