<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    protected $viewPostfix = '';
    public function __construct()
    {
        if (App::getLocale() == 'en') {
            $this->viewPostfix = '_en';
        }
    }
    
    public function index(){
      $products=Product::take(8)->get();
      $categories=Category::with('product')->get();       
       //$banners=Banner::where('location','top')->latest()->first();  
        //$banner=Banner::all();  
        
      $Cproduct=Product::take(3)->where('trending',1)->with('category')->get();
     //$Cproduct=Product::with('category')->get();
       $tops=HomeSlider::where('status',1)->where('type','top')->take(3)->get();
       $bottom=HomeSlider::where('status',1)->where('type','bottom')->get();

        return view('user.includes.home',compact('products','tops','bottom','Cproduct','categories'));
    }
    public function category(){
        $categories=Category::orderby('created_at','DESC')->get()->take(9);
        return view('user.category',compact('categories'));
    }
    public function product(){
        return view('user.products');
    }
    public function shopping($id){
       
        $product = Product::where('id',$id)->with('images','color.color','size.size')->first();
        $related_products = Product::where('category_id',$product->category->id)->take(4)->get();
        
        return view('user.shopping',get_defined_vars());
    }
    public function arrival(){
        $arrival_products=Product::orderby('created_at','DESC')->get()->take(9);
        return view('user.arrival',compact('arrival_products'));
    }
     public function viewcategory($slug_ar){
         if(Category::where('slug_ar',$slug_ar)->exists()){
           $category=Category::where('slug_ar',$slug_ar)->first();
             $category_products=Product::where('category_id',$category->id)->where('status',0)->take(9)->get();
           return view('user.view_product',compact('category','category_products'));

        }
       else{
             return redirect('/')->with('status','  not exists');
          }

     }


    public function cart(){

return view('user.cart');

    }
    public function contact(){

return view('user.contactUs');

    }

    public function aboutUs(){

        return view('user.about us');
    }
    public function productview($slug_ar,$_prod_slug_ar){
        if(Category::where('slug_ar',$slug_ar)->exists()){
            if(Product::where('prod_slug_ar',$slug_ar)->exists())
            {
               $Detail_product=Product::where('prod_slug_ar',$slug_ar)->first();
               return view('user.shopping',compact('Detail_product'));
            }
            else{
                return redirect('/')->with('status','The link was broken');
            }

        }
        else{
            return redirect('/')->with('status','No such category found');
        }

       
    }
}
