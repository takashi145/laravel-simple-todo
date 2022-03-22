@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
            <div class="card">
                <div class="card-header">所属チーム一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-end">
                      <button  onclick="location.href='{{ route('team.create') }}'" class="text-end btn btn-primary">チームを作成</button>
                    </div>
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">チーム名</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($teams as $team)
                        <tr class="">
                          <th scope="row">{{ $team->id }}</th>
                          <td><a href="{{ route('team_task.index', ['team' => $team->id]) }}">{{ $team->name }}</a></td>
                          <td><a href="{{ route('team.show', ['team' => $team->id]) }}">詳細</a></td>
                          <td>
                            <form action="{{ route('belong.unbelong', ['team' => $team->id]) }}" method="post" onsubmit="return deletion_confirmation()">
                              @csrf
                              <button type="submit" class="btn btn-danger">退会</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="card my-3">
                <div class="card-header">招待されているチーム一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">チーム名</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($invited_teams as $team)
                        <tr>
                          <th scope="row">{{ $team->id }}</th>
                          <td>{{ $team->name }}</td>
                          <td><a href="{{ route('team.show', ['team' => $team->id]) }}">詳細</a></td>
                          <td>
                            <form action="{{ route('belong.store', ['team' => $team->id]) }}" method="post" onsubmit="return participate_confirmation()">
                              @csrf
                              <button type="submit" class="btn btn-primary">参加</button>
                            </form>
                          </td>
                          <td>
                            <form action="{{ route('invitation.uninvitation', ['team' => $team->id]) }}" method="post" onsubmit="return deletion_confirmation()">
                              @csrf
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
<script>
  function participate_confirmation() {
    if(confirm('本当に参加してもよろしいですか。')){
      return true;
    }
    return false;
  }

  function deletion_confirmation() {
    if(confirm('本当に退会してもよろしいですか。')){
      return true;
    }
    return false;
  }
</script>
@endsection
