<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request as FacadesRequest;

class HomeController extends Controller
{
    protected $viewPostfix = '';
    // public function __construct()
    // {
    //     if (App::getLocale() == 'en') {
    //         $this->viewPostfix = '_en';
    //     }
    // }
    
    public function index(){
      $products=Product::orderby('created_at','DESC')->inRandomOrder()->where('status',1)->take(8)->get();
      $categories=Category::with('product')->get()
      ->map(function ($query) {
        $query->product = $query->product->take(3);
        return $query;
         });
     
      $Cproduct=Product::take(3)->where('trending',1)->with('category')->get();
     //$Cproduct=Product::with('category')->get();
       $tops=HomeSlider::where('status',1)->where('type','top')->take(3)->get();
       $bottom=HomeSlider::where('status',1)->where('type','bottom')->take(3)->get();

        return view('user.includes.home',compact('products','tops','bottom','Cproduct','categories'));
    }
    
    public function moreProduct(){
     
        $more_products=Product::where('trending',1)->take(9)->get();   
        if(FacadesRequest::get('sort')== 'newest'){
          $more_products=Product::orderby('created_at','DESC')->get()->take(9);  
        }
        elseif(FacadesRequest::get('sort')== 'price_desc'){
            $more_products=Product::orderby('orginal_price','DESC')->get()->take(9);  

        }
        elseif(FacadesRequest::get('sort')== 'price_asc'){
            $more_products=Product::orderby('orginal_price','ASC')->get()->take(9);  
        }
        else
        {
            $more_products=Product::where('trending',1)->get()->take(9);  
   
        }
        
        return view('user.more-product',compact('more_products'));

    }
    public function category(){
        $categories=Category::orderby('created_at','DESC')->get()->take(9);
        return view('user.category',compact('categories'));
    }
    public function product(){
        return view('user.products');
    }
    public function shopping($id){
        
       
        $product = Product::where('id',$id)->with('images','color.color','size')->first();
        $related_products = Product::where('category_id',$product->category->id)->take(4)->get();
        
        
        return view('user.shopping',get_defined_vars());
    }


    public function arrival(Request $request){
        
        $size = $request->size;
        $range = null;
        if ($request->min_range && $request->max_range) {
            # code...
            $range = [$request->min_range,$request->max_range];
        }

        $categories = Category::get();

        $arrival_products=Product::orderby('created_at','DESC')
        ->when($size, function($query, $size) {
            $query->whereHas('size' , function($q) use ($size){
                $q->whereIn('sizes.id' ,$size);
             });
         })
         ->when($range, function($query, $value) {
            $query->whereBetween('orginal_price',[$value[0],$value[1]]);
          }) 
         ->when($request->category, function($query, $value) {
            $query->where('category_id',$value);
          }) 
         ->where('status',1)
        ->get()->take(9);

        $min_price = $arrival_products->sortBy(['orginal_price','desc'])->first();
        $max_price = $arrival_products->sortBy(['orginal_price','desc'])->last();
        $sizes = Size::orderBy('size')->get();

        return view('user.arrival',compact('arrival_products','categories','min_price','max_price','sizes'));
    }
    //-------------------------------------------------------------=======================

     public function viewcategory(Request $request,$slug_ar){

       /*  if($request->slug_ar){
            return redirect()->route('category.detalis',$request->slug_ar);
        } */
        
         $categories = Category::get();
         $sizes = Size::orderBy('size')->get();
         if(Category::where('slug_ar',$slug_ar)->exists()){
             
             $category=Category::where('slug_ar',$slug_ar)->with('product')->first();
        
            
             $size = $request->size;
             $range = null;
             if ($request->min_range && $request->max_range) {
                 # code...
                 $range = [$request->min_range,$request->max_range];
             }
            
             $category_products=Product::where('category_id',$category->id)
             ->when($size, function($query, $size) {
                $query->whereHas('size' , function($q) use ($size){
                    $q->whereIn('sizes.id' ,$size);
                 });
             })
             ->when(FacadesRequest::get('sort'), function($query, $sort) {
                 if ($sort == 'newest') {
                     $query->orderby('created_at','DESC');
                 }
                 elseif($sort== 'price_desc'){
                    $query->orderby('orginal_price','DESC');  
              
                       }
                elseif($sort == 'price_asc'){
                    $query->orderby('orginal_price','ASC');  
                   }
             })
             ->when($range, function($query, $value) {
                $query->whereBetween('orginal_price',[$value[0],$value[1]]);
              }) 
             ->where('status',1)->take(9)->get();
             $min_price = $category_products->sortBy(['orginal_price','desc'])->first();
             $max_price = $category_products->sortBy(['orginal_price','desc'])->last();

             
             return view('user.view_product',compact('category','category_products','categories','sizes','min_price','max_price'));


        }
       else{
             return redirect('/')->with('status','  not exists');
          }

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
