<?php

namespace App\Http\Controllers;
use  App\Models\category;
use Illuminate\Http\Request;
use App\Models\Mobile;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $categories = Category::with('children')->whereNull('parent_id')->get();
      $mobiles =Mobile::all();
        return view('admin.categories.index', compact('mobiles','categories'));

    }
    public function getMobiles(string $id)
    {
        // $results = DB::table('categories')
        //     ->join('mobiles', 'categories.parent_id', '=', $id)
        //     ->select('categories.name as category_name', 'products.*')
        //     ->where('categories.id', '=', $id) // Specify the category ID
        //     ->get();
        //     return view('categories.show', compact('$results'));
     //   $category = Category::with('mobiles')->find($id);
        return view("admin.categories.show", compact('category'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('admin.categories.index');    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the category with its children
        $category = Category::with('children', 'mobiles')->where('id', $id)->first();

        if ($category) {
            // Retrieve mobiles directly from the main category
            $mobiles = $category->mobiles;

            // Retrieve children categories and their mobiles if needed
            $children = $category->children;

            // Create an array to store mobiles for each child category
            $childMobiles = [];
            foreach ($children as $child) {
                // Load mobiles for each child category
                $childMobiles[$child->id] = $child->mobiles;
            }

        } else {
            // Handle the case where the category is not found
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }

        return view("admin.categories.show", compact('category', 'mobiles', 'childMobiles'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view("admin.categories.edit", compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.categories.index');    }
}
