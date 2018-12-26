@extends('layout')

@section('content')
    
    <div class="box-content">
      <h1>Add Contact</h1>
      @if(count($errors)>0)
        @foreach($errors->all() as $error)

          <div class="alert alert danger">{{$error}}</div>
        @endforeach
      @endif
        <form class="form-horizontal" action="{{url('insert-contact')}}" method="POST">
            @csrf
            <fieldset>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Name :</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="name" placeholder="Enter Name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Email :</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="email" name="email" placeholder="Enter Email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Phone</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="focusedInput" type="text" name="phone" placeholder="Enter Cell NO">
                </div>
              </div>
              
              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </fieldset>
          </form>
    
    </div>
    
@endsection()