@extends('layout')

@section('content')
	<h1>View Single Contact</h1>
  <hr>
	<div class="panel panel-default">
    <div class="panel-body">
       Id :  {{$contact->id}}<br>
       Name : {{$contact->name}} <br>
       Email : {{$contact->email}} <br>
       Phone : {{$contact->phone}} <br><br>
       <a title="Edit" class="btn btn-small btn-warning" href="{{URL::to('edit-contact/'.$contact->id)}}">Edit</a>
          <a title="Delete" class="btn btn-small btn-danger" href="{{URL::to('delete-contact/'.$contact->id)}}" onclick="confirm('Are you Sure to Delete it??')">Delete</a>
    </div>
  </div>

@endsection