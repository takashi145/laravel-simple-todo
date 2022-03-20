@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">所属チーム一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-end">
                      <button  onclick="location.href='{{ route('task.create') }}'" class="text-end btn btn-primary">チームを作成</button>
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
                          <td>{{ $team->name }}</td>
                          <td><a href="">詳細</a></td>
                          <td>
                            <form action="" method="post" onsubmit="return deletion_confirmation()">
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
