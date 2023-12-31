<?php

namespace App\Http\Controllers;
use App\Http\Requests\CustomerValidationRequest;
use App\Http\Resources\CustomerListResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
            $page = $request->input('page', 1); // default 1
            $perPage = $request->input('perPage', 5); // default 100
            $queryString = $request->input('query', null);
            $sort = explode('.', $request->input('sort', 'first_name'));
            $order = $request->input('order', 'desc');
            $data = Customer::query()
    
            ->where(function ($query) use ($queryString) {
                if ($queryString && $queryString != '') {
                    // filter result
                    // $query->where(DB::raw("CONCAT(first_name,' ',last_name)"), 'like', '%' . $queryString . '%');
                    $query->where('first_name', 'like', '%' . $queryString . '%');
                    $query->orWhere('last_name', 'like', '%' . $queryString . '%');
                    $query->orWhere('email', 'like', '%' . $queryString . '%');
                }
            })
            ->when(count($sort) == 1, function ($query) use ($sort, $order) {
                $query->orderBy($sort[0], $order);
            })
            ->paginate($perPage)
            ->withQueryString();
    
            $props = [
                'data' => CustomerListResource::collection($data),
                'params' => $request->all(),
                'success' => session('success')
            ];
            if ($request->wantsJson()) {
                return json_encode($props);
            }
            if (count($data) <= 0 && $page > 1) {
                return redirect()->route('customers.index', ['page' => 1]);
            }
        
        return Inertia::render("Customers/Index",$props);
           

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("Customers/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerValidationRequest $request)
    {
        Customer::create($request->all());
        return redirect(route('customers.index'));
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
        $customer = Customer::find($id);
        return Inertia::render("Customers/Edit", [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        $customer->update($request->all());
        return redirect(route('customers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect(route('customers.index'));
    }
}
