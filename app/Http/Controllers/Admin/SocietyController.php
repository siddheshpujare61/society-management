<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Society;
use Illuminate\Http\Request;
use Session;

class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $societies = Society::latest()->paginate(5);
    
        return view('admin.society.index',compact('societies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.society.create');
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
            'established_date' => 'required',
            'developer' => 'required',
            'consultant' => 'required',
            'agency' => 'required',
            'building_info' => 'required',
            'address' => 'required',
            'uploaded_document' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);
  
        $input = $request->all();

        $input['established_date'] = date("Y-m-d", strtotime($request->input("established_date")));
  
        if ($image = $request->file('uploaded_document')) {
            $destinationPath = 'dashboard/images/society_images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['uploaded_document'] = "$profileImage";
        }
        //dd($input);
        Society::create($input);
     
        return redirect()->route('society.index')
                        ->with('success','Society created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function show(Society $society)
    {
        return view('admin.society.show',compact('society'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function edit(Society $society)
    {
        return view('admin.society.edit',compact('society'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Society $society)
    {
        $request->validate([
            'name' => 'required',
            'established_date' => 'required',
            'developer' => 'required',
            'consultant' => 'required',
            'agency' => 'required',
            'building_info' => 'required',
            'address' => 'required',
            'status' => 'required',
            //'uploaded_document' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
        $input['established_date'] = date("Y-m-d", strtotime($request->input("established_date")));

        if ($image = $request->file('uploaded_document')) {
            $destinationPath = 'dashboard/images/society_images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['uploaded_document'] = "$profileImage";
        }else{
            unset($input['uploaded_document']);
        }
          
        $society->update($input);
    
        return redirect()->route('society.index')
                        ->with('success','Society updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function destroy(Society $society)
    {
        $society->delete();
     
        return redirect()->route('society.index')
                        ->with('success','Society deleted successfully');
    }

    public function setGlobalSession(Request $request){
        $society_id = $request->input("id");
        Session::put('g_society_id', $society_id);        
    }
}
