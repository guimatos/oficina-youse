<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PartsInvoice;

class PartsInvoicesController extends Controller
{
    /**
        * Show the parts invoices form.
        *
        * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('partsinvoice.index');
    }

    public function list()
    {
        $partsInvoices = PartsInvoice::orderBy('created_at', 'desc')->paginate(10);
        return view('partsInvoices.index',['partsInvoices' => $partsInvoices]);
    }
    
    public function store(Request $request)
    {
        $partsInvoice = new PartsInvoice;
        $partsInvoice->name        = $request->name;
        $partsInvoice->description = $request->description;
        $partsInvoice->quantity    = $request->quantity;
        $partsInvoice->price       = $request->price;
        $partsInvoice->save();
        return redirect()->route('partsInvoices.index')->with('message', 'PartsInvoice created successfully!');
    }
  
    public function show($id)
    {
        $partsInvoice = PartsInvoice::findOrFail($id);
        return view('partsInvoices.edit',compact('partsInvoice'));
    }
  
    public function update(Request $request, $id)
    {
        $partsInvoice = PartsInvoice::findOrFail($id);
        $partsInvoice->name        = $request->name;
        $partsInvoice->description = $request->description;
        $partsInvoice->quantity    = $request->quantity;
        $partsInvoice->price       = $request->price;
        $partsInvoice->save();
        return redirect()->route('partsInvoices.index')->with('message', 'PartsInvoice updated successfully!');
    }
  
    public function destroy($id)
    {
        $partsInvoice = PartsInvoice::findOrFail($id);
        $partsInvoice->delete();
        return redirect()->route('partsInvoices.index')->with('alert-success','PartsInvoice hasbeen deleted!');
    }
}
