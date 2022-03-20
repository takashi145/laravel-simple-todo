@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">チーム作成</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="text-start mb-4">
                      <button onclick="location.href='{{ route('team.index') }}'" class="text-end btn btn-primary">戻る</button>
                    </div>

                    @if(!empty($errors))
                    <ul class="text-danger">
                      @foreach($errors->all() as $error)
                        <li>Error: {{ $error }}</li>
                      @endforeach
                    </ul>
                    @endif
                    <form action="{{ route('team.store') }}" method="post">
                      @csrf
                      <div class="mb-4">
                        <label for="name" class="form-label">チーム名<span class="text-danger">(必須)</span></label>
                        <input type="text" class="form-control" name="name" id="name" required>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary w-75">作成</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
