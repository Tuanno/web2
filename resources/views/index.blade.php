<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <a class="btn btn-primary" href="{{action('TesteController@create')}}">Cadastrar</a>
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Endereco</th>
        <th>Numero</th>
        <th>Cidade</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($tests as $test)
      <tr>
        <td>{{$test['id']}}</td>
        <td>{{$test['nome']}}</td>
        <td>{{$test['endereco']}}</td>
        <td>{{$test['numero']}}</td>
        <td>{{$test['cidade']}}</td>
        
        <td><a href="{{action('TesteController@edit', $test['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('TesteController@destroy', $test['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>