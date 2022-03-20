@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todoリスト {{ $team->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-end">
                      <button onclick="location.href='{{ route('team_task.create', ['team' => $team->id]) }}'" class="text-end btn btn-primary">追加</button>
                    </div>
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th scope="col">作成者</th>
                          <th scope="col">タスク</th>
                          <th scope="col">期限</th>
                          <th scope="col">進捗</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($tasks as $task)
                        <tr class="">
                          <th scope="row"></th>
                          <td>{{ $task->name }}</td>
                          <td>{{ $task->deadline ?? "---"}}</td>
                          <td>{{ $task->progress_name}}</td>
                          <td><a href="">詳細</a></td>
                          <td><button onclick="location.href=''" class="btn btn-primary">編集</button></td>
                          <td>
                            <form action="" method="post" onsubmit="return deletion_confirmation()">
                              @csrf
                              @method('delete')
                              <button type="submit" class="btn btn-danger">削除</button>
                            </form>
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
