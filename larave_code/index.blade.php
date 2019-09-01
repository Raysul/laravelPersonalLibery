
<?php
composer require "laravelcollective/html":"^5.4.0" 

{{--  https://stackoverflow.com/questions/52713552/installing-laravel-collective-doesnt-work
https://www.tutcodex.com/laravel-collective-html-form-builder/  --}}
 /*
     * Package Service Providers...
	 
	 laravel image intervention
	 http://image.intervention.io/getting_started/installation#laravel
	 composer require intervention/image
	 
	 //inclue
	 use Image;
	 Intervention\Image\ImageServiceProvider::class
	 'Image' => Intervention\Image\Facades\Image::class
	 
     */

// composer require intervention/image
     {{--  route  --}}
     Route::get('/', function () {
        return view('welcome');
    });
    
    Route::view("abouts", "about");

    
    Route::get("index", "ControllerStudent@index")->name("index");


    {{--  url  --}}
    <link rel="stylesheet" href={{ asset("webSite/css/bootstrap.min.css") }}>

    <a class="nav-link active" href="{{ route("store") }}">Add Studen</a>

    Route::prefix("students")->group(function(){
        Route::get('/', "studentController@index")->name("student.index");
        Route::get('/create', "studentController@create")->name("student.create");
        Route::post('/', "studentController@store")->name("student.store");
        Route::get('/{student}', "studentController@show")->name("student.show");
        Route::get('/{student}/edit', "studentController@edit")->name("student.edit");
        Route::post('/{student}', "studentController@update")->name("student.update");
        Route::delete('/{student}', "studentController@destroy")->name("student.destroy");
    });
    


    

Collective\Html\HtmlServiceProvider::class,

'aliases' => [
    // ...
      'Form' => 'Collective\Html\FormFacade',
      'Html' => 'Collective\Html\HtmlFacade',
    // ...
    ],

<!-- {!! Form::open(array('url' => 'category/save')) !!} -->
{!! Form::open(array('url' => '/category/save', 'method' => "post", 'role' => 'form')) !!}


{{-- start insert data  --}}
use Illuminate\Support\Facades\Schema;
public function boot()

{

    Schema::defaultStringLength(191);

}



use App\Category;
public function saveData(Request $request){
    // dd($request->all());

    $Category = new Category();
    $Category->categoryName = $request->categoryName;
    $Category->shortDesc = $request->shortDesc;
    $Category->publicationStatus = $request->publicationStatus;

    $Category->save();
    return redirect()->route('addCategory')->with("msg", "Data insert successfully");
}
}

{{ Session::get("msg") }}
{{ $errors->first("name") }}

@if(Session()->has("msg"))
<div class="alert alert-primary" role="alert">
    {{ Session()->get("msg")  }}
</div>
@endif

session()->flash("msg", "Massage insert sucessfully.");

@if(! Session()->has("msg"))

remove

@endif



or

public function product_store(Request $request){
    $product = new product();

    $product->title = $request->title;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->quantity = $request->quantity;

    $product->slug = str_slug($request->title);
    $product->offet_price = 6;
    $product->category_id = 1;
    $product->brand_id = 1;
    $product->admin_id = 1;


    $product->save();
    return redirect()->route('admin.product.create');
  }

  $request->validate([
            'catName' => 'bail|required|unique:posts|max:255',
        ]);
		
		
  public function store(){
    // dd(request("name"));
    $customar = new customar();
    $customar->name = request("name");
    $customar->save();

    return back();
}


or

public function store(Request $request){
    $customar = new customar();

    $data = $request->validate([
        "name" => "required|min:3",
        "email" => "required|email"
        
    ]);

    <td>{{ $errors->first("name") }}</td>

    // dd($data);
    customar::create($data);
    // $customar->name = $request->name;
    // $customar->email = $request->email;
    // $customar->status = $request->status;
    // $customar->save();
    return back();
}

or
protected $guarded = [];

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

 or

 $validatedData = $request->validate([
    'title' => 'required|unique:posts|max:255',
    'body' => 'required',
]);

 protected $fillable = ["name", "email", "status"];
 protected $guarded = [];
 

 public function store()
 {
     student::create($this->validation());
      return back();
 }

 public function validation(){
     return request()->validate([
         'name' => 'required'
     ]);
 }

 C:\xampp\htdocs\laraStudent>php artisan migrate:rollback
{{-- model --}}



{{--  end inserr   --}}

{{-- start  show data  --}}


public function manage(){
    $Categorys = Category::all();
    return view("admin.category.viewAllCat", ['category' => $Categorys]);

}

{{--  join table  --}} 
public function viewAllProduct(){
    $prducts = DB::table('products')
    ->join("categories","categories.id", "=", "category")
    ->select("products.*","categories.categoryName as catName")
    ->get();
     return view("admin.product.viewAllProduct", ['product' => $prducts]);
}

    or
public function product_viewAllProduct(){
    $viewProduct = product::orderBy("id", "DESC")->get();
    return view("admin.pages.product.viewAllProduct")->with("view", $viewProduct);
}


or

public function list(){
    $activeCustomar = customar::where("status", 0)->get();
    $unactive = customar::where("status", 1)->get();

        // return view("contuce", ["activeCustomar" => $activeCustomar, "unactive" => $unactive ]);
        return view("contuce", compact("activeCustomar", "unactive"));
    }


    or
    public function list(){
        $activeCustomar = customar::active()->get();
        $unactive = customar::Inactive()->get();
        $compacts = Company::all();
    
            // return view("contuce", ["activeCustomar" => $activeCustomar, "unactive" => $unactive ]);
            return view("contuce", compact("activeCustomar", "unactive", "compacts"));
        }

        


    public function list(){
        $activeCustomar = customar::active()->get();
        $unactive = customar::Inactive()->get();
    
            // return view("contuce", ["activeCustomar" => $activeCustomar, "unactive" => $unactive ]);
            return view("contuce", compact("activeCustomar", "unactive"));
        }
 


        
namespace App;

use Illuminate\Database\Eloquent\Model;

class customar extends Model
{
    public function scopeActive($query){
        return $query->where("status", 0);
    }

    public function scopeInactive($query){
        return $query->where("status", 1);
    }

}



or

Route::get("contuce/{customar}", "CustomarColtroller@show")->name("show");

public function show(customar $customar){
    //   $customar = customar::find($customar);

    // dd($customar);
    return view("showAllCustomar", compact("customar"));
    // return view("showAllCustomar", ['customar' => $customar]);


}




{{--  end show data  --}}

{{--  start update data  --}}

{{ route('admin.product.edit', $productss->id) }}

<a href="{{ route('editeCats', $result->id) }}">Edet</a> 
{!! Form::open(array('route' => 'updatCat', 'name' => 'editForm')) !!}

// update data cat
public function editeCat($id){
    $Categorys = Category::where("id", $id)->first();
    return view("admin.category.editCategory",['Category' => $Categorys]);
}

public function update(Request $request){
    $category = Category::find($request->categoryId);

    $category->categoryName = $request->categoryName;
    $category->shortDesc = $request->shortDesc;
    $category->shortDesc = $request->shortDesc;
    $category->publicationStatus = $request->publicationStatus;


    $category->save();

    return redirect()->route('mamageCat')->with("msg", "Category Update successfully.");

}

public function update(student $student)
{
    $student->update($this->validation());

    return redirect()->route('student.create')->with("msg", "Data insert successfully");
}

{{-- select optoin update  --}}
<script type="text/javascript">
    document.forms['editForm'].elements['publicationStatus'].value='{{ $Category->publicationStatus }}';
</script>

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
    or 

    public function product_update($id){
        $products = product::find($id);
        return view("admin.pages.product.update")->with('productss', $products);
    }

    // update product
    public function product_edit(Request $request, $id){
        $product = product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->slug = str_slug($request->title);
        $product->offet_price = 6;
        $product->category_id = 1;
        $product->brand_id = 1;
        $product->admin_id = 1;


        $product->save();
        return redirect()->route('admin.product.viewAllProduct');
      }


// Route::get("/category/addCategory", "CategoryController@index");
Route::get("/category/addCategory", "CategoryController@index")->name("addCategory");



{{-- delete Date --}}

    // delete category
    public function deleteCat($id){
        $categoryDelete = Category::find($id);
        $categoryDelete->delete();
 
        return redirect()->route('mamageCat')->with("msg", "Delete Categoru successfully.");
     }
 
     {{-- group rouet --}}

     Route::prefix('category')->group(function(){

        Route::get("/addCategory", "CategoryController@index")->name("addCategory");
        Route::post("/save", "CategoryController@saveData");
    
       
    });
     
Route::group(['prefix' => 'admin'], function () {
    Route::get("/", "adminPageController@index")->name("admin.index");
    Route::get('/product/create', 'adminPageController@product_create')->name('admin.product.create');
 
});



<form action="students/{{ $result->id }}" method="POST">
    @method("DELETE")
@csrf

<button type="submit"> Delete</button>
</form>

public function destroy(student $student)
{
   $student->delete();
}



{{--  strat Model Factories  --}}

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'catName' => $faker->name,
    ];
});


