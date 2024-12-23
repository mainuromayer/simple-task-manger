<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeammateController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
        
        $teammates = User::where('role', 'teammate')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('email', 'like',  "%$search%")
                      ->orWhere('employee_id', 'like',  "%$search%")
                      ->orWhere('position', 'like',  "%$search%");
            })
            ->get();
    
        return view('teammate.index', compact('teammates'));
    }
    

    public function create()
    {
        return view('teammate.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'employee_id' => 'required',
            'position' => 'required',
            'password' => 'required'
        ]);

        $teammate = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'employee_id' => $request->employee_id,
            'position' => $request->position,
            'role' => 'teammate',
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('teammate')->with('success', 'Teammate created successfully');
    }

    public function edit(Request $request)
    {
        $teammate = User::find($request->id);
        return view('teammate.edit', compact('teammate'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'employee_id' => 'required',
            'position' => 'required',
            'password' => 'nullable'
        ]);

        $teammate = User::find($id);
        
        $teammate->update([
            'name' => $request->name,
            'email' => $request->email,
            'employee_id' => $request->employee_id,
            'position' => $request->position,
        ]);

        return redirect()->route('teammate')->with('success', 'Teammate updated successfully');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('teammate')->with('success', 'Teammate deleted successfully');
    }
}
