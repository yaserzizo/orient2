<?php

namespace App\Http\Controllers\Products;

use App\Http\Resources\CategoriesResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductsColumns;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\SubCategoriesResource;
use App\Models\Products\Category;
use App\Models\Products\Product;
use App\Models\Products\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
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
        $product = SubCategory::all();
       SubCategoriesResource::withoutWrapping();
        $products = new SubCategoriesResource($product);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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



    public function destroy($id)
    {
        $item = SubCategory::findOrFail($id);
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
            'name' => 'required|max:50'

        ]);
        if ($validator->passes()) {

            $post = new SubCategory();
            $post->name = $request->input('name');
            $post->category_id = $request->input('category');
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
            'name' => 'required|max:50'

        ]);
        if ($validator->passes()) {

            $post = SubCategory::findOrFail($id);
            $post->name = $request->input('name');
            $post->category_id = $request->input('category');
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
                $productId= SubCategory::findOrFail($id);

            }

            $category = Category::get()->pluck('sc','name')->toArray();

            return view('products.subcategorycreate', ['category_id' => $category,
                'productId'=>$productId
            ]);
        }


    }



    public function apiShow($id)
    {
        // return $id;

        $product = SubCategory::findOrFail($id);
        // return $product->toJson();

        return view('products.subcategoryshow', ['products' => $product
        ]);
    }
}
