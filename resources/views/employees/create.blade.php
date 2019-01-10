<!DOCTYPE html>
<html>

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Add Employee</h1>
            <form action="{{ action('EmployeeController@store') }}" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="title" name="name" placeholder="Name" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="{{ old('designation') }}">
                    @if($errors->has('designation'))
                        <span class="help-block">{{ $errors->first('designation') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                    <label for="department">Department</label>
                    <textarea class="form-control" id="department" name="department" placeholder="Department">{{ old('department') }}</textarea>
                    @if($errors->has('department'))
                        <span class="help-block">{{ $errors->first('department') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection

  
</html>

