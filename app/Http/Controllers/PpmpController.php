<?php

namespace App\Http\Controllers;

use App\Item;
use App\Ppmp;
use App\PpmpItem;
use Illuminate\Http\Request;

class PpmpController extends Controller
{
    public function view($ppmp_id) {
        $ppmp = Ppmp::where('ppmp_id', $ppmp_id)->first();
        return view('ppmp.view')->with([
            'ppmp' => $ppmp,
        ]);
    }

    public function store(Request $request) {
        $ppmp = Ppmp::where('ppmp_id', $request->item_ppmp)->first();

        $item = Item::where('description', $request->item_description)->first();

        if( empty($item) ) {
            $item = new Item;
            $item->description = $request->item_description;
            $item->specification = $request->item_specification;
            $item->unit = $request->unit;
            $item->save();
        }

        $new_ppmp_item = new PpmpItem;
        $new_ppmp_item->ppmp_id = $ppmp->ppmp_id;
        $new_ppmp_item->item_id = $item->item_id;
        $new_ppmp_item->quarter = $request->quarter;
        $new_ppmp_item->amount = $request->amount;
        $new_ppmp_item->quantity = $request->quantity;
        $new_ppmp_item->unit_price = $request->unit_price;
        $new_ppmp_item->save();

        return redirect()->back()->with([
            'success_message'=> 'Successfully requested!'
        ]);
    }

    public function generateReport($ppmp_id) {
        $ppmp = Ppmp::where('ppmp_id', $ppmp_id)->first();
        return view('ppmp.report')->with([
            'ppmp' => $ppmp,
        ]);
    }
}
