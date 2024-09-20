@extends('welcome')

@section('title', 'Dashborad')
@section('content')

        <div class="container1">

    </div>

<table class="table table-success table-striped">
  ... <div class="container">
        <h1>User list</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>role</th>
                    <th>image</th>

            </thead>
            <tbody>
                @foreach($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>${{ $item->role }}</td>
                        <td>
                        <img src="{{ asset('images/users/' .  $item->image)  }}" alt=" "
                                    style="width: 45px; height: auto;">
                        {{ $item->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if($users->isEmpty())
            <p>No items found.</p>
        @endif
    </div>
@endsection
