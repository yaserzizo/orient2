<?php

namespace App\Http\Controllers\Suppliers;

use App\Http\Resources\Suppliers;
use App\Models\Products\Category;
use App\Models\Products\Product;
use App\Models\Suppliers\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product = Supplier::orderBy('created_at', 'desc')->get();

        $produc =  new Suppliers($product);

        $indexColumns = $produc->indexColumns();
        $indexData = json_encode($produc->indexData());
        $category = Category::get()->pluck('sc','name')->toArray();
        $sproducts = Product::with(['brand:id,brand','subCategory:id,name,category_id','subCategory.category:id,name'])->orderBy('id')->get(['id','name','sub_category_id','model','brand_id']);
        //$sproducts = Product::get(['id','sub_category_id as text]')->toJson();

     //   return \json_encode($roles);



        return view('suppliers.index', ['indexColumns' => $indexColumns,'category_id' => $category,
            'sproducts'=>$sproducts
        ]);


    }

    public function listapi()
    {
        $product = Supplier::all();
        Suppliers::withoutWrapping();
        $products = new Suppliers($product);
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
        $item = Supplier::findOrFail($id);
        try {
            $item->contacts()->delete();
            $item->delete();

        } catch (\Exception $e) { // I don't remember what exception it is specifically

            //Flash::error('something went wrong');
            return Response::json(['errors' => $e->getMessage()]);

        }


        return Response::json(['success' => '1']);
    }


    public function store(Request $request)
    {


       // return \json_encode($request->input('contacts'));
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50'

        ]);
        if ($validator->passes()) {

            $post = new Supplier();
            $post->name = $request->input('name');
            $post->address = $request->input('address');
            $post->notes = $request->input('notes');


            try {


                $post->save();
                $post->contacts()->delete();

                foreach ($request->input('contacts') as $k)
                {
                    if($k['name'] && $k['phone'])
                        $post->contacts()->create($k);

                }


            } catch (\Exception $e) { // I don't remember what exception it is specifically

                //Flash::error('something went wrong');
                return Response::json(['errors' => $e->getMessage()]);

            }


            return Response::json(['success' => '1']);
        }



        return Response::json(['errors' => $validator->errors()]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50'

        ]);
        if ($validator->passes()) {

            $post = Supplier::findOrFail($id);
            $post->name = $request->input('name');
            $post->address = $request->input('address');
            $post->notes = $request->input('notes');


            try {
                $post->contacts()->delete();
               // return \json_encode($request->input('contacts'));
                foreach ($request->input('contacts') as $k)
                {
                    if($k['name'] && $k['phone'])
                        $post->contacts()->create($k);

                }
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
                $productId= Supplier::findOrFail($id);

            }
            // $category = Category::get()->pluck('sc','name')->toArray();
            // $subCategory = SubCategory::with('category')->get(['id', 'name']);
            //$sub = $subCategory->toArray()->only(['name','category.name','id']);
            //  $brand = Brand::pluck('brand', 'id');
            //  $uom = Uom::pluck('uom', 'id');
            //return $category;


            return view('suppliers.suppliercreate', [
                'productId'=>$productId
            ]);
        }


    }



    public function apiShow($id)
    {
        // return $id;

        $product = Supplier::findOrFail($id);
        // return $product->toJson();

        return view('suppliers.suppliershow', ['products' => $product
        ]);
    }

    public function apisyncProducts($id,Request $request)
    {
        $data = Input::get('products');
        Supplier::findOrFail($id)->products()->sync($data);
       // $sproducts = Supplier::find($id)->products()->with(['brand:id,brand','subCategory:id,name,category_id','subCategory.category:id,name'])->orderBy('id')->get(['id','name','sub_category_id','model','brand_id']);

    return $data;
    }

    public function apiListProducts(Request $request)
    {
        $id = Input::get('id');
         $sproducts = Supplier::find($id)->products()->with(['brand:id,brand','subCategory:id,name,category_id','subCategory.category:id,name'])->orderBy('id')->get(['id','name','sub_category_id','model','brand_id']);

        return $sproducts;
    }
}
