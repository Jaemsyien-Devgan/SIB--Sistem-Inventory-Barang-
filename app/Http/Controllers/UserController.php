<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request) {

        $perPage = $request->input('per_page', session('per_page', 5));
        session(['per_page' => $perPage]);

        // Ambil nilai pencarian dari input search
        $search = $request->input('search');
        $query = User::query();

        // Jika ada pencarian, tambahkan filter berdasarkan beberapa kolom
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('password', 'like', "%{$search}%");
            });
        }

        // Cek apakah perPage adalah -1, jika iya, ambil semua data
        if ($perPage == -1) {
            $admins = $query->get(); // Ambil semua data
        } else {
            $admins = $query->paginate($perPage); // Pagination
        }
        return view('admin', compact('admins'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin')->with(['success'=>'User added successfully']);
    }
    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admin')->with('success', 'Satuan berhasil dihapus');
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin->update($validatedData);

        return redirect()->route('admin')->with('success', 'Data User berhasil diperbarui');
    }
}
