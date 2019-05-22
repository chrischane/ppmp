<?php

namespace App\Http\Controllers;

use App\PpmpItem;
use Illuminate\Http\Request;

class PpmpItemController extends Controller
{
    public function view($ppmp_item_id) {
        $ppmp_item = PpmpItem::where('ppmp_item_id', $ppmp_item_id)->first();
        return view('ppmpitem.view')->with([
            'ppmp_item' => $ppmp_item,
        ]);
    }

    public function storeRemarks($ppmp_item_id) {
        $ppmp_item = PpmpItem::where('ppmp_item_id', $ppmp_item_id)->first();
        $ppmp_item->remarks = 'Uploaded';
        $ppmp_item->save();

        return redirect()->back()->with([
            'success_message'=> 'Successfully Uploaded!'
        ]);
    }
}
