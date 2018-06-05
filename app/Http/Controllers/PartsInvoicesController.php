<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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

    public function get()
    {
        $partsInvoices = PartsInvoice::orderBy('created_at', 'desc')->paginate(10);

        if (count ( $partsInvoices ) > 0){
            return view('admin.partsinvoice.index',['partsInvoices' => $partsInvoices]);
        } else {
            return view ('admin.partsinvoice.index')->with('warning', 'Não há resultados a exibir.');
        }
        
    }
    
    public function search (Request $request) {
        $q = $request->q;
        if($q != ""){
            $partsInvoices = PartsInvoice::where ( 'sinister', 'LIKE', '%' . $q . '%' )->orWhere ( 'vehicle_plate', 'LIKE', '%' . $q . '%' )->orWhere ('office_document', 'LIKE', '%' . $q . '%' )->paginate(10)->setPath ( '' );
            $pagination = $partsInvoices->appends ( array (
                        'q' => Input::get ( 'q' ) 
                ));
            if (count($partsInvoices) > 0){
                return view('admin.partsinvoice.index', ['partsInvoices' => $partsInvoices]);
            } else {
                return view('admin.partsinvoice.index', ['message' => 'Nenhum resultado encontrado com o termo <i>' . $q . '</i>. Por favor, tente novamente.']);
            }   
        }
        return view ('admin.partsinvoice.index')->with('warning', 'No Details found. Try to search again !');
    }

    public function store(Request $request)
    {
        try {
            $partsInvoice = new PartsInvoice;
            $partsInvoice->sinister        = $request->sinister;
            $partsInvoice->vehicle_plate = $request->vehicle_plate;
            $partsInvoice->office_email    = $request->office_email;
            $partsInvoice->office_telephone       = $request->office_telephone;
            $partsInvoice->office_document       = $request->office_document;
            $partsInvoice->bank       = $request->bank;
            $partsInvoice->agency       = $request->agency;
            $partsInvoice->account       = $request->account;

            if(isset($request->invoice_parts)){
                $filenameInvoiceParts = $request->file('invoice_parts')->store('invoice_parts');
                $partsInvoice->invoice_parts = $filenameInvoiceParts;
            }
            if(isset($request->invoice_services)){
                $filenameInvoiceServices = $request->file('invoice_services')->store('invoices_services');
                $partsInvoice->invoice_services = $filenameInvoiceServices;
            }
            if(isset($request->discharge_term)){
                $filenameInvoiceDischargTerms = $request->file('discharge_term')->store('discharge_terms');
                $partsInvoice->discharge_term = $filenameInvoiceDischargTerms;
            }
    
            $partsInvoice->save();
            return back()->with('success', 'Nota enviada com sucesso!');
        }
        catch (\Exception $e){
            return back()->with('error', 'Ocorreu um erro ao enviar sua nota. Por favor, tente novamente' . '<br> Erro: ' . $e->getMessage());
        }
    }
  
    public function show($id)
    {
        $partsInvoice = PartsInvoice::findOrFail($id);

        if($partsInvoice->read == 0){
            $partsInvoice->read = 1;
            $partsInvoice->save();
        }
        
        return view('admin.partsinvoice.view',compact('partsInvoice'));
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
