<?php

namespace App\Http\Controllers;

use App\CostCenter;
use Illuminate\Http\Request;

class CostCenterController extends Controller
{
    public function list() {
        return view('cost_center.list')->with([
            'cost_centers' => CostCenter::get(),
        ]);
    }

    public function create() {
        return view('cost_center.create');
    }

    public function store(Request $request) {
        $request->validate([
            'cc_name' => 'required|unique:cost_center,cc_name,NULL,cc_id,deleted_at,NULL'
        ]);

        $new_cost_center = new CostCenter;
        $new_cost_center->cc_name = $request->cc_name;
        $new_cost_center->save();

        return redirect()->back()->with([
            'success_message' => 'Successfully added!',
        ]);
    }

    public function edit($cost_center_id) {
        return view('cost_center.edit')->with([
            'cost_center' => CostCenter::where('cc_id', $cost_center_id)->first(),
        ]);
    }

    public function update(Request $request, $cost_center_id) {
        $request->validate([
            'cc_name' => 'required|unique:cost_center,cc_name,'.$cost_center_id.',cc_id'
        ]);
        $cost_center = CostCenter::where('cc_id', $cost_center_id)->first();
        $cost_center->cc_name = $request->cc_name;
        $cost_center->save();

        return redirect()->back()->with([
           'success_message' => 'Successfully updated!',
        ]);
    }

    public function delete($cost_center_id) {
        $cost_center = CostCenter::where('cc_id', $cost_center_id)->first();
        $cost_center->delete();
        return redirect()->back()->with([
            'success_message' => 'Successfully deleted!',
        ]);
    }
}
