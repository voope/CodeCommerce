@extends('admin')

@section('content')
    <div class="container">
        <h1>Categories</h1>

        <p><a href="{{ route('categories.create')  }}" class="btn btn-default">Add Category</a></p>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', ['id'=>$category->id] )  }}">Edit</a> |
                        <a href="{{ route('categories.destroy', ['id'=>$category->id] )  }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $categories->render() !!}
    </div>
@endsection
