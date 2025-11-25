<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        $data = User::where('role', '!=', 'admin')->get();
        return view('admin.users.index', compact('data'));
    }

    public function edit($id)
    {
        $u = User::findOrFail($id);
        return view('admin.users.edit', compact('u'));
    }

    public function update(Request $r, $id)
    {
        $u = User::findOrFail($id);

        $r->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required|in:buyer,artist'
        ]);

        $u->update([
            'name' => $r->name,
            'email' => $r->email,
            'role' => $r->role
        ]);

        return redirect()->route('admin.users')->with('success','Updated');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success','Deleted');
    }
}

