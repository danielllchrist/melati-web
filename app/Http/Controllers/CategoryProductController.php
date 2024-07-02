<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class CategoryProductController extends Controller
{
    public function category($category)
    {
        $size = DB::table('sizes')->join('products', 'sizes.productID', '=', 'products.productID', 'inner')->where('products.productCategory', '=', $category)->select('products.*', 'sizes.*')->get();
        if (request()->ajax()) {
            return DataTables::of($size)
                // ->editColumn('thumbnail', function ($product) {
                //     return '<img src="' . $product->thumbnail . '" alt="Thumbnail" class="w-20 mx-auto rounded-md">';
                // })
                ->addColumn('action', function ($size) {
                    return '
                    <div class="crud-btn">
                    <a class="block w-full px-2 py-1 mx-1 mb-1 text-xs text-center text-white transition duration-500 bg-gray-700 border border-gray-700 rounded-md select-none ease hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                        href="/">
                        edit
                    </a>
                    <form class="block w-full" onsubmit="return confirm(\'Apakah anda yakin?\');" -block" action="/" method="POST">
                    <button class="w-full px-2 py-1 mx-1 text-xs text-white transition duration-500 bg-red-500 border border-red-500 rounded-md select-none ease hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                        delete
                    </button>
                        ' . method_field('delete') . csrf_field() . '
                    </form>
                    </div>
                    ';
                })

                ->rawColumns(['action'])  //untuk munculin column yang dibuat diatas terender dengan baik
                ->make(true);
        }
        return view('admin.manageproductcategory', compact('size', 'category'));
    }
}
