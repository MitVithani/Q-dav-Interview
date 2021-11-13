<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact_Us;
use Flash;
class ContactUSController extends Controller
{
    public function contactUsSubmit(Request $request)
    {
        // laravel form validation
        // $this->validate($request,[
        //     'name' => 'required|min:5|max:35',
        //     'email' => 'required|email|unique:contact_us',
        //     'phone_number' => 'required|numeric|digits:10',
        //     'category' => 'required',
        // ]);

        // // inster detail
        // $ins = [
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'phone_number' => $request['phone_number'],
        //     'category' => $request['category'],
        // ];
        // $addContacDtl = Contact_Us::create($ins);
        
        echo 'Thank you for getting in touch........';
    }

    public function deleteContactDtl($id)
    {
        $checkContactDtl = Contact_Us::whereId($id)->first();
        if (empty($checkContactDtl)) {
            Flash::error('Contact detail not found');
            return redirect(route('home'));
        }

        Contact_Us::whereId($id)->delete();

        Flash::error('Contact detail deleted successfully.');

        return redirect(route('home'));
    }
}
