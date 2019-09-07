<?php
/*
 !github theke project instriling
*/
 
git clone https://github.com/w3programmers/Laravel-E-commerce-Part-3.git
cd Laravel-E-commerce-Part-3
composer install
php artisan key:generate
php artisan serve

// !Admin or Frontend 
namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;

 /*
!start route code
*/
Route::get('/', function () {
return view('welcome');
});
Route::view("abouts", "about");

Route::get("index", "ControllerStudent@index")->name("index");

Route::prefix("students")->group(function(){
Route::get('/', "studentController@index")->name("student.index");
Route::get('/create', "studentController@create")->name("student.create");
Route::post('/', "studentController@store")->name("student.store");
Route::get('/{student}', "studentController@show")->name("student.show");
Route::get('/{student}/edit', "studentController@edit")->name("student.edit");
Route::post('/{student}', "studentController@update")->name("student.update");
Route::delete('/{student}', "studentController@destroy")->name("student.destroy");
});

/*
!form route code
*/
{!! Form::open(array('url' => '/category/save', 'method' => "post", 'role' => 'form')) !!}
<!-- {!! Form::open(array('url' => 'category/save')) !!} -->

<form action="{{ route('product.store') }}" enctype="multipart/form-data"  method="POST">
<form action="{{ route('product.update', $Product->id) }}" enctype="multipart/form-data" name="editForm"  method="POST">
@csrt

<input type="text" name="title" class="form-control" value="{{ old('title', $Product->title ?? '') }}">

<td class="row-actions">
<a data-toggle="tooltip" title="Update Data!" href="{{ route('brand.edit') }}"><i class="os-icon os-icon-ui-49"></i></a>
<a onclick="return confirm('Are you sure to delete')" data-toggle="tooltip" title="Delete Data!" class="danger" href="#"><i class="os-icon os-icon-ui-15"></i></a>
</td>

https://laravel.com/docs/5.8/migrations#generating-migrations
use Illuminate\Support\Facades\Schema;
public function boot()

{

    Schema::defaultStringLength(191);

}

{{-- select optoin update  --}}
<script type="text/javascript">
    document.forms['editForm'].elements['publicationStatus'].value='{{ $Category->publicationStatus }}';
</script>


// !or
<tr>
        <td> Satatus: </td>
        <td>
            <label for="">Disabled select menu</label>
            <select name="status" class="form-control">
                <option value="">Select Status</option>
                <option value="1" {{ $customar->status == "1" ? "selected" : "" }}>actiove</option>
                <option value="0" {{ $customar->status == "0" ? "selected" : "" }}>Inactiove</option>

                {{ $errors->first('status') }}
         </td>
    </tr>
    
/*
!massages route code
*/
@if(Session()->has("msg"))
<div class="alert alert-success" role="alert">
    {{ Session()->get("msg")  }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

/*
!comment route code
*/
php artisan down
php artisan up
php artisan config:clear
php artisan migrate:rollback
php artisan migrate:refresh
php artisan migrate:reset
php artisan migrate:fresh
php artisan make:model Customer
php artisan make:controller CustomersController --resource
php artisan make:controller CustomersController --model=Customer

/*
!comment route code
*/
<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Category = Category::orderBy('id', 'DESC')->get();
        return view("admin.category.index", compact('Category'));
    }

    // !or
    public function list(){
        $activeCustomar = customar::where("status", 0)->get();
        $unactive = customar::where("status", 1)->get();
    
            // return view("contuce", ["activeCustomar" => $activeCustomar, "unactive" => $unactive ]);
            return view("contuce", compact("activeCustomar", "unactive"));
        }

    // !or
    public function list(){
        $activeCustomar = customar::active()->get();
        $unactive = customar::Inactive()->get();
        $compacts = Company::all();
    
            // return view("contuce", ["activeCustomar" => $activeCustomar, "unactive" => $unactive ]);
            return view("contuce", compact("activeCustomar", "unactive", "compacts"));
        }
        
    // !or
    
class customar extends Model
{
    public function scopeActive($query){
        return $query->where("status", 0);
    }

