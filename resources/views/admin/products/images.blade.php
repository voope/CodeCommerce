@extends('admin')

@section('content')
    <div class="container">
        <h1>Images of {{ $product->name }}</h1>

        <p><a href="{{ route('products.images.create', ['id'=>$product->id]) }}" class="btn btn-default">Add Image</a></p>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Extension</th>
                <th>Action</th>
            </tr>
            @foreach($product->images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td><img src="{{ url('uploads/' . $image->id . '.' . $image->extension) }}" width="60"/></td>
                    <td>{{ $image->extension }}</td>
                    <td>
                        <a href="{{ route('products.images.destroy', ['id'=>$image->id] )  }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>

        {{--{{ $product->images->render() }}--}}

        <a href="{{ route('products') }}" class="btn btn-default">back</a>

    </div>
@endsection
