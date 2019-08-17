<?php
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
<form action="{{ route('product.store') }}" enctype="multipart/form-data"  method="POST">
<form action="{{ route('product.update', $Product->id) }}" enctype="multipart/form-data" name="editForm"  method="POST">
@csrt

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
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
/*
    !image upload
*/
laravel image intervention
	 http://image.intervention.io/getting_started/installation#laravel
	 composer require intervention/image
	 
	 //inclue
	 use Image;
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
/*
    !image relationshif
*/
    public function category(){
        return $this->belongsTo(Category::class, 'catId');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brandId');
    }

    public function image(){
        return $this->hasOne(productImage::class, 'productId');
    }

    // public function image(){
    //     return $this->hasMany(productImage::class, 'productId');
    // }

/*
    !image show
*/
    {{ --@foreach($result->imageas$images)
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