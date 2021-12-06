<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    public function getAllCustomers ()
    {        
        $response = null;
        try {
            $customers = Customer::all();   
            $response['data'] = $customers;
            $response['success'] = true;            
        } catch (\Exception $e) {
            $response ['success'] = false;
            $response ['message'] = $e->getMessage();
        }        
        return $response;
    }

    public function getCustomerById ($id)     
    {                
        $response = null;
        try {
            $customer = Customer::where('id', $id)->first();
            $response['data'] = $customer;
            $response['success'] = true;            
        } catch (\Exception $e) {
            $response ['success'] = false;
            $response ['message'] = $e->getMessage();
        }                        
        return $response;
    }

    public function addLatLng ()
    {        
        $customers = Customer::all();        
        foreach ($customers as $value) {                        
            $cityArray = explode (" ", $value->city); 
            $changedCityByPlus = join("+",$cityArray);                    
            $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address='.$changedCityByPlus.'&key=AIzaSyAbMNQzamdFW65UkiKzL_Nt8S_1iIjdC5c');           
            if ($response['status'] == "OK") {                
                $lat = $response->json()['results'][0]['geometry']['location']['lat'];
                $lng = $response->json()['results'][0]['geometry']['location']['lng'];
                Customer::where('id', $value->id)
                ->update(['longitude' => $lng, 'latitude' => $lat]);
            }
        }             
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
