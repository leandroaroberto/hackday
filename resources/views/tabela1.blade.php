<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
    @foreach($token as $dado)
      <tr>
        <th scope="row">1</th>
        <td>{{$dado->nome}}</td>        
      </tr>
    @endforeach
    </tbody>
</table>