<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Http\Requests;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class CheckoutController extends Controller {

	public function place(Order $orderModel, OrderItem $orderItem, CheckoutService $checkoutService)
    {
        if(!Session::has('cart')){
            return false;
        }

        $categories = Category::all();

        $cart = Session::get('cart');

        if($cart->getTotal() > 0){

            $checkout = $checkoutService->createCheckoutBuilder();

            $order = $orderModel->create(['user_id'=> Auth::user()->id,'total'=>$cart->getTotal()]);

            foreach($cart->all() as $k=>$item){

                $checkout->addItem(new Item($k, $item['name'], $item['price'], $item['qtd']));

                $order->items()->create(['product_id'=>$k, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);
            }

            $cart->clear();

            event(new CheckoutEvent(Auth::user(), $order));

            $response = $checkoutService->checkout($checkout->getCheckout());

            return redirect($response->getRedirectionUrl());

            //return view('store.checkout', ['cart'=>''], compact('order','categories'));
        }else{
            return view('store.checkout', ['cart'=>'empty'], compact('categories'));
        }


    }

}