public function run()
{
    // $this->call(UsersTableSeeder::class);

    factory(App\Category::class, 10)->create();
}
}
//data seed
php artisan db:seed

php artisan make:seed RolsTablaeSeeder
use App\Role;
Role::truncate;

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'author']);
        Role::create(['name' => 'user']);
{{--  esn Model Factories  --}}


{{--start  paginations   --}}
$Categorys = DB::table('categories')->paginate(5);
{{ $category->links() }} 




{{--  middleware  --}}

php artisan make:middleware MiddlewareName
<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        echo "Role asscited with:". $role;
        return $next($request);
    }
}

'Role' => \App\Http\Middleware\RoleMiddleware::class,

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index(){
        echo "This controller";
    }
}



{{--  url pathe  --}}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class URLController extends Controller
{
    public function index(Request $request){
        $path = $request->path();
        echo $path."<br>";

        $patten = $request->is("foo/*");
        echo $patten;

        $url = $request->url();
        echo "URL method".$url;


    }
}

Route::get('/foo/bar', 'URLController@index');


{{--  from section  --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/user/registation" method="post">
        <table>
            <tr>
                <td>Name:</td>
                <td><input name="name" type="text"></td>
            </tr>
            <tr>
                <td>User Name:</td>
                <td><input name="userName" type="text"></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><input name="password" type="text"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table>
        @csrf
    </form>
</body>
</html>

Route::get("/Registration", "UserRegistration@index");
Route::post("/user/registation", "UserRegistration@stroe");

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegistration extends Controller
{
    public function index(){
        return view('ragistation');
    }

    public function stroe(Request $request){
        $name = $request->input('name');
        echo $name;
        echo "<br>";

        $userName = $request->input('userName');
        echo $userName;
        echo "<br>";

        $password = $request->input('password');
        echo $password;
        echo "<br>";
    }

}
{--  comment  --}}
 


{{--  start email  --}}
C:\xampp\htdocs\laraStudent>php artisan make:mail contactFormController --markdown==emails.contact.contact-form


{{--  commend  --}}
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
php artisan make:middleware MiddlewareName


<?php
namespace App\Http\Middleware;
use Closure;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        echo "Role asscited with:". $role;
        return $next($request);
    }
}

