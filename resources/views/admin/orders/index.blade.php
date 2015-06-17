@extends('admin')


@section('content')

    <div class="container">

        <h1>Orders</h1>

        <table class="table">
            <tbody>
                <tr>
                    <th>#ID</th>
                    <th>User</th>
                    <th>Itens</th>
                    <th>Valor</th>
                    <th>Status</th>
                </tr>

                @foreach($orders as $order)

                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>
                            <ul>
                                @foreach($order->items as $item)

                                    <li>{{ $item->product->name }}</li>

                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $order->total }}</td>
                        <td>

                            {!! Form::open(['route' => ['orders.update', $order], 'method' => 'post', 'class' => 'form-inline']) !!}
                                <div class="form-group">
                                    {!! Form::select('status', $status, $order->status, ['class' => 'form-control']) !!}

                                </div>
                            {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}

                            {!! Form::close() !!}



                        </td>
                    </tr>

                @endforeach


            </tbody>



        </table>

    </div>

@endsection