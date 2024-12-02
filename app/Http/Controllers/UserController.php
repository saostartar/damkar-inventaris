<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:Staff']);
    }

    public function index()
    {
        $users = User::all();
        return view('staff.users.index', compact('users'));
    }

    public function create()
    {
        return view('staff.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:Staff,Manager,Guest']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        ActivityLogController::log(
            'create_user',
            "Created new user {$user->name} ({$user->email}) with role {$user->role}",
            $user
        );

        return redirect()->route('staff.users.index')
                        ->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        return view('staff.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'role' => ['required', 'in:Staff,Manager,Guest']
        ]);

        $oldData = [
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role
        ];

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ];

        // Only update password if provided
        if ($request->filled('password')) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()]
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        $changes = array_diff_assoc($data, $oldData);
        if (!empty($changes)) {
            $changeLog = "Updated user {$user->name}: ";
            foreach ($changes as $field => $newValue) {
                if ($field !== 'password') {
                    $changeLog .= "{$field} changed from {$oldData[$field]} to {$newValue}, ";
                }
            }
            if ($request->filled('password')) {
                $changeLog .= "password was changed";
            }
            
            ActivityLogController::log(
                'update_user',
                rtrim($changeLog, ', '),
                $user
            );
        }

        return redirect()->route('staff.users.index')
                        ->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        // Prevent self-deletion
        if ($user->id === auth()->id()) {
            return redirect()->route('staff.users.index')
                            ->with('error', 'You cannot delete your own account');
        }

        $userInfo = "Deleted user {$user->name} ({$user->email}) with role {$user->role}";
        
        $user->delete();

        ActivityLogController::log(
            'delete_user',
            $userInfo,
            null // Since the user is deleted, we don't pass the model
        );

        return redirect()->route('staff.users.index')
                        ->with('success', 'User deleted successfully');
    }
}