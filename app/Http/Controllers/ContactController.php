<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Contact;
use Illuminate\Support\Facades\DB;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('select * from contacts');
        return view('allcontact', ['data' => $data]);

    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $address = $request->get('address');

        $data = DB::insert('insert into contacts(name,email,phone,address) value(?,?,?,?)', [$name, $email, $phone, $address]);
        if ($data) {
            $red = redirect('/')->with('success', 'Data successfully added');
        }
        else{
            $red = redirect('posts')->with('success', 'Data not Inserted');
        }
        return $red;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = DB::select('select * from contacts where id=?', [$id]);
        return view('update', ['posts' => $posts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $posts = DB::update('update contacts set name=?, email=?, phone=?, address=? where id=?', [$name, $email, $phone, $address, $id]);

        if($posts){
            $red = redirect('/')->with('success', 'Data has been updated');
        } else{
            $red = redirect('/'.$id)->with('success', 'Data failed!!!!!!');
        }
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = DB::delete('delete from contacts where id=?', [$id]);
        if($posts){
            $red = redirect('/')->with('success', 'Data has been deleted!');    
        }else{

            $red = redirect('/')->with('success', 'Data Failed to Deleteddd!');
        }
        
        return $red;

    }


    /*i wanna read data as a json view*/

    public function alldata(){
        $contact=Contact::all();

        return Datatables::of($contact);
    }

}
