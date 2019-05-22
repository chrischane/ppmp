<?php

namespace App\Http\Controllers;

use App\FundSource;
use Illuminate\Http\Request;

class FundSourceController extends Controller
{
    public function create() {
        return view('fund_source.create');
    }

    public function store(Request $request) {
        $request->validate([
            'fs_name' => 'required|unique:fund_source,fs_name,NULL,cc_id,deleted_at,NULL'
        ]);

        $new_fund_source = new FundSource;
        $new_fund_source->fs_name = $request->fs_name;
        $new_fund_source->save();

        return redirect()->back()->with([
            'success_message' => 'Successfully added!',
        ]);
    }

    public function list() {
        return view('fund_source.list')->with([
            'fund_sources' => FundSource::get(),
        ]);
    }

    public function edit($fund_source_id) {
        return view('fund_source.edit')->with([
            'fund_source' => FundSource::where('fs_id', $fund_source_id)->first(),
        ]);
    }

    public function update(Request $request, $fund_source_id) {
        $request->validate([
            'fs_name' => 'required|unique:fund_source,fs_name,'.$fund_source_id.',fs_id'
        ]);
        $fund_souce = FundSource::where('fs_id', $fund_source_id)->first();
        $fund_souce->fs_name = $request->fs_name;
        $fund_souce->save();

        return redirect()->back()->with([
            'success_message' => 'Successfully updated!',
        ]);
    }

    public function delete($fund_source_id) {
        $fund_source = FundSource::where('fs_id', $fund_source_id)->first();
        $fund_source->delete();
        return redirect()->back()->with([
            'success_message' => 'Successfully deleted!',
        ]);
    }
}
