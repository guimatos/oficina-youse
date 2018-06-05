@extends('layouts.app') @section('content')
<section class="parts-invoice panel">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1>Notas recebidas</h1>
            </div>
            <div class="row">
                <div class="col s12">
                    <form action="/admin/notas/pesquisar" method="GET" role="search">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">textsms</i>
                            <input id="q" name="q" type="text" class="validate">
                            <label for="autocomplete-input">Pesquisar...</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col s12">
                @if(isset($partsInvoices) && count($partsInvoices) > 0)
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Sinistro</th>
                            <th>Documento</th>
                            <th>Placa</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($partsInvoices as $partsInvoice)
                        <tr>
                            <td>{{$partsInvoice->sinister}}</td>
                            <td>{{$partsInvoice->office_document}}</td>
                            <td>{{$partsInvoice->vehicle_plate}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">                
                    <div class="col s12">
                        {{ $partsInvoices->links() }}
                    </div>
                </div>

                @else
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{!! $message !!}</strong>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection