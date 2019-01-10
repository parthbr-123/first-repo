<!DOCTYPE html>
<html>
    <head>
    <title>Employee</title>
  </head>
@if(Session::has('message'))
<div class="alert">
  {{ Session::get('message')}}
</div>
@endif
<a href="{{ action('EmployeeController@create') }}">Add Employee</a>
@foreach ($employees as $employee)
  <body>
    <h1>Employee {{ $employee->id }}</h1>
    <ul>
      <li>Name: {{ $employee->name }}</li>
      <li>Designation: {{ $employee->designation }}</li>
      <li>Department: {{ $employee->department }}</li>
      <li><a href="{{ action('EmployeeController@delete', [$employee->id]) }}">Delete Records</a></li>
      <li><a href="{{ action('EmployeeController@update', [$employee->id]) }}">Update Records</a></li>		
    </ul>
  </body>
@endforeach

  
</html>

