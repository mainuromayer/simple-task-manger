<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskAssign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginCheck(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } else {
            return back()->withInput()->with('error', 'Invalid login details');
        }
    }



    public function signup()
    {
        return view('auth.signup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'employee_id' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'employee_id' => $request->employee_id,
            'role' => 'manager',
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('success', 'Manager created successfully');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }


    public function dashboard()
    {
        if (auth()->user()->role == 'teammate') {
            $userId = auth()->user()->id;
            $user = User::find($userId);
        
            $query = TaskAssign::where('user_id', $userId);
        
            if ($search = request('search')) {
                $query->whereHas('task', function($q) use ($search) {
                    $q->where('task_name', 'like', "%$search%")
                      ->orWhere('description', 'like', "%$search%")
                      ->orWhereHas('project', function($q) use ($search) {
                          $q->where('name', 'like', "%$search%");
                      });
                });
            }
        
            if ($status = request('status')) {
                $query->whereHas('task', function($q) use ($status) {
                    $q->where('status', $status);
                });
            }
        
            $taskIds = $query->pluck('task_id');
        
            $tasks = Task::with('project')->whereIn('id', $taskIds)->get();
        
            return view('dashboard.teammate', compact('tasks', 'user'));
        } elseif (auth()->user()->role == 'manager') {
            return view('dashboard.manager');
        } else {
            return redirect()->route('login')->with('error', 'Invalid role or authentication error');
        }
    }




}
