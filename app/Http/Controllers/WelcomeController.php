<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use App\Models\Accessory;

class  WelcomeController extends Controller
{

  static  public function index()
    {
        $accessories = Accessory::orderBy('id', 'desc')->take(2)->get();
        $mobiles  = Mobile::orderBy('id', 'desc')->take(2)->get();
        return view('welcome', compact('accessories','mobiles'));
    }

}
