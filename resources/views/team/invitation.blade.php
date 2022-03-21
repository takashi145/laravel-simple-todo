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
                        <a href="{{ route('team.index') }}" class="text-end">戻る</a>
                      </div>
                      <form action="{{ route('invitation.store', ['team' => $team->id ])}}" method="post">
                        @csrf
                        <div class="mb-4">
                          <label for="name" class="form-label">招待するユーザー名</label>
                          <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">招待</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
