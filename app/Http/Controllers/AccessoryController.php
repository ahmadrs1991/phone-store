<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessory;
class AccessoryController extends Controller
{
    public function index()
    {
        $accessories = Accessory::all();
        return view('admin.accessories.index', compact('accessories'));
    }

    public function create()
    {
        return view('admin.accessories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'brand' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        $accessory = new Accessory();
        $accessory->name = $request->input('name');
        $accessory->price = $request->input('price');
        $accessory->brand = $request->input('brand');
        $accessory->description = $request->input('description');

     //   dd($request);
        // رفع الصورة إذا وجدت
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images/accessories'), $imageName);

            $validatedData['image'] = $imageName;
        }
        $accessory->image= $validatedData['image'];

        // حفظ الجوال في قاعدة البيانات
        $accessory->save();

        return redirect()->route('admin.accessories.index')->with('success', 'Accessory created successfully.');
    }

    public function show(Accessory $accessory)
    {
        return view('admin.accessories.show', compact('accessory'));
    }

    public function edit(Accessory $accessory)
    {
        return view('admin.accessories.edit', compact('accessory'));
    }

    public function update(Request $request, Accessory $accessory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $accessory->update($request->all());
        return redirect()->route('admin.accessories.index')->with('success', 'Accessory updated successfully.');
    }

    public function destroy(Accessory $accessory)
    {
        $accessory->delete();
        return redirect()->route('admin.accessories.index')->with('success', 'Accessory deleted successfully.');
    }
}
