<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use Auth;
use Validator;
use Exception;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_contacts = Contacts::where('userid', Auth::user()->id)->get();

        return response()->json([
            'status' => true,
            'all_contacts' => $all_contacts
        ], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'userid' => 'required'       
        ]);
        
        try
        {
            $add_contact = Contacts::create([
                'userid' => Auth::user()?->id,
                'name' => $request->name,
                'phone' => $request->phone,

            ]);

            if ($add_contact) {
                return response()->json(
                    [
                        'status' => true,
                        'response' => 'Successfully Added'
                    ]
                    ,
                    200
                );
            }
        }catch (Exception $e) {
            return response()->json($e, 500);            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contacts::where('id',$id)->limit(1)->get();

        return response()->json([
            'status' => true,
            'contact' => $contact
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try{            
            $contact=Contacts::find($id);
            $contact->update($request->all());

            return response()->json([
                'status' => true,
                'response' => 'Successfully Updated',
                'contact' => $contact
            ], 200);
        }catch (Exception $e) {
            return response()->json($e, 500);            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contacts::find($id)->delete();

        return response()->json([
            'status' => true,
            'response' => 'Successfully Deleted',
        ], 200);
    }
}
