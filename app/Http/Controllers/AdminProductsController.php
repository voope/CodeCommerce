<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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


    public function destroy($id)
    {
        $product = $this->products->find($id);

        foreach($product->images as $item) {
            if (file_exists(public_path() . '/uploads/' . $item->id . '.' . $item->extension)) {
                Storage::disk('public_local')->delete($item->id . '.' . $item->extension);
            }

            $item->delete();
        }

        $product->delete();

        return redirect()->route('products');
    }

    public function images($id)
    {
        $product = $this->products->find($id);

        return view('admin.products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->products->find($id);

        return view('admin.products.create_image', compact('product'));
    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {

        $file = $request->file('image');

        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('products.images', ['id'=>$id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if (file_exists(public_path() . '/uploads/' . $image->id . '.' . $image->extension))
        {
            Storage::disk('public_local')->delete($image->id . '.' . $image->extension);
        }

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images', ['id'=>$product->id]);
    }

}
