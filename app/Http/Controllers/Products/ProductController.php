<?php

namespace App\Http\Controllers\Products;

use App\Http\Resources\CategoriesResource;
use App\Http\Resources\ProductResource;

use App\Http\Resources\ProductsResource;
use App\Models\Products\Brand;
use App\Models\Products\Category;
use App\Models\Products\Product;
use App\Models\Products\SubCategory;
use App\Models\Products\Uom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

          $product = Product::WithRels()->get();

        $produc =  new ProductsResource($product);

        $indexColumns = $produc->indexColumns();
        $indexData = json_encode($produc->indexData());

        $category = Category::all();
        $categoryR = new CategoriesResource($category);
        $categoryIndexColumns = $categoryR->indexColumns();
        $categoryIndexData = json_encode($categoryR->indexData());

        return view('products.index', ['indexColumns' => $indexColumns,
        'categoryIndexColumns' =>$categoryIndexColumns,'categoryIndexData' =>$categoryIndexData
        ]);


        $products = Product::with(['uom','brand'])->get();
        //return $products->uom->id;
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function listapi()
    {
        $product = Product::WithRels()->get();
       ProductsResource::withoutWrapping();
        $products = new ProductsResource($product);
       // return $products->indexColumns();
        return $products->indexData();



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
                $productId= Product::findOrFail($id);

            }
            $category = Category::get()->pluck('sc','name')->toArray();
            $subCategory = SubCategory::with('category')->get(['id', 'name']);
            //$sub = $subCategory->toArray()->only(['name','category.name','id']);
            $brand = Brand::pluck('brand', 'id');
            $uom = Uom::pluck('uom', 'id');
            //return $category;


            return view('products.productcreate', ['category_id' => $category,
                'sub_category_id' =>$subCategory,'brand_id' =>$brand,'uom_id'=>$uom,
                'productId'=>$productId
            ]);
        }


    }


    public function apiShow($id)
    {
$product = Product::findOrFail($id);
        return view('products.productshow', ['products' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'category' => 'required|max:10',
            'uom' => 'required|max:10',

        ]);
        if ($validator->passes()) {

            $post = new Product();
            $post->name = $request->input('name');
            $post->sub_category_id = $request->input('category');
            $post->uom_id = $request->input('uom');
            $post->brand_id = $request->input('brand_id');

            /** @noinspection Annotator */
            $post->model = $request->input('model');
            $post->uom_id = $request->input('uom');
            // dd($post->name);
            //return $request->input('name');
            $name = $request->input('options.name');
            $value = $request->input('options.value');
            $option = array_combine($name, $value);
            $request->replace(['options' => $option]);

            //dd($request->input('name'));

            $post->options = $option;

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = Product::with(['brand','uom','type','subCategory'])->find($id);
        $tmp = $product->prerequisites()->pluck('prerequisites')->first();
        $ar =  $tmp[0];
       $pp = Product::whereIn('id',$tmp)->with(['brand','subCategory'])->get()->pluckar('id','name','subCategory.category.name','brand.brand');
       return $pp;
       ProductResource::withoutWrapping();
        return new ProductResource($product);
        //return view('products.show',compact('product'));
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'category' => 'required|max:10',
            'uom' => 'required|max:10',

        ]);
        if ($validator->passes()) {

            $post = Product::findOrFail($id);
            $post->name = $request->input('name');
            $post->sub_category_id = $request->input('category');
            $post->uom_id = $request->input('uom');
            $post->brand_id = $request->input('brand_id');
            $post->model = $request->input('model');
            $post->uom_id = $request->input('uom');
            // dd($post->name);
            //return $request->input('name');
            $name = $request->input('options.name');
            $value = $request->input('options.value');
            $option = array_combine($name, $value);
            $request->replace(['options' => $option]);

            //dd($request->input('name'));

            $post->options = $option;

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        try {
            $item->delete();

        } catch (\Exception $e) { // I don't remember what exception it is specifically

            //Flash::error('something went wrong');
            return Response::json(['errors' => $e->getMessage()]);

        }


        return Response::json(['success' => '1']);
    }

}
