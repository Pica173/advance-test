<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class SessionController extends Controller
{
    public function getSes(Request $request)
    {
        $lastname = $request->session()->get('lastname');
        $firstname = $request->session()->get('firstname');
        $gender = $request->session()->get('gender');
        $email = $request->session()->get('email');
        $postcode = $request->session()->get('postcode');
        $address = $request->session()->get('address');
        $building_name = $request->session()->get('building_name');
        $opinion = $request->session()->get('opinion');
        return view('confirm', [
            'lastname' => $lastname,
            'firstname' => $firstname,
            'gender' => $gender,
            'email' => $email,
            'postcode' => $postcode,
            'address' => $address,
            'building_name' => $building_name,
            'opinion' => $opinion,
        ]);
    }
    public function postSes(ClientRequest $request)
    {
        $lastname = $request->lastname;
        $firstname = $request->firstname;
        $gender = $request->gender;
        $email = $request->email;
        $postcode = $request->postcode;
        $address = $request->address;
        $building_name = $request->building_name;
        $opinion = $request->opinion;
        $request->session()->put('lastname', $lastname);
        $request->session()->put('firstname', $firstname);
        $request->session()->put('gender', $gender);
        $request->session()->put('email', $email);
        $request->session()->put('postcode', $postcode);
        $request->session()->put('address', $address);
        $request->session()->put('building_name', $building_name);
        $request->session()->put('opinion', $opinion);
        return redirect('/confirm');
    }

    public function complete(Request $request)
    {
        if ($request->input('back') == 'back') {
            return redirect('/')->withInput();
        }
        $form = $request->all();
        unset($form['lastname']);
        unset($form['firstname']);
        if ($form['gender'] == "男性") {
            $form['gender'] = 1;
        } else {
            $form['gender'] = 2;
        }
        Contact::create($form);
        return view('thanks');
    }
}