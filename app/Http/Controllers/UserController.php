<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Contact;

class UserController extends Controller
{
    //

    public function __construct(){

    }

    public function getIndex()
    {
    	return view('angularcrud');
    }
    public function getData()
    {
    	return Contact::all();

    }

    public function postStore(Request $r)
    {
    	Contact::create($r->all());
    	return ['success'=>true, 'message'=>'Inserted Successfully'];

    }
    public function postUpdate(Request $r)
    {
    	if ($r-> has(key 'id')) {
    		Contact::find($r->input(key: 'id'))->update($r->all());
    		return ['success'=>true, 'message': 'Updated Successfully'];
    	}

    }

    public function postDelete(Request $r)
    {
    	if ($r->has(key 'id')) {
    		Contact::find($r->input(key:'id'))->delete();
    		return ['success'=>true, 'message':'Deleted Successfully'];
    	}
    }

}
