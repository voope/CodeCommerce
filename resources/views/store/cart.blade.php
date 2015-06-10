@extends('store')

@section('content')

    <section id="cart_items">

        <div class="container">

            <div class="table-responsive cart_info">

                <table class="table table-condensed">

                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="price">Qtd</td>
                            <td class="price">Total</td>
                            <td></td>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($cart->all() as $k => $item)
                        <tr>
                            <td class="cart_product">
                                <a href="{{ route('product', $k) }}">imagem</a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('product', $k) }}">{{ $item['name'] }}</a></h4>
                                <p>Código: {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{ $item['price'] }}
                            </td>

                            <td class="cart_quantity">
                                <div class="form-group">
                                    {!! Form::open(['route' => ['cart.update', 'id'=>$k], 'method' => 'post']) !!}
                                    {!! Form::text('qtd', $item['qtd'], ['class' => 'form-control']) !!}
                                    {!! Form::submit('Update Qtd', ['class' => 'btn btn-success']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">R$ {{ $item['price'] * $item['qtd'] }}</p>
                            </td>

                            <td class="cart_delete">

                                <a href="{{ route('cart.destroy', ['id'=>$k]) }}" class="cart_quantity_delete">Delete</a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6">No items in cart</td>
                        </tr>

                    @endforelse

                    <tr class="cart_menu">
                        <td colspan="6">
                            <div class="pull-right">
                                <span>
                                    Total: R$ {{ $cart->getTotal() }}
                                </span>
                                <a href="{{ route('checkout.place') }}" class="btn btn-success">Checkout</a>
                            </div>
                        </td>
                    </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

@endsection