    public function scopeInactive($query){
        return $query->where("status", 1);
    }

}

// !or

public function show(customar $customar){
    //  !$customar = customar::find($customar);

    // !dd($customar);
    return view("showAllCustomar", compact("customar"));
    // !return view("showAllCustomar", ['customar' => $customar]);


}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//dd($request->all());
        $request->validate([
            'catName' => 'bail|required|max:255',
        ]);
        
       $category = new Category;
       $category->catName = $request->catName;
       $category->save();
       return redirect()->route('category.create')->with("msg", "Category insert successfully");
    }

// !or 
protected $guarded = [];
protected $fillable = ["name", "email", "status"];

public function store()
{
    student::create($this->validation());

    return redirect()->route('student.create')->with("msg", "Data insert successfully");
}

public function vitidation(){
    return request()->validate([
         "name" => "required|min:3",
         "email" => "required|email",
         "compaint_id" => "required",
         "status" => "required"
     ]);
 }
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
     public function show($slug)
     {
         $show = Product::where('slug', $slug)->first();
         return view('frontend.pages.show', compact('show'));
         return $show;
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $Category = Category::find($category);
        return view("admin.category.edit", compact('Category'));
    }

    // !or
    // update data cat
    public function editeCat($id){
        $Categorys = Category::where("id", $id)->first();
        return view("admin.category.editCategory",['Category' => $Categorys]);
    }

    // !or
    public function update(Request $request){
    $category = Category::find($request->categoryId);

    $category->categoryName = $request->categoryName;
    $category->shortDesc = $request->shortDesc;
    $category->shortDesc = $request->shortDesc;
    $category->publicationStatus = $request->publicationStatus;


    $category->save();

    return redirect()->route('mamageCat')->with("msg", "Category Update successfully.");

}

// !or 
public function update(student $student)
{
    $student->update($this->validation());

    return redirect()->route('student.create')->with("msg", "Data insert successfully");
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $request->validate([
            'catName' => 'bail|required|max:255',
        ]);
        
       $category = Category::find($category);
       $category->catName = $request->catName;
       $category->save();
       return back()->with("msg", "Category insert successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $Category = Category::find($category);
        $Category->delete();
        return back();
    }
}

// !or
<form action="students/{{ $result->id }}" method="POST">
    @method("DELETE")
@csrf

<button type="submit"> Delete</button>
</form>

public function destroy(student $student)
{
   $student->delete();
}

/*
    !image upload
*/
laravel image intervention
	 http://image.intervention.io/getting_started/installation#laravel
	 composer require intervention/image
	 
	 //inclue
     use Image;
     use File;
	 Intervention\Image\ImageServiceProvider::class
     'Image' => Intervention\Image\Facades\Image::class
     

       if($request->hasFile("image")){
            $image = $request->file("image");
            $img = time(). ".".$image->getClientOriginalExtension();
            $location = public_path("image/product/".$img);
            image::make($image)->save($location);

            $image = Image::make($image)->resize(300, 200);

            $prduct_image = new product_images;
            $prduct_image->product_id = $product->id;
            $prduct_image->image = $img;
            $prduct_image->save();

        }


        // multi image
        if(count ($request->image) > 0){
            foreach($request->image as $image){
                $img = time(). ".".$image->getClientOriginalExtension();
                $location = public_path("image/product/".$img);
                image::make($image)->save($location);
    
                $image = Image::make($image)->resize(200, 200);
    
                $prduct_image = new product_images;
                $prduct_image->product_id = $product->id;
                $prduct_image->image = $img;
                $prduct_image->save();
            }
        }
		
	  if ( $request->image )
        {
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('image/categoryImage/' . $img);
            Image::make($image)->save($location);
            $Category->image = $img;
        }

