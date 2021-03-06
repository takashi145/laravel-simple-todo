@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todoリスト</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="text-end">
                      <button  onclick="location.href='{{ route('task.create') }}'" class="text-end btn btn-primary">追加</button>
                    </div>
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th scope="col">タスク</th>
                          <th scope="col">期限</th>
                          <th scope="col">進捗</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($tasks as $task)
                        <tr>
                          <td>{{ $task->name }}</td>
                          <td>{{ $task->deadline ?? "---"}}</td>
                          <td>{{ $task->progress_name}}</td>
                          <td><a href="{{ route('task.show', ['task' => $task->id]) }}">詳細</a></td>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  function deletion_confirmation() {
    if(confirm('本当に削除してもよろしいですか。')){
      return true;
    }
    return false;
  }
</script>
@endsection
