<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\Template_ProductModel;
use App\Models\CategoryModel;

use App\Models\UserListExport;
use Response;
use Excel;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductModel::getProductList([
            'id', 
            'SKU',
            'name',
            'brand',
            'category_id',
            'description',
            'unitName',
            'unitValue',
            'buyPrice',
            'images',
            'status' ,
            'tags',
            'created_by',
            'updated_by'
        ]);

        //echo Response::json($products);
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createClassify()
    {
        $categories = CategoyModel::getCategoryByParentId(null);
        //return Response::jon($categories);
        return view('categories.index', ['categories' => $categories]);
    }

    public function createDetails($categoryId)
    {
        $template = Template_ProductModel::getTemplateByCategoryId($categoryId);
        //return Response::jon($template);
        return view('products.formExample', ['category_id' => $categoryId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeClassify(Request $request)
    {
        $lastCategory = $request->input('lastCategory');
        //return $lastCategory;
        return $lastCategory;
    }

    public function storeDetails(Request $request)
    {
        $newProduct = $request->only([
            'SKU',
            'name',
            'brand',
            'category_id',
            'description',
            'unitName',
            'unitValue',
            'buyPrice',
            'images',
            'status' ,
            'tags',
            'created_by',
            'updated_by'
        ]);
        
        ProductModel::create($newProduct);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = ProductModel::getProductById($id);
        //return Response::json($products);
        return view('products.show', ['products'=>$products[0]]);
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
        $options = $request->all();
        ProductModel::updateProduct($id, $options);
    }

    public function export(){
        $products = ProductModel::select('SKU', 'name', 'brand', 'category_id')->get();
        Excel::create('products', function($excel) use($products) {
            $excel->sheet('Sheet 1', function($sheet) use($products) {
                $sheet->fromArray($products);
            });
        })->export('xls');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductModel::destroy($id);
    }
}
