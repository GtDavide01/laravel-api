<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $new_contact = new Lead();
        $new_contact->fill($data);
        $new_contact->save();

        Mail::to('info@boolfolio.com')->send(new NewContact($new_contact));
    }
}
