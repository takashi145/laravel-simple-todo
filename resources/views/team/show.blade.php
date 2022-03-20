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
                      <button onclick="location.href='{{ route('team.index') }}'" class="text-end btn btn-primary">戻る</button>
                    </div>

                    <div>
                      <div class="mb-4">
                        <label for="name" class="form-label">チーム名</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $team->name }}" readonly>
                      </div>
                      <div class="mb-4">
                        <div>メンバー</div>
                        <ul>
                        @foreach($members as $member)
                          <li>{{ $member->name }}</li>
                        @endforeach  
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
