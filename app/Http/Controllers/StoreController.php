<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;


class StoreController extends Controller {

	public function index()
	{

        $pFeatured = Product::featured()->get();
        $pRecommended = Product::recommended()->get();

        $categories = Category::all();

        return view('store.index', compact('categories', 'pFeatured', 'pRecommended'));
	}

    public function products(Category $category){

        $categories = Category::all();

        return view('store.products', compact('categories', 'category'));

    }



}
