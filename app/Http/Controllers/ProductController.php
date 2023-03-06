<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\SeacrchHistory;

use App\Http\Requests\ProductCreateRequest;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index', [ 'products' => Product::all() ]);
    }

    public function my_products()
    {
        return view('product.index', [ 'products' => Auth::user()->get_products ]);
    }

    public function product_create(ProductCreateRequest $request)
    {
        $validated = $request->validated();

        $product = new Product;

        $product->name = $validated['name'];

        $product->price = $validated['price'];

        $product->type = $validated['type'];
        
        $product->user = Auth::user()['id'];

        $product->save();

        return redirect('/');
    }

    public function search_product(Request $request)
    {

        $product = new Product();

        if($request->name){
            
            $product = $product->orWhere('name', 'LIKE', "%{$request->name}%");

        }

        if($request->price_from){
            
            $product = $product->orWhere('price', '>=', $request->price_from);

        }

        if($request->price_to){
            
            $product = $product->orWhere('price', '<=', $request->price_to);

        }

        if($request->type != "Без разницы"){
            
            $product = $product->orWhere('type', '=', $request->type);

        }

        if( Auth::user()['type_user'] == 'customer' ){

            $seacrchHistory = new SeacrchHistory;

            $seacrchHistory->name = $request->name;

            $seacrchHistory->price_from = $request->price_from;

            $seacrchHistory->price_to = $request->price_to;

            $seacrchHistory->type = $request->type;
            
            $seacrchHistory->user = Auth::user()['id'];

            $seacrchHistory->save();

        }

        return view('product.index', [ 'products' => $product->get() ]);
    }
}
