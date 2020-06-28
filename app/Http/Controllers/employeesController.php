<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class employeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emps = Employee::all();
        return view('employees.index',compact('emps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'txtName'=>'required',
            'txtProfile'=>'required',
            'txtCity'=>'required',
            'txtAddress'=>'required'
        ]);
        $emp = new Employee ;
        $emp->name = $request->input('txtName');
        $emp->Profile = $request->input('txtProfile');
        $emp->City = $request->input('txtCity');
        $emp->Address = $request->input('txtAddress');

        if ($request->hasFile('flImage')) {
            $file = $request->file('flImage');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('uploads/employees',$fileName);
            $emp->image = $fileName;
        }
        $emp->save();
        return redirect('employees')->with('success','Data Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp = Employee::find($id);
        return view('employees.edit',compact('emp','id'));
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
        $this->validate($request,[
            'txtName'=>'required',
            'txtProfile'=>'required',
            'txtCity'=>'required',
            'txtAddress'=>'required'
        ]);

        $emp = Employee::find($id) ;
        $emp->name = $request->input('txtName');
        $emp->Profile = $request->input('txtProfile');
        $emp->City = $request->input('txtCity');
        $emp->Address = $request->input('txtAddress');
        $emp->save();
        return redirect('employees')->with('success','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp = Employee::find($id);
        $emp->delete();
        return redirect('employees')->with('success','Data Deleted');

    }
}
