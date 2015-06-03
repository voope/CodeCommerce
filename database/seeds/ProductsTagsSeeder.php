<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Tag;
use CodeCommerce\Product;
use CodeCommerce\Helper\Core as FunctionHelper;

class ProductsTagsSeeder extends Seeder
{
    public function run()
    {
        $tags = Tag::all();
        $products = Product::all();
        foreach($products as $product) {
            FunctionHelper::do_times(function() use($product, $tags) {
                $tagID = $tags[mt_rand(1, count($tags)-1)]->id;
                if(!$product->tags()->exists($tagID)) {
                    $product->tags()->attach($tagID);
                }
            }, mt_rand(2, 5));        
        }
    }
}
