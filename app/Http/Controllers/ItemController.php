<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use App\Models\Accessory;

class ItemController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->input('query');  // Get the search term from the request
        $items = Mobile::where('name', 'LIKE', "%$query%")
                      ->orWhere('description', 'LIKE', "%$query%")
                      ->get();  // Search items by name or description

        return view('search', compact('items'));  // Pass items to the view
    }
    public function index()
    {
        $lasttwo1 = Accessory::orderBy('id', 'desc')->take(2)->get();
        $lastTwo2  = Mobile::orderBy('id', 'desc')->take(2)->get();
        return view('welcome', compact('lasttwo1','lasttwo2'));
    }

}
