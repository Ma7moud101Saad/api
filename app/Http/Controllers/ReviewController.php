<?php

namespace App\Http\Controllers;

use App\model\review;
use App\model\product;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\reviewRequest;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(product $product)
    {
        return ReviewResource::collection($product->reviews);
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
    public function store(reviewRequest $request , product $product)
    {
        $review = new Review($request->all());
        $product->Reviews()->save($review);
        return response(['date'=>new ReviewResource($review)],Response::HTTP_CREATED);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product, review $review)
    {
        $review->update($request->all());
        return response(['date'=>new ReviewResource($review)],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product,review $review)
    {
        $review->delete();
                return response(
                [
                    null
                ], Response::HTTP_NO_CONTENT);
    }
}
