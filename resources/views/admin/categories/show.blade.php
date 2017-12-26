@extends('admin.layouts.app')

@section('styles')
    <style>
        h1 {
            margin-bottom: 50px;
        }

        .btn {
            margin: 20px 0;
        }

        .info-panel {
            padding: 30px;
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
                @foreach($categories as $categories)

                <div class="info-panel col-md-12 bg-info">
                <h1> Category Name: {{$categories->name}}</h1>
                <div class="col-md-6 col-md-offset-2">
                    <p>ID: {{ $categories->id }}</p>
                    <p>CountCourse: {{ $categories->countcourse }}</p>
                    <p>Created: {{ $categories->created_at }}</p>
                    <p>Updated: {{ $categories->updated_at }}</p>
                    <a class="btn btn-primary" href="{{ route('admin.categories.edit', ['categories' => $categories->id]) }}">Edit Category</a>
                </div>
            </div>
                    @endforeach
        </div>


@endsection