// !image update 
public function update(Request $request, $category)
    {
        $request->validate([
            'catName' => 'bail|required|max:255',
            'fullDesc' => 'bail|required|max:255',
        ]);

        $Category = Category::find($category);
        $Category->catName = $request->catName;
        $Category->parent_id = $request->parent_id;
        $Category->fullDesc = $request->fullDesc;

        if ($request->image) {

            if (File::exists('image/categoryImage/' . $Category->image)) {
                File::delete('image/categoryImage/' . $Category->image);
            }

            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('image/categoryImage/' . $img);
            Image::make($image)->save($location);
            $Category->image = $img;
        }

        $Category->update();
        return back()->with("msg", "Category insert successfully");
    }
    
// !delete image 
public function destroy($category)
{
    $Category = Category::find($category);
    if (!is_null($Category)) {
        //! If it is Parent Category, Then We will Delete all it's Sub Category
        if ($Category->parent_id == NULL) {
            //! Delete Sub Categories
            $sub_categories = Category::orderBy('catName', 'asc')->where('parent_id', $Category->id)->get();

            foreach ($sub_categories as $sub) {
                if (File::exists('image/categoryImage/' . $sub->image)) {
                    File::delete('image/categoryImage/' . $sub->image);
                }
                $sub->delete();
            }
        }

        if (File::exists('image/categoryImage/' . $Category->image)) {
            File::delete('image/categoryImage/' . $Category->image);
        }

        $Category->delete();
    }
    return back();
}
        
/*
    !image relationshif
*/
    public function category(){
        return $this->belongsTo(Category::class, 'catId');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brandId');
    }

    public function images(){
        return $this->hasOne(productImage::class, 'productId');
    }

    // public function images(){
    //     return $this->hasMany(productImage::class, 'productId');
    // }

/*
    !image show
*/
    {{ --@foreach($result->image as $images)
<imgstyle="width:60px"src="asset("image/product")/$images->image"alt="ProductImage"class="img-thumbnail">
@endforeach-- }}
       
        <img style="width: 60px" src="{{ asset("image/product/".$result->image->image) }}" alt="Product Image" class="img-thumbnail">

/*
    !image html code
*/
{{--  <div class="col-sm-8">
    <label title="Upload image file" for="inputImage" class="btn btn-primary" style=" width: 200px;  margin-top: 20px; ">
        <input name="image" id="userImage" type="file" class="inputFile" onChange="showPreview(this);" />
    </label>
</div>
<label class="col-form-label col-sm-4" for=""></label>
<label class="col-form-label col-sm-4" for=""><div id="targetLayer"></div></label>  --}}



<div class="col-sm-8 input-group control-group increment" >
<label title="Upload image file" for="inputImage" class="btn btn-primary" style=" width: 200px;  margin-left: 10px; ">
     <input type="file" name="image[]" class="form-control inputFile">
     </label>
     <div class="input-group-btn"> 
       <button style="margin-right: 13px;" class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
     </div>
</div>
<div class="col-sm-8 clone hide">
   <div class="control-group input-group" style="margin-top:10px">
   <label class="col-form-label col-sm-4" for=""></label>
      <label title="Upload image file" for="inputImage" class="btn btn-primary" style=" width: 200px;  margin-left: 50px;">
       <input type="file" name="image[]" class="form-control">
       </label>
       <div class="input-group-btn"> 
         <button style="margin-right: 13px;" class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
       </div>
   </div>
</div>


// !sldebar show

@foreach ( App\Models\Category::orderBy('catName', 'DESC')->where('parent_id', NULL)->get() as $parent )
<li class="menu-item-has-children arrow item-megamenu">
<a href="#" class="dropdown-toggle">{{ $parent->catName }}</a>
   <span class="toggle-submenu hidden-md"></span>
   <div class="submenu parent-megamenu megamenu">
        <div class="submenu-banner submenu-banner-menu-1">
            <div class="col-md-4">
                <div class="dropdown-menu-info">
                    <h6 class="dropdown-menu-title">{{ $parent->catName }}</h6>
                    <div class="dropdown-menu-content">
                        <ul class="menu">
                            @foreach ( App\Models\Category::orderBy('catName', 'DESC')->where('parent_id', $parent->id)->get() as $child )  
                                <li class="menu-item"><a href="#">{{ $child->catName }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
@endforeach