<?php

namespace App\Http\Controllers;

use App\Models\Clases;
use Illuminate\Http\Request;

class ClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clasess = Clases::latest()->paginate(5);
    
        return view('clasess.index',compact('clasess'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clasess.create');
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
            'name' => 'required',
        ]);
    
        Clases::create($request->all());
     
        return redirect()->route('clasess.index')
                        ->with('success','Class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function show(Clases $clases)
    {
        return view('clasess.show',compact('clases'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function edit(Clases $clases)
    {
        return view('clasess.edit',compact('clases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clases $clases)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $clases->update($request->all());
    
        return redirect()->route('clasess.index')
                        ->with('success','Class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clases $clases)
    {
        $clases->delete();
    
        return redirect()->route('clasess.index')
                        ->with('success','Class deleted successfully');
    }
}
