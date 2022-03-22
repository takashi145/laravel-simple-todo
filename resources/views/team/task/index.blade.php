@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todoリスト {{ $team->name }}</div>

                <div class="card-body">
                    <a href="{{ route('team.index') }}">チーム一覧に戻る</a>
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
                        <tr>
                          <th scope="row">{{ $task->user->name }}</th>
                          <td>{{ $task->name }}</td>
                          <td>{{ $task->deadline ?? "---"}}</td>
                          <td>{{ $task->progress_name}}</td>
                          <td><a href="{{ route('team_task.show', ['task' => $task->id]) }}">詳細</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
