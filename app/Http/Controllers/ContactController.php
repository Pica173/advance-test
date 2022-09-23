<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::Paginate(10);
        return view('manage', ['contacts' => $contacts]);
    }
    public function search(Request $request)
    {
        $fullname = $request->fullname;
        $gender = $request->gender;
        $created_from = $request->created_from;
        $created_to = $request->created_to;
        $email = $request->email;
        if (empty($fullname) && empty($gender) && empty($created_from) && empty($created_to) && empty($email)) {
            return redirect('/manage');
        }

        $query = Contact::query();
        if (!empty($fullname)) {
            $query->Where('fullname', 'LIKE BINARY', "%$fullname%");
        }
        if (!empty($gender)) {
            $query->Where('gender', "$gender");
        }
        if (!empty($email)) {
            $query->Where('email', 'LIKE BINARY', "%$email%");
        }
        if (!empty($created_from)) {
            $query->Where('created_at', '>=', $created_from);
        }
        if (!empty($created_to)) {
            $created_to_search = $created_to;
            $created_to_search .= " 23:59:59";
            $query->Where('created_at', '<=', $created_to_search);
        }
        $contacts = $query->paginate(10);
        $param = [
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'email' => $request->email,
            'created_from' => $request->created_from,
            'created_to' => $request->created_to,
            'contacts' => $contacts
        ];
        return view('manage', $param);
    }
    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/manage');
    }
}
