<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Contact;

class ContactController extends Controller{

	public function AddContact(){
		return view('add_contact');
	}
	public function AllContact(){
		$contacts = DB::table('contacts')->paginate(1);
		/*$contacts = contact::get();*/
		/*$contacts = contact::all();*/

		return view('all_contact')->with('contacts',$contacts);

	}
	public function InsertContact(Request $request){
		/*$data = array();
		$data['name'] = $request->name;
		$data['email'] = $request->email;
		$data['phone'] = $request->phone;

		$insert = DB::table('contacts')->insert($data);*/

		$this->validate($request,[
			'name'=>'required',
			'email'=>'required|unique:contacts',
			'phone'=>'required|min:6|max:11|unique:contacts'
		]);

		$contact = new Contact;
		$contact->name = $request->name;
		$contact->email = $request->email;
		$contact->phone = $request->phone;
		
		$contact->save();

		if ($contact->save()) {
			$notification = array(
				'message'    => 'Contact Added Successfully',
				'alert-type' => 'success'
			);
		  return Redirect()->back()->with($notification);
		}else{
			$notification = array(
				'message'    => 'There is an Error',
				'alert-type' => 'error'
			);
		  return Redirect()->back()->with($notification);
		}
		
	}

	public function DeleteContact($id){
		/*$delete = DB::table('contacts')->where('id',$id)->delete();*/

		$delete = Contact::find($id)->delete();
		if ($delete) {
			$notification = array(
				'message'    => 'Contact Successfully Deleted',
				'alert-type' => 'success'
			);
		  /*return Redirect()->back()->with($notification);*/
		  return Redirect()->route('all.contact')->with($notification);
		}else{
			$notification = array(
				'message'    => 'Error Deleting',
				'alert-type' => 'error'
			);
		  return Redirect()->route('all.contact')->with($notification);
		}
	}

	public function ViewContact($id){
		/*$con = DB::table('contacts')->where('id',$id)->first();*/
		$con = Contact::find($id);
		return view('view_contact')->with('contact',$con);
	}
	public function EditContact($id){

		$contact = Contact::find($id);
		/*$contact = DB::table('contacts')->where('id',$id)->first();*/
		return view('edit_contact')->with('contact',$contact);
	}
	public function UpdateContact(Request $request){
		$id = $request->id;
		/*$contact = array();
		$contact['name'] = $request->name;
		$contact['email'] = $request->email;
		$contact['phone'] = $request->phone;*/

		$contact = Contact::find($id);
		$contact->name = $request->name;
		$contact->email = $request->email;
		$contact->phone = $request->phone;

		$contact->save();

		/*$update = Contact::find($id)->update($contact);*/
		/*$update = DB::table('contacts')->where('id',$id)->update($contact);*/
		if ($contact->save()) {
			$notification = array(
				'message'    => 'Contact Successfully Updated',
				'alert-type' => 'success'
			);
		  /*return Redirect()->back()->with($notification);*/
		  return Redirect()->route('all.contact')->with($notification);
		}else{
			$notification = array(
				'message'    => 'Error Updating',
				'alert-type' => 'error'
			);
		  return Redirect()->route('all.contact')->with($notification);
		}
	}
}
