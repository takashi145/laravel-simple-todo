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
                    <form action="{{ route('task.store') }}" method="post">
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
                          <div>{{ $task->progress }}</div>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