/* migration  and table*/
 $table->bigIncrements('braId');
            $table->string('brandName');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
			
			
$table->float('amount');
$table->mediumText('description');
$table->decimal('amount', 5, 2);
$table->double('column', 15, 8);
$table->longText('description');
$table->tinyInteger('numbers');
$table->string('email');	
$table->string('name', 100);
$table->text('description');
->nullable()
->default($value)
->default($value)
->unsigned()
			

{{-- image upload --}}

$image = new UploadModel;

if($request->hasFile('image')){
    $image->image = $request->image->store('public/image');
}
$image->save();


   @foreach ($images as $result)
                    <img src='{{ Storage::url($result->image) }}' all='image'; />
                @endforeach
				
				
	
	/* Generating Factories	 */
	<?php

use Illuminate\Database\Seeder;

use App\product;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(product::class, 100)->create();
    }
}


/*relationshif data base*/

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function image(){
        return $this->hasOne(product_images::class);
       //return $this->belongsTo(product_images::class, id);
    }
}

//multi image
{{--  @foreach($result->image as $images)
		<img style="width: 60px" src="{{ asset("image/product") }}/{{ $images->image }}" alt="Product Image" class="img-thumbnail">
	@endforeach  --}}
	
	 // public function image(){
    //     return $this->hasMany(productImage::class, 'productId');
    // }

<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\Relation;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::with('user', 'category')->get();
        return $post;
    }
	?>
	
	<?php

namespace App;

   //    $Product = Product::with('category', 'brand')->get();
        // return $Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class, "userId");
    }

    public function category(){
        return $this->belongsTo(Category::class, 'catId');
    }
}


//msg
      <div class="form-body">
                   <div class="form-group">
                        <label for="inputAddress" class="col-sm-2 control-label"></label>
                        <div class="col-sm-7">
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
                        </div>
                    </div>
                </div>
?>





				