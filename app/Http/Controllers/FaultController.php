<?php

namespace App\Http\Controllers;

use App\Fault;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FaultController extends Controller
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
        if ($request->hasFile('picture')){
            $file = $request->file('picture');
            $name = $file->getClientOriginalName();

            Storage::putFileAs('faults',$file,$name);
            $fault = Fault::create([
                'name' => $request->name,
                'picture' => $name,
                'description'=> $request->description,
                'owner_id'=> auth()->user()->id,
                'status' => 'Pending',
            ]);
            return redirect()->route('customer.expert-details',['fid'=>$fault->id]);
        }else{
            $fault = Fault::create([
                'name' => $request->name,
                'picture' => $request->name,
                'description'=> $request->description,
                'owner_id'=> auth()->user()->id,
                'status' => 'Pending',
            ]);
            return redirect()->route('customer.expert-details',['fid'=>$fault->id]);
        }

        return redirect()->route('customer.faults')->with('fail','Unsuccessfully submitted request');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fault = Fault::find($id);
        return view('customer.edit-faulty')->with('fault',$fault);
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
     * @param \Illuminate\Http\Request $request
     * @param Fault $fault
     * @return void
     */
    public function update(Request $request, Fault $fault)
    {
        $fault->update($request->all());
        return redirect()->back()->with('success','Successfully updated request');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
