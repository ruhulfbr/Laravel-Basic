@extends('layout')

@section('content')
	<h1>All Contact</h1>
	<table class="table table-striped">
    <thead>
      <tr>
      	<th>Sl No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    @php $sl = 0 @endphp
    @foreach($contacts as $contact)
    @php $sl++ @endphp
      <tr>
        <td>{{$sl}}</td>
        <td>{{$contact->name}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->phone}}</td>
        <td>
        	<a title="View" class="btn btn-small btn-info" href="{{URL::to('view-contact/'.$contact->id)}}">View</a>
        	<a title="Edit" class="btn btn-small btn-warning" href="{{URL::to('edit-contact/'.$contact->id)}}">Edit</a>
        	<a title="Delete" class="btn btn-small btn-danger" href="{{URL::to('delete-contact/'.$contact->id)}}" onclick="confirm('Are you Sure to Delete it??')">Delete</a>
        </td>
      </tr>
    @endforeach

    </tbody>
    
    
  </table>
  <nav aria-label="...">
    <ul class="pagination">
      {{$contacts->links()}}
    </ul>
  </nav>

@endsection