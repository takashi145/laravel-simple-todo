@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todoリスト</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-end">
                      <button class="text-end btn btn-primary">追加</button>
                    </div>
                    
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
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
                          <th scope="row">{{ $task->id }}</th>
                          <td>{{ $task->name }}</td>
                          <td>{{ $task->deadline }}</td>
                          <td>{{ $task->progress}}</td>
                          <td><a href="">詳細</a></td>
                          <td><button class="btn btn-primary">編集</button></td>
                          <td>
                            <form action="">
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
@endsection
