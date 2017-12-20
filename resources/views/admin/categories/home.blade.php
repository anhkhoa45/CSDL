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
                <h2>Manage Categories</h2>
            </div>
            <div class="actions-head col-md-6">
                <form class="search-form form form-inline" method="GET" action="{{ route('admin.users.search') }}">
                    <input class="form-control" type="text" placeholder="Categories name" name="name">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @php
                $count = 1;
            @endphp

            @foreach($categories as $categories)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $categories->name }}</td>
                    <td></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection