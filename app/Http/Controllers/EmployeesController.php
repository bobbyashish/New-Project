<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeesController extends Controller
{
   
    public function index()
    {
        $employees = Employee::all();
        return Inertia::render("Employees/Index", [
         'employees' => $employees
 
        ]);
     }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("Employees/Create");
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
            $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'contact' => 'required|digits_between:6,12',
           
            ]);
            
     
            Employee::create($request->all());
        return redirect(route('employees/index'));
        
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        {
            $employees = Employee::find($id);
            return Inertia::render("Employees/Edit", [
                'employees' => $employees
            ]);
        }
    
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employees = Employee::find($id);
        $employees->update($request->all());
        return redirect(route('employees.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employees = Employee::find($id);
        $employees->delete();
        return redirect(route('employees.index'));
    }
}
