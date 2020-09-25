<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\ContactRequest;
use \App\contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact.index', ['contacts' => Auth()->user()->contact]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        
        //check if the user dosen't have the contact to save yet
        $contact = Contact::where('user_id', Auth()->user()->id)
                            ->where('email',$request->get('email'))->get();
        if(!$contact->isEmpty())
             $request->session()->flash('failed','Cette adresse email est déjà associé à l\'un de vos contact');
        else //contact dosen't exist yet
        {

            if(Contact::create([
                'first_name' => $request->get('first_name'),
                'last_last' => $request->get('last_name'),
                'email' =>   $request->get('email'),
                'user_id' => Auth()->user()->id
            ]))
              $request->session()->flash('success','Enregistré');
            else
              $request->session()->flash('failed','Echec lors de l\'enregistrement du contact');

        }

        return view('contact.create');
        // echo $request->get('first_name');
        // echo $request->get('last_name');
        // echo $request->get('email');
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
        $contact = Contact::find($id);
        return view('contact.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        $contact = Contact::find($id);
        $contact->first_name = $request->get('first_name');
        $contact->last_name = $request->get('last_name');
        $contact->email = $request->get('email');
        if($contact->save())
             $request->session()->flash('success','Modifié avec succès');
        else
             $request->session()->flash('failed','Modification échouée');
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $contact = Contact::find($request->get('id'));
        if($contact->delete())
            $request->session()->flash('succes','Supprimer avec succès');
        else
             $request->session()->flash('failed','La suppression n\'a pas pu être effectuée');
        return redirect()->route('contact.index');
    }
}
