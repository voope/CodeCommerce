<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;

class AdminProductsController extends Controller {

    private $products;

    public function __construct(Product $product)
    {
        $this->products = $product;
    }

    public function index()
    {
        $products = $this->products->all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Requests\ProductRequest $request)
    {

//        $checkboxes = array('recommended', 'featured', etc);
//        $data = $request->all();
//        foreach ($checkboxes as $checkbox) {
//            if(!isset($data[$checkbox]) {
//                $data[$checkbox] = 0;
//            }
//        }
        $data = $request->all();
        if(!isset($data['featured'])) {
            $data['featured'] = 0;
        }
        if(!isset($data['recommended'])) {
            $data['recommended'] = 0;
        }

        $product = $this->products->fill($data);

        $product->save();

        return redirect()->route('products');
    }

    public function edit($id)
    {
        $product = $this->products->find($id);

        return view('admin.products.edit', compact('product'));
    }

    public function destroy($id)
    {
        $this->products->find($id)->delete();

        return redirect()->route('products');
    }

    public function update(Requests\ProductRequest $request, $id)
    {

//        $checkboxes = array('recommended', 'featured', etc);
//        $data = $request->all();
//        foreach ($checkboxes as $checkbox) {
//            if(!isset($data[$checkbox]) {
//                $data[$checkbox] = 0;
//            }
//        }
        $data = $request->all();
        if(!isset($data['featured'])) {
            $data['featured'] = 0;
        }
        if(!isset($data['recommended'])) {
            $data['recommended'] = 0;
        }

        $this->products->find($id)->update($data);

        return redirect(route('products'));
    }

}
