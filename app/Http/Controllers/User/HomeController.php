<?php

namespace App\Http\Controllers\User;

use App\Models\Size;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
//use Jorenvh\Share\Share;
//use Jorenvh\Share\Share;
use App\Models\HomeSlider;
use App\Imports\ZonesImport;
use Illuminate\Http\Request;
use App\Imports\WeightImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Share;

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
     
        $more_products=Product::with('reviews')->where('trending',1)->whereHas('reviews')
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
        ->paginate(9);   
        
       
        $reviews =   Product::join('reviews', 'reviews.product_id', '=', 'products.id')
            ->select([
                'products.id', 'products.name_ar', 'products.name_en','image_ar','Selling_price','orginal_price',
                DB::raw('COUNT(reviews.product_id) as count'),
                DB::raw('AVG(reviews.rate) as rate')
            ])
            ->groupBy([
                'products.id', 'products.name_ar', 'products.name_en','image_ar','Selling_price','orginal_price',
            ])
            ->orderByRaw('COUNT(reviews.product_id) DESC')->where('trending',1)->take(5)->get();
    

        return view('user.more-product',compact('more_products','reviews'));

    }
    public function category(){
        $categories=Category::orderby('created_at','DESC')->paginate(9);
        return view('user.category',compact('categories'));
    }

    public function product(){
        return view('user.products');
    }

    public function shopping($id){
        
        $shareComponent = Share::page(
            URL::current(),
            'Your share text comes here',)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()        
            ->reddit();
            $category = Category::get();
            $product = Product::where('id',$id)->with('images','color.color','size')->first();
          
            if (Auth::user()) {
            if (Auth::user()->customer->order->where('status','completed')->first()) {
               
                $product_id = Auth::user()->customer->order->where('status','completed')->first()->orderProduct->where('product_id',$product->id)->first();
               //  return($product_id);
            }
          }
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

        $arrival_products = Product::orderby('created_at','DESC')
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
        ->paginate(9);

        $arrival_products = $arrival_products->appends($request->all());

        $min_price = $arrival_products->sortBy(['orginal_price','desc'])->first();
        $max_price = $arrival_products->sortBy(['orginal_price','desc'])->last();
        $sizes = Size::orderBy('size')->get();

        return view('user.arrival',compact('arrival_products','categories','min_price','max_price','sizes'));
    }
    //-------------------------------------------------------------=======================

     public function viewcategory(Request $request,$slug_ar){

      /*   if($request->slug_ar){
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
             ->where('status',1)->paginate(9);

             $reviews_products=Product::with('reviews')->where('category_id',$category->id)->whereHas('reviews')->take(5)->get();

             $min_price = $category_products->sortBy(['orginal_price','desc'])->first();
             $max_price = $category_products->sortBy(['orginal_price','desc'])->last();

             
             return view('user.view_product',compact('category','category_products','categories','sizes','min_price','max_price','reviews_products'));

             
              
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

    public function viewImport(){
        return view('user.formimport');
    }

    public function import(Request $request) 
    {
        Excel::import(new ZonesImport, $request->file('excel'));
        
        return redirect('/')->with('success', 'All good!');
    }
}
