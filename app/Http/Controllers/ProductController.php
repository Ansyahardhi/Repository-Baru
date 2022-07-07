<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Product::query();

            return DataTables::of($query)
                ->addColumn('action', function($item){
                    return '
                        
                        <form class="inline-block" action="'. route('dashboard.product.destroy', $item->id) .'" method="POST">
                            <button class="bg-red-600 text-white rounded-md px-2 py-1 m-2">
                                Hapus
                            </button>
                            <button>
                                <a href="'. route('dashboard.product.gallery.index', $item->id) .'" class="bg-gray-800 text-white rounded-md px-2 py-1 m-2">
                                    Gallery
                                </a>
                            </button>
                            <button>
                                <a href="'. route('dashboard.product.edit', $item->id) .'" class="bg-gray-800 text-white rounded-md px-2 py-1 m-2">
                                    Edit
                                </a>
                            </button>
                            '. method_field('delete') . csrf_field() .'
                        </form>
                    ';
                })
                ->editColumn('harga', function($item){
                    return number_format($item->harga);
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.frontend.dashboard.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.frontend.dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        Product::create($data);

        return redirect()->route('dashboard.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.frontend.dashboard.product.edit', [
            'item' => $product
        ]);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        $product->update($data);

        return redirect()->route('dashboard.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.product.index');
    }
}