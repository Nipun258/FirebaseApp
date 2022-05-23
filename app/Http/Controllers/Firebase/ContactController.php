<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class ContactController extends Controller
{   

    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'contacts';
    }

    public function index(){

        $contacts = $this->database->getReference($this->tablename)->getValue();
        $total_contacts = $this->database->getReference($this->tablename)->getSnapshot()->numChildren();
        //dd($total_contacts);
        return view('firebase.contact.index',compact('contacts','total_contacts'));
    }

    public function addContact(){

        return view('firebase.contact.add');
    }

    public function storeContact(Request $request){

        // $ref_table_name = 'contacts';
        $postData = [
                       'fname' => $request->first_name,
                       'lname' => $request->last_name,
                       'phone' => $request->phone,
                       'email' => $request->email
                    ];

        $postRef = $this->database->getReference($this->tablename)->push($postData);

        if($postRef){

            return redirect('contacts')->with('status','contact added successfully');

        }else{

            return redirect('contacts')->with('status','contact not added');

        }
    }

        public function editContact($id)
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        //dd($editdata);
        if($editdata){

            return view('firebase.contact.edit',compact('editdata','key'));

        }else{

            return redirect('contacts')->with('status','contact ID not found');
        }
        
    }

    public function updateContact(Request $request,$id){
        
        $key = $id;
        $updateData = [
                       'fname' => $request->first_name,
                       'lname' => $request->last_name,
                       'phone' => $request->phone,
                       'email' => $request->email
                    ];

        $updateRef =$this->database->getReference($this->tablename.'/'.$key)->update($updateData);

        if($updateRef){

            return redirect('contacts')->with('status','contact updated successfully');

        }else{

            return redirect('contacts')->with('status','contact not updated');

        }

    }

    public function deleteContact($id){

        $key = $id;
        $deleteRef =$this->database->getReference($this->tablename.'/'.$key)->remove();

        if($deleteRef){

            return redirect('contacts')->with('status','contact deleted successfully');

        }else{

            return redirect('contacts')->with('status','contact not deleted');

        }



    }
}
