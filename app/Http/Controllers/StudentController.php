<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::all();
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
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'fees' => 'required',
        ]);

        $stu = new Student;
        $stu->name = request('name');
        $stu->city = request('city');
        $stu->fees = request('fees');
        $success = $stu->save();

        return ['success' => $success];

        // return Student::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::find($id);
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
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'fees' => 'required',
        ]);
        $stu = Student::findorFail($id);
        $success = $stu->update($request->all());
        return ['success' => $success];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stu = Student::findorFail($id);
        $success = $stu->delete();
        return ['success' => $success];

    }

    //Search based on City
    public function searchcity($city)
    {
        $stu_cty = Student::where('city', $city)->get();
        return $stu_cty->all();
        // return Student::where('city', $city)->get();
    }
}
