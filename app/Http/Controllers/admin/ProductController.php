<?php

namespace App\Http\Controllers\admin;

use App\Models\Size;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $size = Size::with('product')->get();
        if (request()->ajax()) {
            return DataTables::of($size)
                // ->editColumn('thumbnail', function ($product) {
                //     return '<img src="' . $product->thumbnail . '" alt="Thumbnail" class="w-20 mx-auto rounded-md">';
                // })
                ->addColumn('action', function ($size) {
                    return '
                    <div class="crud-btn">
                    <a class="block w-full px-2 py-1 mx-1 mb-1 text-xs text-center update-btn transition duration-500 borderrounded-md select-none ease focus:outline-none focus:shadow-outline text-decoration-none"
                        href="/">
                        <i class="far fa-edit"></i>
                    </a>
                    <form class="block w-full" onsubmit="return confirm(\'Apakah anda yakin?\');" -block" action="/" method="POST">
                    <button class="w-full px-2 py-1 mx-1 text-xs del-btn transition duration-500 bg-red-500 border border-red-500 rounded-md select-none ease hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                        <i class="fa fa-trash-o" style="font-size:24px"></i>
                    </button>
                        ' . method_field('delete') . csrf_field() . '
                    </form>
                    </div>
                    ';
                })

                ->rawColumns(['action'])  //untuk munculin column yang dibuat diatas terender dengan baik
                ->make(true);
        }

        return view('admin.manageproduct');
    }

    public function orderdetail()
    {
        return response()->view('admin.or   derdetail', [
            "orderID" => "halo123"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $produk)
    {
        $produk->update($request->all());
        return redirect()->route('admin.manageproduct')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $produk)
    {
        $produk->delete();
    }
}
