<!DOCTYPE html>
<html>
  <head>
    <title>Employee {{ $employee->id }}</title>
  </head>
  <body>
    <h1>Employee {{ $employee->id }}</h1>
    <ul>
      <li>Name: {{ $employee->name }}</li>
      <li>Designation: {{ $employee->designation }}</li>
      <li>Department: {{ $employee->department }}</li>
    </ul>
  </body>
</html>

