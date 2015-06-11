@extends('store')


@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')

    <div class="container">

        @if($cart == 'empty')
            <h3>Carrinho vazio</h3>
        @else
            <h3>Pedido realizado com sucesso !</h3>

            <p>O pedido #{{ $order->id }}, foi realizado com sucesso</p>
        @endif
    </div>

@endsection