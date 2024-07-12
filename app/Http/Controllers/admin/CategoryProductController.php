<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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
                        <a class="d-flex justify-content-center align-items-center w-full mx-1 mb-1 text-xs text-center add-size-btn transition duration-500 borderrounded-md select-none ease focus:outline-none focus:shadow-outline text-decoration-none d-flex align-items-center"
                        href="' . route('create_size', $size->sizeID) . '"
                        title="Tambah Size Baru">
                            <img src="\assets\crud_admin\size-light.svg" class="add-img" alt="" >
                        </a>
                        <a class="block w-full px-2 py-1 mx-1 mb-1 text-xs text-center update-btn transition duration-500 borderrounded-md select-none ease focus:outline-none focus:shadow-outline text-decoration-none d-flex align-items-center"
                        href="' . route('produk.edit', $size->sizeID) . '"
                        title="Edit Produk">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </a>
                        <form class="block w-full" onsubmit="return confirm(\'Apakah anda yakin?\');" action="' . route('produk.destroy', $size->sizeID) . '" method="POST">
                            <button class="w-full px-2 py-1 mx-1 text-xs del-btn transition duration-500 bg-red-500 border border-red-500 rounded-md select-none ease hover:bg-red-600 focus:outline-none focus:shadow-outline"
                                    title="Hapus Produk">
                                <i class="fa fa-trash-o" style="font-size:15px"></i>
                            </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>
                    </div>
                    ';
                })

                ->rawColumns(['action'])  //untuk munculin column yang dibuat diatas terender dengan baik
                ->make(true);
        }
        return view('admin.product.category', compact('size', 'category'));
    }
}

