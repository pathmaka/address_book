<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Customers::orderBy('id', 'asc')->get();  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 
            'name' => 'required',
            'nic' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);
  
        $customer = new Customers;
        $customer->name = $request->name; 
        $customer->nic = $request->nic;  
        $customer->address = $request->address;  
        $customer->phone_numbers = $request->phone;  
        $customer->save(); 
        return true; 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Customers::findorFail($id); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [ 
            'name' => 'required',
            'nic' => 'required',
            'address' => 'required',
            'phone_numbers' => 'required'
        ]);
  
        $customer = Customers::findorFail($id); 
        $customer->name = $request->input('name'); 
        $customer->nic = $request->input('nic');  
        $customer->address = $request->input('address');  
        $customer->phone_numbers = $request->input('phone_numbers');  
        $customer->save();
        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customers::findorFail($id); 
        if($customer->delete()){ 
            return 'Deleted successfully'; 
        }
    }
}
