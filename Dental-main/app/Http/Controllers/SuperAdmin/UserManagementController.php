<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Clinic; 

class UserManagementController extends Controller
{
    // Display user table for super admin
    public function index()
    {
        $users = User::all(); // Retrieve all users
        return view('superadmin.user.index', compact('users'));
    }

    // Edit user for super admin
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find user by ID
        return view('superadmin.user.edit', compact('user'));
    }

    // Update user for super admin
    public function update(Request $request, $id)
    {
        // Validation if needed

        $user = User::findOrFail($id);
        $user->update($request->all()); // Update user data

        return redirect()->route('superadmin.user.index')->with('success', 'User updated successfully');
    }

    // Add user for super admin
    public function create()
    {
        $clinics = Clinic::all(); // Retrieve all clinics
        return view('superadmin.user.create', compact('clinics'));
    }

    // Store user for super admin
    public function store(Request $request)
    {
        // Validation if needed
        $validatedData = $request->validate([
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'firstName' => 'nullable|string',
            'lastName' => 'nullable|string',
            'middleName' => 'nullable|string',
            'address' => 'nullable|string',
            'gender' => 'nullable|in:male,female',
            'age' => 'nullable|integer|min:0',
            'role' => 'required|string|in:admin,patient,staff,super_admin',
            'clinic_id' => 'nullable|exists:clinics,id',
        ]);
    
        // Hash the password
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        // Create new user
        User::create($validatedData);
    
        return redirect()->route('superadmin.user.index')->with('success', 'User created successfully');
    }
    
    // Show user details for super admin
    public function show($id)
    {
        $user = User::findOrFail($id); // Find user by ID
        return view('superadmin.user.show', compact('user'));
    }

    // Delete user for super admin
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Find user by ID
        $user->delete(); // Delete user

        return redirect()->route('superadmin.user.index')->with('success', 'User deleted successfully');
    }
}
