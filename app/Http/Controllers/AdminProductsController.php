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

        $input = $request->all();

        $product = $this->products->fill($input);

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

        $input = $request->all();

        $this->products->find($id)->update($input);

        return redirect(route('products'));
    }

}
