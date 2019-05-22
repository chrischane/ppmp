<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function create() {
        return view('account.create');
    }

    public function store(Request $request) {
        $request->validate([
            'account_name' => 'required|unique:account,account_name,NULL,account_id,deleted_at,NULL'
        ]);

        $new_account = new Account;
        $new_account->account_name = $request->account_name;
        $new_account->save();

        return redirect()->back()->with([
            'success_message' => 'Successfully added!',
        ]);
    }

    public function list() {
        return view('account.list')->with([
            'accounts' => Account::get(),
        ]);
    }

    public function edit($account_id) {
        return view('account.edit')->with([
            'account' => Account::where('account_id', $account_id)->first(),
        ]);
    }

    public function update(Request $request, $account_id) {
        $request->validate([
            'account_name' => 'required|unique:account,account_name,'.$account_id.',account_id'
        ]);
        $account = Account::where('account_id', $account_id)->first();
        $account->account_name = $request->account_name;
        $account->save();

        return redirect()->back()->with([
            'success_message' => 'Successfully updated!',
        ]);
    }

    public function delete($account_id) {
        $account = Account::where('account_id', $account_id)->first();
        $account->delete();
        return redirect()->back()->with([
            'success_message' => 'Successfully deleted!',
        ]);
    }
}
