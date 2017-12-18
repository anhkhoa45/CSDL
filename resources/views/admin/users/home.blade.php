@extends('admin.layouts.app')

@section('styles')
    <style>
        .actions-head {
            padding: 30px 0;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .new-btn {
            margin-right: 20px;
        }
        .pagination {
            text-align: center;
        }
        .form-inline {
            display:inline;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <div class="col-md-6">
                <h2>User list</h2>
            </div>
            <div class="actions-head col-md-6">
                <a class="new-btn btn btn-primary" href="{{ route('admin.users.create') }}">+ New</a>
                <form class="search-form form form-inline" method="GET" action="{{ route('admin.users.search') }}">
                    <input class="form-control" type="text" placeholder="Student name" name="name">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Email</th>
                <th>Address</th>
                <th>Balance</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @php
                $count = 1;
            @endphp

            @foreach($users as $user)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->gender}}</td>
                    <td>{{ $user->DOB}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->address}}</td>
                    <td>{{ $user->balance}}</td>
                    <td>{{ $user->created_at}}</td>
                    <td>{{ $user->updated_at}}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('admin.users.show', ['user' => $user->id]) }}">Detail</a>
                        <a class="btn btn-primary" href="{{ route('admin.users.edit', ['user' => $user->id]) }}">Edit</a>
                        <form
                                class="form-inline"
                                method="POST"
                                action="{{ route('admin.users.destroy', ['user' => $user->id]) }}"
                        >

                            <button type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>

                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection