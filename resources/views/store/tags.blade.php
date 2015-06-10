@extends('store')

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Tag</li>
            <li class="active">{{ $tag->name }}</li>
        </ol>
        <div class="features_items">
            @include('store.partial.product', ['products' => $tag->products])
        </div>
    </div>
@endsection