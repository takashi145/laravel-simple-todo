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
                    <form action="{{ route('team.update', ['team' => $team->id]) }}" method="post">
                      @csrf
                      @method('put')
                      <div class="mb-4">
                        <label for="manager" class="form-label">管理者<span class="text-danger">(必須)</span></label>
                        <select  onChange="manager_change()" class="form-control" name="manager" id="manager" required>
                          @foreach($members as $member)
                            <option value="{{ $member->id}}" @if($member->id === $manager->id) selected @endif>{{ $member->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-4">
                        <label for="name" class="form-label">チーム名<span class="text-danger">(必須)</span></label>
                        <input type="text" class="form-control" name="name" id="name" required value="{{ $team->name }}">
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
<script>
  function manager_change(){
    alert('管理者が変更されています。');
  }
</script>
@endsection
