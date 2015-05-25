<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminCategoriesController extends Controller {

    private $categories;

	public function __construct(Category $category)
    {
        $this->categories = $category;
    }

    public function index()
    {
        $categories = $this->categories->all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Requests\CategoryRequest $request)
    {

        $input = $request->all();

        $category = $this->categories->fill($input);

        $category->save();

        return redirect()->route('categories');
    }

    public function edit($id)
    {
        $category = $this->categories->find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function destroy($id)
    {
        $this->categories->find($id)->delete();

        return redirect()->route('categories');
    }

    public function update(Requests\CategoryRequest $request, $id)
    {
        $input = $request->all();

        $this->categories->find($id)->update($input);

        return redirect(route('categories'));
    }

}
