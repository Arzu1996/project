@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Redaktə et
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('tasks.update', $task->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="title">Başlıq :</label>
              <input type="text" class="form-control" name="title" value="{{$task->title}}"/>
          </div>
          <div class="form-group">
              <label for="description">Açıqlama :</label>
              <input type="text" class="form-control" name="description" value="{{$task->description}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Redaktə et</button>
      </form>
  </div>
</div>
@endsection