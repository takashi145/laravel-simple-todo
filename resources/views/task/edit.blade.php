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

                    
                    <div class="text-start mb-4">
                      <button onclick="location.href='{{ route('task.index') }}'" class="text-end btn btn-primary">戻る</button>
                    </div>

                    @if(!empty($errors))
                    <ul class="text-danger">
                      @foreach($errors->all() as $error)
                        <li>Error: {{ $error }}</li>
                      @endforeach
                    </ul>
                    @endif
                    <form action="{{ route('task.update', ['task' => $task->id]) }}" method="post">
                      @csrf
                      @method('put')
                      <div class="mb-4">
                        <label for="name" class="form-label">タスク<span class="text-danger">(必須)</span></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $task->name }}" required>
                      </div>
                      <div class="mb-4">
                        <label for="explanation" class="form-label">説明</label>
                        <textarea class="form-control" name="explanation" id="explanation">{{ $task->explanation }}</textarea>
                      </div>
                      <div class="mb-4">
                        <label for="deadline" class="form-label">期限</label>
                        <input type="date" class="form-control" name="deadline" id="deadline" min="{{ date('Y-m-d') }}" value="{{ $task->deadline }}">
                      </div>
                      <div class="mb-4">
                        <label class="form-label">進捗<span class="text-danger">(必須)</span></label>
                        <div class="d-flex flex-row justify-content-evenly bg-light p-3">
                          <div class="form-check">
                            <input type="radio" class="form-check-input" name="progress" id="not_started" value="1" @if($task->progress === '1') checked @endif>
                            <label class="form-check-label" for="not_started">未着手</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" class="form-check-input" name="progress" id="middle" value="2" @if($task->progress === '2') checked @endif>
                            <label class="form-check-label" for="middle">着手中</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" class="form-check-input" name="progress" id="completion" value="3" @if($task->progress === '3') checked @endif>
                            <label class="form-check-label" for="completion">完了</label>
                          </div>
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary w-75">更新</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
