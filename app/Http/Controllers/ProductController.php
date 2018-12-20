<?php

namespace App\Http\Controllers;

use App\model\product;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\product\productResource;
use App\Http\Resources\product\productCollection;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Exceptions\productNotBelongsToUser;
use Auth;
class ProductController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth:api')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return productCollection::collection(product::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
       //return $request->all();
        //`name`, `detail`, `price`, `stock`, `discount`
        $product = new product;
        
        $product->name      = $request->name;
        $product->detail    = $request->description;
        $product->price     = $request->price;
        $product->stock     = $request->stock;
        $product->discount  = $request->discount;
        $product->user_id  = $request->user_id;
        
        $product->save();
        
        //لعرض الداتا
        return response(
                [
                    'data' => new productResource($product)//هياخد الداتا ويحولها 
                ], Response::HTTP_CREATED);
                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return new productResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $this->productUserCheck($product);
        $request['detail'] = $request->description; //upfsted description into detail
        unset($request['description']); //Remove description
        $product->update($request->all()); //updated data
       
        return response(
                [
                    'data' => new productResource($product)//هياخد الداتا ويحولها 
                ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $this->productUserCheck($product);
        $product->delete();
        return response(
                [
                    null
                ], Response::HTTP_NO_CONTENT);
    }
    
    public function productUserCheck($product) {
        if(Auth::id() !== $product->user_id)
        {
            throw new productNotBelongsToUser;
        }
        
    }
}
