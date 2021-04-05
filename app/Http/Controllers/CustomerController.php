<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Customer;
use App\Mail\SendMail;

class CustomerController extends Controller
{
    public function index() {
        return view('customer');
    }

    public function store(Request $request)
    {

        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->message = $request->input('message');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload', $filename);
            $customer->image = $filename;
        } else {
            return $request;
            $customer->image = '';
        }
        $customer->save();

        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        );
        Mail::to('s_362@inbox.ru')->send(new SendMail($data));

        return back();
    }

    public function display() {
        $customers = Customer::all();
        return view('customers')->with('customers', $customers);
    }
}
