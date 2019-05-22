<?php

namespace App\Http\Controllers;

use App\Item;
use App\Ppmp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Item::get();
        foreach( $items as $item ) {
            $item['price'] = $item->ppmp_items()->first() ? $item->ppmp_items()->first()->unit_price : 0;
        }
        $ppmps = Auth::user()->cost_center()->first()->ppmps()->get();
        if( Auth::user()->cost_center->cc_name == 'Bids and Awards Committee' ) {
            $ppmps = Ppmp::get();
        }
        return view('home')->with([
            'ppmps' => $ppmps,
            'items' => $items
        ]);
    }
}
