<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterOrderRequest;
use App\Http\Resources\CustomerListResource;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
            $page = $request->input('page', 1); // default 1
            $perPage = $request->input('perPage', 5); // default 100
            $queryString = $request->input('query', null);
            $sort = explode('.', $request->input('sort', 'id'));
            $order = $request->input('order', 'asc');
            $data = Order::query()
            // ->where('product_name','=','ashish');
            // $customers = DB::table('customers')
            // ->where('last_name','=','thakur')
            // ->union($data)
        
               
         
            // ->union('customers')
            ->select('orders.*', DB::raw("CONCAT(customers.first_name, ' ', customers.last_name) AS full_name"),)
            //        ->select('customoer_id', DB::raw('created_at) as last_post_created_at'))
            //        ->where('first_name','LIKE', 'ashish')
            //        ->groupBy('customer_id');
 
            // $users = DB::table('customers')
            // ->joinSub($data, 'orders', function (JoinClause $join) {
            // $join->on('customers.id', '=', 'orders.user_id');})


        //     ->select('customer_id', DB::raw('created_at as last_post_created_at'))
        //     ->whereHas('customer', function ($query) {
        //         $query->where('first_name', 'LIKE', 'ashish');
        //     });
        
        
        // $users = DB::table('customers')
        //     ->joinSub($data, 'orders', function ($join) {
        //         $join->on('customers.id', '=', 'orders.customer_id');
        //     })

    
            

            // })->get()

          
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            // ->selectRaw('orders.*, customers.id as customer_id')

        //     ->join('customers', function (JoinClause $join) {  
        //     $join->on('orders.customer_id', '=', 'customers.id')
        //     ->where('customers.first_name', '=', 'ashish');
        // })

            // ->leftJoin('customers', 'customers.id', '=', 'orders.customer_id') --------leftJoin---------
            // ->crossJoin('customers')
           
            
            

            // ->selectRaw('orders.*, customers.first_name as customer_first_name')    ----for first name----
            ->where(function ($query) use ($queryString) {
                if ($queryString && $queryString != '') {
                    // filter result
                    $query->where(DB::raw("CONCAT(customers.first_name,' ',customers.last_name)"), 'like', '%' . $queryString . '%');
                    $query->orWhere('product_name', 'like', '%' . $queryString . '%');
                    $query->orWhere('amount', 'like', '%' . $queryString . '%');
                    // $query->orWhere('customers.*', 'like', '%' . $queryString . '%');
                    
                }
            })
            ->when(count($sort) == 1, function ($query) use ($sort, $order) {
                $query->orderBy($sort[0], $order);
            })
            ->paginate($perPage)
            ->withQueryString();
    //  dd($data);
    
            $props = [
                'data' => CustomerListResource::collection($data),
                'params' => $request->all(),
                'success' => session('success')
            ];
            if ($request->wantsJson()) {
                return json_encode($props);
            }
            if (count($data) <= 0 && $page > 1) {
                return redirect()->route('orders.index', ['page' => 1]);
            }

           
        return Inertia::render("Orders/Index",$props);
           

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        return Inertia::render("Orders/Create",[
            'customer' => $customers]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterOrderRequest $request)
    {
        Order::create($request->all());
        return redirect(route('orders.index'));
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
        $order = Order::find($id);
        $order->update($request->all());
        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect(route('orders.index'));
    }
}
