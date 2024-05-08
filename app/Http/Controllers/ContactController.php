<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\ContactWelcome;
use App\Models\Profile;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function index(){
        // $welcome = Welcome::all();
        // return view('menu.contact.index')->with('welcome', $welcome);

        $profile = Profile::all()->first();
        $contactWelcomes = ContactWelcome::latest()->paginate(10);
        $index = $this->generatePaginate($contactWelcomes);

        return view('menu.contact.index', [
            'contactWelcomes'=>$contactWelcomes,
            'index'  =>$index ,
            'profile' => $profile
        ]);
    }

    public function destroy($id){
        $deleteContact = ContactWelcome::findOrFail($id);
        $contactToDelete = $deleteContact->name;
        $deleteContact->destroy($id);

        $contactWelcomes = ContactWelcome::latest()->paginate(10);
        $index = $this->generatePaginate($contactWelcomes);

        if($deleteContact){
            return response()->json([
               'success'=>'The contact called <b>'.$contactToDelete.'</b> has been successfully deleted!',
               'contactWelcomes'=>$contactWelcomes,
               'index'  =>$index
           ]);
       }
    }

    public function generatePaginate($data){

        $startingIndex = ($data->currentPage() - 1) * $data->perPage();
        return $startingIndex;
    }
}
