@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Todoリスト</div>

                <div class="card-body">
                    <div class="text-start mb-4">
                      <a href="{{ route('task.index') }}" class="text-end">戻る</a>
                    </div>

                    @if(!empty($errors))
                    <ul class="text-danger">
                      @foreach($errors->all() as $error)
                        <li>Error: {{ $error }}</li>
                      @endforeach
                    </ul>
                    @endif
                    <div>
                      @csrf
                      <div class="mb-4">
                        <label for="name" class="form-label">タスク</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $task->name}}" readonly>
                      </div>
                      <div class="mb-4">
                        <label for="explanation" class="form-label">説明</label>
                        <div class="form-control" name="explanation" id="explanation" readonly>{{ $task->explanation ?? "説明がありません。"}}</div>
                      </div>
                      <div class="mb-4">
                        <label for="deadline" class="form-label">期限</label>
                        <input type="text" class="form-control" name="deadline" id="deadline" value="{{ $task->deadline ?? '期限無し'}}" readonly>
                      </div>
                      <div class="mb-4">
                        <label class="form-label">進捗</label>
                        <div class="form-check">
                          <div>{{ $task->progress_name }}</div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-around">
                        <button onclick="location.href='{{ route('task.edit', ['task' => $task->id]) }}'" class="btn btn-primary">編集</button>
                        <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="post" onsubmit="return deletion_confirmation()">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
