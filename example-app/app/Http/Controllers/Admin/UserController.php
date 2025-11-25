public function edit(User $user)
{
    return view('admin.users.edit', compact('user'));
}

public function update(Request $r, User $user)
{
    $r->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required|in:buyer,artist,admin'
    ]);

    $user->update([
        'name' => $r->name,
        'email' => $r->email,
        'role' => $r->role
    ]);

    return redirect()->route('admin.users.index')
        ->with('success', 'Updated');
}
