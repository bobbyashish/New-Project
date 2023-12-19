<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerListResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class JoinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
            $page = $request->input('page', 1); // default 1
            $perPage = $request->input('perPage', 5); // default 5
            $queryString = $request->input('query', null);
            $sort = explode('.', $request->input('sort', 'product_name'));
            $order = $request->input('order', 'desc');
            $data = Order::query()
            ->with('customer')

    
            ->where(function ($query) use ($queryString) {
                if ($queryString && $queryString != '') {
                    // filter result
                    // $query->where(DB::raw("CONCAT(first_name,' ',last_name)"), 'like', '%' . $queryString . '%');
                    $query->where('product_name', 'like', '%' . $queryString . '%');
                    $query->orWhere('amount', 'like', '%' . $queryString . '%');
                    $query->orWhere('customer_id', 'like', '%' . $queryString . '%');
                    $query = DB::table('orders');
                    
                    
                    
                }
            })
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
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
                return redirect()->route('joins.index', ['page' => 1]);
            }

            

           
        return Inertia::render("Joins/Index",$props);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
