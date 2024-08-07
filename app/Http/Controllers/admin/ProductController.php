<?php

namespace App\Http\Controllers\admin;

use App\Models\Size;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ProductRequest;
use App\Http\Requests\admin\SizeRequest;
use App\Http\Requests\admin\UpdateSizeRequest;
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
                ->editColumn('thumbnail', function ($size) {
                    return '<img src="' . $size->product->thumbnail . '" alt="Thumbnail" class="w-20 mx-auto rounded-md">';
                })
                ->addColumn('action', function ($size) {
                    return '
                    <div class="crud-btn">
                        <a class="d-flex justify-content-center align-items-center w-full mx-1 mb-1 text-xs text-center add-size-btn transition duration-500 borderrounded-md select-none ease focus:outline-none focus:shadow-outline text-decoration-none d-flex align-items-center"
                        href="' . route('CreateSize', $size->sizeID) . '"
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

                ->rawColumns(['action', 'thumbnail'])  //untuk munculin column yang dibuat diatas terender dengan baik
                ->make(true);
        }

        return view('admin.product.manage', compact('size'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Size $size)
    {
        return view('admin.product.create', compact('size'));
    }

    public function createsize($id)
    {
        $size = Size::find($id);
        return view('admin.product.create_size', compact('size'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = $request->validated();
        $pictures = [];

        if ($request->input('picture')) {
            foreach ($request->file('picture') as $picture) {
                $picture_path = $picture->store('public/product');

                //push to array
                array_push($pictures, $picture_path);
            }
        } else {
            // make a 800x 600 placeholder picture as a default for no profile picture path
            $picture_path = '/product/default.jpg';
            array_push($pictures, $picture_path);
        }

        $product['productPicturePath'] = json_encode($pictures);

        $sizeData = array_intersect_key($product, array_flip(['productID', 'size', 'stock']));
        $productData = array_intersect_key($product, array_flip([
            'productID', 'productName', 'productPrice', 'productCategory',
            'productDescription', 'productWeight', 'productPicturePath', 'forGender'
        ]));

        Product::create($productData);
        $latestproduct = Product::latest()->first();
        $sizeData['productID'] = $latestproduct->productID;

        Size::create($sizeData);


        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil dibuat');
    }

    public function storesize(SizeRequest $request, $id)
    {
        $size = Size::where('productID', $id)->first();
        $sizeID = $size->sizeID;
        $data = $request;

        $data['productID'] = $id;

        $existingSizes = Size::where('productID', $id)->get();
        foreach ($existingSizes as $existingSize) {
            if ($existingSize->size == $request->size) {
                return redirect()->route('CreateSize', ['produk' => $sizeID])->withErrors('size', 'Ukuran sudah ada!');
            }
        }

        $sizeData = $data->only(['productID', 'size', 'stock']);

        // dd($productData, $sizeData);
        Size::create($sizeData);

        return redirect()->route('produk.index')
            ->with('success', 'Size berhasil dibuat');
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
    public function edit($id)
    {
        $size = Size::find($id);

        return view('admin.product.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSizeRequest $request, Size $produk)
    {
        $size = Size::find($produk->sizeID);
        $product = Product::find($size->productID);


        $existingSizes = Size::where('productID', $size->productID)->get();
        foreach ($existingSizes as $existingSize) {
            if ($existingSize->size == $request->size && $existingSize->sizeID != $size->sizeID) {
                return redirect()->route('produk.edit', ['produk' => $produk])->withErrors('size', 'Ukuran sudah ada!');
            }
        }

        $pictures = [];


        $data = $request;
        if ($request->hasFile('picture')) {

            foreach ($request->file('picture') as $picture) {
                $picture_path = $picture->store('public/product');

                //push to array
                array_push($pictures, $picture_path);
            }
            $data['productPicturePath'] = $pictures;
        } else {
            $data['productPicturePath'] = $product->productPicturePath;
        }


        $sizeData = $data->only(['productID', 'size', 'stock']);
        $productData = $data->only(['productID', 'productName', 'productPrice', 'productCategory',  'productDescription', 'productWeight',  'productPicturePath', 'forGender']);
        $product->update($productData);
        $size->update($sizeData);

        return redirect()->route('produk.index')
            ->with('success', 'Product berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $size = Size::find($id);
        $size->delete();
        return redirect()->route('produk.index')
            ->with('success', 'Product berhasil dihapus');
    }
}
