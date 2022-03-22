@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todoリスト チーム:{{ $task->team->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <div class="text-start mb-4">
                      <a href="{{ route('team_task.index', ['team' => $task->team->id]) }}" class="text-end">戻る</a>
                    </div>

                    @if(!empty($errors))
                    <ul class="text-danger">
                      @foreach($errors->all() as $error)
                        <li>Error: {{ $error }}</li>
                      @endforeach
                    </ul>
                    @endif
                    <div>
                      <div class="mb-4">
                        <label for="name" class="form-label">作成者</label>
                        <input class="form-control" name="name" id="name" value="{{ $task->user->name}}" readonly>
                      </div>
                      <div class="mb-4">
                        <label for="name" class="form-label">タスク</label>
                        <input class="form-control" name="name" id="name" value="{{ $task->name}}" readonly>
                      </div>
                      <div class="mb-4">
                        <label for="explanation" class="form-label">説明</label>
                        <textarea class="form-control" name="explanation" id="explanation" readonly>{{ $task->explanation ?? "説明がありません。"}}</textarea>
                      </div>
                      <div class="mb-4">
                        <label for="deadline" class="form-label">期限</label>
                        <input class="form-control" name="deadline" id="deadline" value="{{ $task->deadline ?? '期限無し'}}" readonly>
                      </div>
                      <div class="mb-4">
                        <label class="form-label">進捗</label>
                        <div class="form-check">
                          <div>{{ $task->progress_name }}</div>
                        </div>
                      </div>
                      @if($task->user->name === Auth::user()->name)
                      <div class="d-flex justify-content-around">
                        <button onclick="location.href='{{ route('team_task.edit', ['task' => $task->id]) }}'" class="btn btn-primary">編集</button>
                        <form action="{{ route('team_task.destroy', ['task' => $task->id]) }}" method="post" onsubmit="return deletion_confirmation()">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                      </div>
                        
                      @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
