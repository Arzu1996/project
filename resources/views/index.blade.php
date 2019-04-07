@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div><a href="{{ route('tasks.create')}}" class="btn btn-outline-success btn-lg">Əlavə et</a></div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Başlıq</td>
          <td>Açıqlama</td>
          <td colspan="2">Əməliyyat</td>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->title}}</td>
            <td>{{$task->description}}</td>
            <td><a href="{{ route('tasks.edit',$task->id)}}" class="btn btn-primary">Redaktə</a></td>
            <td>
                <form action="{{ route('tasks.destroy', $task->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Sil</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection