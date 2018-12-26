@extends('layout')

@section('content')
    
    <div class="box-content">
      <h1>Edit Contact Form</h1>
        <form class="form-horizontal" action="{{url('update-contact')}}" method="POST">
            @csrf
            <fieldset>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Name :</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="name" placeholder="Enter Name" value="{{$contact->name}}">
                  <input type="text" name="id" value="{{$contact->id}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Email :</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="email" name="email" placeholder="Enter Email" value="{{$contact->email}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Phone</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" value="{{$contact->phone}}" name="phone" placeholder="Enter Cell NO">
                </div>
              </div>
              
              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Contact</button>
              </div>
            </fieldset>
          </form>
    
    </div>
    
@endsection()