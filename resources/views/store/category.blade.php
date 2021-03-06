@extends('store')

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li>Category</li>
            <li class="active">{{ $category->name }}</li>
        </ol>
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">{{ $category->name }}</h2>

            @include('store.partial.product', ['products' => $category->products])



        </div>


    </div>
@endsection