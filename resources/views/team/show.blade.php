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

                    <div>
                      <div class="mb-4">
                        <label for="manager" class="form-label">管理者</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $manager->name }}" readonly>
                      </div>
                      <div class="mb-4">
                        <label for="name" class="form-label">チーム名</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $team->name }}" readonly>
                      </div>
                      <div class="mb-4">
                        <div>
                          メンバー
                          @if($manager->id === Auth::id())
                            <button onclick="location.href='{{ route('invitation.invitation', ['team' => $team->id]) }}'" class="btn btn-primary btn-sm">招待</button>
                          @endif
                        </div>
                        <ul>
                        @foreach($members as $member)
                          <li>{{ $member->name }}</li>
                        @endforeach  
                        </ul>
                      </div>
                      @if($manager->id === Auth::id())
                      <div class="d-flex justify-content-end">
                        <div>
                          <button onclick="location.href='{{ route('team.edit', ['team' => $team->id]) }}'" class="btn btn-primary mx-3">編集</button>
                        </div>
                        <form action="{{ route('team.destroy', ['team' => $team->id]) }}" method="post" onsubmit="return deletion_confirmation()">
                        @csrf
                        @method('delete')
                          <button class="btn btn-danger mx-3">チームを削除</button>
                        </form>
                      </div>
                      @else
                      <form action="{{ route('belong.unbelong', ['team' => $team->id]) }}" method="post" onsubmit="return withdrawal_confirmation()" class="text-end">
                        @csrf
                        <button type="submit" class="btn btn-danger">退会</button>
                      </form>
                      @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  function deletion_confirmation() {
    if(confirm('本当に退会してもよろしいですか。')){
      return true;
    }
    return false;
  }
</script>
@endsection
