<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\Tag;


class StoreController extends Controller {

	public function index()
	{

        $pFeatured = Product::featured()->get();
        $pRecommended = Product::recommended()->get();

        $categories = Category::all();

        return view('store.index', compact('categories', 'pFeatured', 'pRecommended'));
	}

    public function category(Category $category){

        $categories = Category::all();

        //$products = Product::ofCategory($id)->get();

        return view('store.category', compact('categories', 'category'));

    }

    public function product(Product $product){

        $categories = Category::all();

        //$products = Product::ofCategory($id)->get();

        return view('store.product', compact('categories', 'product'));

    }

    public function tags($id)
    {
        $tag = Tag::find($id);
        $categories = Category::all();
        return view('store.tags', compact('categories','tag'));
    }


}
