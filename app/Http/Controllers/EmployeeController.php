<?php

namespace App\Http\Controllers;

use Validator;
use Input;
use Session;
use Redirect;
use Illuminate\Http\Request;
use App\Employee;
use App\Http\Controllers\Controller;


class EmployeeController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
      	return view('employees.show', array('employee' => $employee));
    }

   /**
     * Add the specified employee.
     *
     * @return Response
     */
     public function create(){
	return view('employees.create');
     }

    /**
     * Store the specified employee information.
     *
     * @return Response
     */
     public function store(){
	// validate
	// read more on validation at http://laravel.com/docs/validation

	$rules = array(
            'name'       => 'required',
            'designation' => 'required',
            'department' => 'required'
        );

	$validator = Validator::make(Input::all(), $rules);

	if ($validator->fails()) {
            return Redirect::to('employees_create')
                ->withErrors($validator)
		->withInput();
        } else {
            // store
            $employee = new Employee;
            $employee->name       = Input::get('name');
            $employee->designation      = Input::get('designation');
            $employee->department = Input::get('department');
            $employee->save();

            // redirect
            Session::flash('message', 'Successfully created Employee!');
            return Redirect::to('employees_all');
        }
     }

     /**
     * Display all the employee.
     *
     * @return Response
     */
    public function allrecord()
    {

        $employees = Employee::all();
	
      	return view('employees.showall', array('employees' => $employees));
    }

     /**
     * Delete all the employee.
     *
     * @return Response
     */
    public function delete($id){
	$employee = Employee::find($id);
	$employee->delete();
	Session::flash('message', 'Successfully Delete Employee!');
	return Redirect::to('employees_all');

    }

    /**
     * Update all the employee.
     *
     * @return Response
     */
      
        public function update($id){

	$employee = Employee::find($id);
	return view('employees.update', array('employee' => $employee));
	}
	

    /**
     * Update  the employee record.
     *
     * @return Response
     */

     public function updaterec($id){

	$rules = array(
            'name'       => 'required',
            'designation' => 'required',
            'department' => 'required'
        );

	$validator = Validator::make(Input::all(), $rules);

	if ($validator->fails()) {
            return Redirect::to('employees_update', $id)
                ->withErrors($validator)
		->withInput();
        } else {
		
		$employee = Employee::find($id);

		$employee->name       = Input::get('name');
		$employee->designation      = Input::get('designation');
		$employee->department = Input::get('department');
		$employee->save();

		Session::flash('message', 'Successfully updated Employee!');
            	return Redirect::to('employees_all');

	}

     }


}
