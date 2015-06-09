@extends('store')

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            @include('store.partial.product', ['products' => $tag->products])
        </div>
    </div>
@endsection