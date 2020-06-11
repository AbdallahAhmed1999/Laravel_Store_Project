<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        Gate::authorize('show-categories');

        return view('Admin.Category.index', [
            'categories' => Category::paginate(6)
        ]);
    }

    public function store(Request $request)
    {
        Gate::authorize('add-category');

        $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'string|min:10|max:30'
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return back()->with([
            'success' => __('notifications.add-category')
        ]);
    }


    public function update(Request $request, Category $category)
    {
        Gate::authorize('edit-category');

        $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'string|min:10|max:30'
        ]);

        $category->update($request->all());

        return [
            'status' => true,
            'success' => __('notifications.update-category')
        ];
    }

    public function destroy(Category $category)
    {
        Gate::authorize('delete-category');

        $category->delete();
        return back()->with([
            'success' => __('notifications.delete-category')
        ]);
    }
}
