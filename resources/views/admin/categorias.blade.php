@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Servicio</th>
      <th scope="col">Publicado por</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->name}}</td>
      <td>{{$category->user['name']}}</td>
      <td><form action="categorias/{{ $category->id }}/edit" method="GET">
        {{-- {{ method_field('PATCH') }} --}}
        {{-- {{ csrf_field() }} --}}
        <button type="submit" class="btn btn-danger">Editar</button>
        </form></td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
</div>
@endsection