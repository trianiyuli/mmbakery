<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // public function products()
    // {
    //     return view('admin.products');
    // }

    public function settings()
    {
        return view('admin.settings');
    }

    public function reports()
    {
        return view('admin.reports');
    }

// +===USERS===+ //
    public function users(Request $request)
    {   
        $currentUserId = Session::get('user_id');
        $role = Session::get('role');
        $search = $request->input('search');
        
        $query = User::query();
        
        if ($role !== 'superadmin') {
            $query->where('id', $currentUserId);
        }
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhere('role', 'like', '%'.$search.'%');
            });
        }
        
        $users = $query->paginate(10);
        
        if ($request->ajax()) {
            return response()->json([
                'table' => view('admin.partials.users_table', [
                    'users' => $users,
                    'role' => $role // Pastikan role dikirim ke partial view
                ])->render(),
                'pagination' => $users->hasPages() ? view('admin.partials.users_pagination', [
                    'users' => $users
                ])->render() : ''
            ]);
        }
        
        return view('admin.users', compact('users', 'role'));
    }

    public function storeUser(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,superadmin',
            'password' => 'required|string|min:8|confirmed',
            'profile-picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle file upload
        $photoPath = null;
        if ($request->hasFile('profile-picture')) {
            $photoPath = $request->file('profile-picture')->store('profile-photos', 'public');
        }

        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
            'photo' => $photoPath
        ]);

        return redirect()->route('admin.users')->with('success', 'User berhasil dibuat');
    }

    public function updateUser(Request $request, User $user)
    {
        // Validasi request
        $validated = $request->validate([
            'edit_name' => 'required|string|max:255',
            'edit_email' => 'required|email|unique:users,email,'.$user->id,
            'edit_role' => 'sometimes|in:admin,superadmin',
            'edit_password' => 'nullable|string|min:8|same:edit_confirm_password',
            'edit_confirm_password' => 'nullable|required_with:edit_password|string|min:8',
            'edit_profile-picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'edit_password.same' => 'The password and confirmation password do not match.',
            'edit_confirm_password.required_with' => 'Please confirm your password.'
        ]);
    
        // Handle file upload jika ada
        if ($request->hasFile('edit_profile-picture')) {
            // Hapus foto lama jika ada
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $photoPath = $request->file('edit_profile-picture')->store('profile-photos', 'public');
            $user->photo = $photoPath;
        }
    
        // Update data user
        $user->name = $validated['edit_name'];
        $user->email = $validated['edit_email'];
        
        // Update role hanya jika ada dalam request (untuk superadmin)
        if (isset($validated['edit_role'])) {
            $user->role = $validated['edit_role'];
        }
    
        // Update password jika diisi
        if (!empty($validated['edit_password'])) {
            $user->password = Hash::make($validated['edit_password']);
        }
    
        $user->save();
    
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    public function destroyUser(User $user)
    {
        try {
            // Hapus foto profil jika ada
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            
            $user->delete();
            
            return redirect()->route('admin.users')->with('success', 'User berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.users')->with('error', 'Gagal menghapus user');
        }
    }

//+===PRODUCTS===+//
    public function products(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        
        $query = Product::query();
        
        if ($search) {
            $query->where('nama', 'like', '%'.$search.'%');
        }
        
        if ($category && $category !== 'all') {
            $query->where('kategori', $category);
        }
        
        $products = $query->paginate(10);
        
        if ($request->ajax()) {
            return response()->json([
                'table' => view('admin.partials.products_table', [
                    'products' => $products
                ])->render(),
                'pagination' => $products->hasPages() ? view('admin.partials.products_pagination', [
                    'products' => $products
                ])->render() : ''
            ]);
        }
        
        return view('admin.products', compact('products'));
    }

    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:30',
            'harga' => 'required|integer|min:0',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|in:roti-manis,donat,cake,pizza,tart',
            'unggulan' => 'sometimes',
            'deskripsi' => 'nullable|string'
        ]);

        $imagePath = $request->file('gambar')->store('product-images', 'public');

        Product::create([
            'nama' => $validated['nama'],
            'harga' => $validated['harga'],
            'gambar' => $imagePath,
            'kategori' => $validated['kategori'],
            'unggulan' => $request->has('unggulan') ? true : false,
            'deskripsi' => $validated['deskripsi'] ?? null
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('admin.products')->with('success', 'Product created successfully');
    }

    public function showProduct(Product $product)
    {
        return response()->json($product);
    }

    public function updateProduct(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:30',
            'harga' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'required|in:roti-manis,donat,cake,pizza,tart',
            'unggulan' => 'sometimes',
            'deskripsi' => 'nullable|string'
        ]);
    
        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($product->gambar);
            $imagePath = $request->file('gambar')->store('product-images', 'public');
            $product->gambar = $imagePath;
        }
    
        $product->update([
            'nama' => $validated['nama'],
            'harga' => $validated['harga'],
            'kategori' => $validated['kategori'],
            'unggulan' => $request->has('unggulan') ? true : false,
            'deskripsi' => $validated['deskripsi'] ?? null
        ]);
    
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }
    
        return redirect()->route('admin.products')->with('success', 'Product updated successfully');
    }

    public function destroyProduct(Product $product)
    {
        try {
            // Delete product image
            Storage::disk('public')->delete($product->gambar);
            $product->delete();
            
            return redirect()->route('admin.products')->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.products')->with('error', 'Failed to delete product');
        }
    }
}
