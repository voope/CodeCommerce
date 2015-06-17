<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use CodeCommerce\Http\Requests;


class AdminOrdersController extends Controller
{
    private $orders;

    public function __construct(Order $order)
    {
        $this->orders = $order;
    }

    public function index()
    {
        $orders = $this->orders->get();

        $status = array(
            'Aguardando pagamento...',
            'Pagamento confirmado',
            'Enviado',
            'Cancelado'
        );


        return view('admin.orders.index', compact('orders', 'status'));
    }

    public function update(Requests\OrderRequest $request, Order $order){

        $input = $request->all();

        $order->update($input);

        return redirect()->route('orders');
    }
}
