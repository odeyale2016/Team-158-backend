<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Models\User;
use Auth;
use App\Models\Investors;
class InvestorsController extends Controller
{
    public function index()
    {
        $products = Investors::latest()->paginate(5);
  
        return view('investors.index',compact('investors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('investors.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
  
        Investors::create($request->all());
   
        return redirect()->route('investors.index')
                        ->with('success','New Investor created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Investos  $investors
     * @return \Illuminate\Http\Response
     */
    public function show(Investors $investors)
    {
        return view('investors.show',compact('investors'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Investors  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Investors $investors)
    {
        return view('investors.edit',compact('investors'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Investors  $investors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investors $investors)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
  
        $product->update($request->all());
  
        return redirect()->route('investors.index')
                        ->with('success','Investor Record updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Investors  $investors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investors $investors)
    {
        $investors->delete();
  
        return redirect()->route('investors.index')
                        ->with('success','Investor deleted successfully');
    }
}
