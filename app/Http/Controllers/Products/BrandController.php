<?php

namespace App\Http\Controllers\Products;

use App\Http\Resources\BrandsResource;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductsColumns;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\SubCategoriesResource;
use App\Models\Products\Brand;
use App\Models\Products\Category;
use App\Models\Products\Product;
use App\Models\Products\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

    }

    public function listapi()
    {
        $product = Brand::all();
       BrandsResource::withoutWrapping();
        $products = new BrandsResource($product);
       // return $products->indexColumns();
        return $products->indexData();



    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Brand::find($id);
        try {
            $item->delete();

        } catch (\Exception $e) { // I don't remember what exception it is specifically

            //Flash::error('something went wrong');
            return Response::json(['errors' => $e->getMessage()]);

        }


        return Response::json(['success' => '1']);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'required|max:50'

        ]);
        if ($validator->passes()) {

            $post = new Brand();
            $post->brand = $request->input('brand');
            $post->description = $request->input('description');

            $notification0 = array(
                'message' => 'I am a successful message!',
                'alert-type' => 'success'
            );
            $notification1 = array(
                'message' => 'Operation failed!',
                'alert-type' => 'error'
            );


            try {
                $post->save();

            } catch (\Exception $e) { // I don't remember what exception it is specifically

                //Flash::error('something went wrong');
                return Response::json(['errors' => $e->getMessage()]);

            }


            return Response::json(['success' => '1']);
        }


        $notification1 = array(
            'message' => 'Operation failed!',
            'alert-type' => 'error'
        );
        // Session::put($notification1);
        // $post = Product::create($request->all());
        return Response::json(['errors' => $validator->errors()]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'required|max:50'

        ]);
        if ($validator->passes()) {

            $post = Brand::findOrFail($id);
            $post->brand = $request->input('brand');
            $post->description = $request->input('description');

            $notification0 = array(
                'message' => 'I am a successful message!',
                'alert-type' => 'success'
            );
            $notification1 = array(
                'message' => 'Operation failed!',
                'alert-type' => 'error'
            );


            try {
                $post->save();

            } catch (\Exception $e) { // I don't remember what exception it is specifically

                //Flash::error('something went wrong');
                return Response::json(['errors' => $e->getMessage()]);

            }


            return Response::json(['success' => '1']);
        }


        $notification1 = array(
            'message' => 'Operation failed!',
            'alert-type' => 'error'
        );

        // $post = Product::create($request->all());
        return Response::json(['errors' => $validator->errors()]);
    }
    public function apiCreate(Request $request,$id=null,$action=null)
    {
        // dd(Input::get('idk'));
        $action = Input::get('action');
        $id = Input::get('id');
        if($action==null)
        {
            if($id==null)
            {
                return;
            }
            return $this->apiShow($id);
        }
        if($action=="create" || $action == "edit")
        {
            $productId = null;

            if($action == "edit")
            {
                if($id == null)
                {
                    return;
                }
                $productId= Brand::findOrFail($id);

            }
            // $category = Category::get()->pluck('sc','name')->toArray();
            // $subCategory = SubCategory::with('category')->get(['id', 'name']);
            //$sub = $subCategory->toArray()->only(['name','category.name','id']);
            //  $brand = Brand::pluck('brand', 'id');
            //  $uom = Uom::pluck('uom', 'id');
            //return $category;


            return view('products.brandcreate', [
                'productId'=>$productId
            ]);
        }


    }



    public function apiShow($id)
    {
        // return $id;

        $product = Brand::findOrFail($id);
        // return $product->toJson();

        return view('products.brandshow', ['products' => $product
        ]);
    }
}
