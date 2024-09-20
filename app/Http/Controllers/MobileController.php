<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobile;
use   App\Models\Category;
class MobileController extends Controller
{
    // عرض قائمة الجوالات
    public function index()
    {
        $mobiles = Mobile::all();  // جلب جميع الجوالات من قاعدة البيانات
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.mobiles.index', compact('mobiles','categories'));
    }

    // عرض نموذج إضافة جوال جديد
    public function create()
    {
        $categories = Category::all();
        return view('admin.mobiles.create',compact('categories',));
    }

    // حفظ الجوال الجديد في قاعدة البيانات
    public function store(Request $request)
    {
        // تحقق من صحة البيانات (validation)
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'brand' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);
     //   dd($request);
        $mobile = new Mobile;
        $mobile->name = $request->input('name');
        $mobile->price = $request->input('price');
        $mobile->brand = $request->input('brand');
        $mobile->description = $request->input('description');
        $mobile->storage= $request->input("storage");
        $mobile->Ram= $request->input("Ram");;
        $mobile->Battery=$request->input("Battery");;
        $mobile->category_id=$request->category_id;

     //   dd($request);
        // رفع الصورة إذا وجدت
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images/mobiles'), $imageName);

            $validatedData['image'] = $imageName;
        }
        $mobile->image= $validatedData['image'];

        // حفظ الجوال في قاعدة البيانات
        $mobile->save();

        // إعادة التوجيه بعد الحفظ
        return redirect()->route('mobiles.index')->with('success', 'تم إضافة الجوال بنجاح!');
    }

    // عرض نموذج تعديل جوال موجود
    public function edit($id)
    {
        $mobile = Mobile::findOrFail($id);
        return view('admin.mobiles.edit', compact('mobile'));
    }

    // تحديث الجوال في قاعدة البيانات
    public function update(Request $request, $id)
    {
        // تحقق من صحة البيانات (validation)
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'brand' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // العثور على الجوال وتحديثه
        $mobile = Mobile::findOrFail($id);
        $mobile->name = $request->input('name');
        $mobile->price = $request->input('price');
        $mobile->brand = $request->input('brand');
        $mobile->description = $request->input('description');

        $mobile->storage= $request->input("storage");
        $mobile->Ram= $request->input("Ram");;

        // رفع الصورة إذا وجدت
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images/mobiles'), $imageName);

            $validatedData['image'] = $imageName;
        }
        $mobile->image= $validatedData['image'];
        // حفظ التعديلات
        $mobile->save();

        // إعادة التوجيه بعد التحديث
        return redirect()->route('mobiles.index')->with('success', 'تم تحديث الجوال بنجاح!');
    }

    // حذف جوال من قاعدة البيانات
    public function destroy($id)
    {
        $mobile = Mobile::findOrFail($id);
        $mobile->delete();

        return redirect()->route('mobiles.index')->with('success', 'تم حذف الجوال بنجاح!');
    }
}
