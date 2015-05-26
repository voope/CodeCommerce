@extends('app')

@section('content')
    <div class="container">
        <h1>Editing Product {{ $product->name }}</h1>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=> ['products.update', $product->id], 'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::checkbox('featured', 1, ($product->featured)?true:false, ['class' => 'field']) !!}
            {!! Form::label('featured', 'Featured:') !!}
            &nbsp;&nbsp;
            {!! Form::checkbox('recommended', 1, ($product->recommended)?true:false, ['class' => 'field']) !!}
            {!! Form::label('recommended', 'Recommended:') !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Edit Product', ['class' => 'btn btn-primary']) !!}
        </div>



        {!! Form::close() !!}

        <p><a href="{{ route('products')  }}" class="btn btn-danger">Back</a></p>

    </div>
@endsection