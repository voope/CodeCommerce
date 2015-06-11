<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller {




	public function place(Order $orderModel, OrderItem $orderItem)
    {
        if(!Session::has('cart')){
            return false;
        }

        $categories = Category::all();

        $cart = Session::get('cart');

        if($cart->getTotal() > 0){

            $order = $orderModel->create(['user_id'=> Auth::user()->id,'total'=>$cart->getTotal()]);

            foreach($cart->all() as $k=>$item){

                $order->items()->create(['product_id'=>$k, 'price'=>$item['price'], 'qtd'=>$item['qtd']]);
            }

            $cart->clear();

            event(new CheckoutEvent());

            return view('store.checkout', ['cart'=>''], compact('order','categories'));
        }else{
            return view('store.checkout', ['cart'=>'empty'], compact('categories'));
        }





    }

}
