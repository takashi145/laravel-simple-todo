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
          <div>
            <div class="card">
                <div class="card-header">所属チーム一覧</div>

                <div class="card-body">
                    <div class="text-end">
                      <button  onclick="location.href='{{ route('team.create') }}'" class="text-end btn btn-primary">チームを作成</button>
                    </div>
                    @if(count($teams) > 0)
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th scope="col">チーム名</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($teams as $team)
                        <tr>
                          <td><a href="{{ route('team_task.index', ['team' => $team->id]) }}">{{ $team->name }}</a></td>
                          <td><a href="{{ route('team.show', ['team' => $team->id]) }}">詳細</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @else
                    <div class="text-center">
                      所属しているチームがありません。
                    </div>
                    @endif
                </div>
            </div>
            <div class="card my-3">
                <div class="card-header">招待されているチーム一覧</div>

                <div class="card-body">
                    @if(count($invited_teams) > 0)
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th scope="col">チーム名</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($invited_teams as $team)
                        <tr>
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
                    @else
                      <div class="text-center">
                        招待されているチームはありません。
                      </div>
                    @endif
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
