<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;

class AdminProductsController extends Controller {

    private $products;

    public function __construct(Product $product)
    {
        $this->products = $product;
    }

    public function index()
    {
        $products = $this->products->paginate(10);

        //dd($products);

        return view('admin.products.index', compact('products'));
    }

    public function create(Category $category)
    {

        $categories = $category->lists('name', 'id');

        return view('admin.products.create', compact('categories'));
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

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');

        $product = $this->products->find($id);

        return view('admin.products.edit', compact('product', 'categories'));
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
