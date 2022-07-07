<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
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
            $query = Transaksi::query();

            return DataTables::of($query)
                ->addColumn('action', function($item){
                    return '
                        <button>
                            <a href="'. route('dashboard.transaction.show', $item->id) .'" class="bg-red-600 text-white rounded-md px-2 py-1 m-2">
                                 Show
                            </a>
                        </button>
                        <button>
                            <a href="'. route('dashboard.transaction.edit', $item->id) .'" class="bg-gray-800 text-white rounded-md px-2 py-1 m-2">
                                 Edit
                            </a>
                        </button>
                    ';
                })
                ->editColumn('total_harga', function($item){
                    return number_format($item->total_harga);
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.frontend.dashboard.transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        if(request()->ajax())
        {
            $query = TransaksiItem::with('product')->where('transaksi_id', $transaksi->id);

            return DataTables::of($query)
                ->editColumn('product.harga', function($item){
                    return number_format($item->product->harga);
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.frontend.dashboard.transaction.show', compact('transaksi'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
