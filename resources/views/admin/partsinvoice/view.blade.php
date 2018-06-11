@extends('layouts.app') @section('content')
@section('title', 'Nota #' . $partsInvoice->id )
<section class="parts-invoice panel">
    <div class="container">
        <div class="row">
            <div class="col s12">
                @include('flashMessage')
            </div>
            @if(isset($partsInvoice))
            <div class="col s12">
                <h1>Nota #{{$partsInvoice->id}}</h1>
                <span>Enviada em {{$partsInvoice->created_at}}</span>
                <hr>
                <h4>Infos</h4>
                <p><b>Número do sinistro:</b> {{ $partsInvoice->sinister }}</p>
                <p><b>Placa do veículo:</b> {{ $partsInvoice->vehicle_plate }}</p>
                <p><b>E-mail da oficina:</b> {{ $partsInvoice->office_email }}</p>
                <p><b>Telefone da oficina:</b> {{ $partsInvoice->office_telephone }}</p>
                <p><b>CPF/CNPJ da oficina:</b> {{ $partsInvoice->office_document }}</p>
                <hr>
                <h4>Dados bancários</h4>
                <p><b>Banco:</b> {{ $partsInvoice->bank }}</p>
                <p><b>Agência:</b> {{ $partsInvoice->agency }}</p>
                <p><b>Conta:</b> {{ $partsInvoice->account }}</p>
                <hr>
                <h4>Documentos</h4>
                <p>
                    @if(($partsInvoice->invoice_parts))
                    <div class="btn" style="width:33%;">
                    @else
                    <div class="btn disabled" style="width:33%;">
                    @endif
                        <a class="black-link" href="{{ route('download', [$partsInvoice->id, 'document' => 'invoice_parts']) }}">
                            <span>Nota fiscal de peças</span>
                        </a>
                     </div>

                    @if(($partsInvoice->invoice_services))
                    <div class="btn" style="width:33%;">
                    @else
                    <div class="btn disabled" style="width:33%;">
                    @endif
                        <a class="black-link" href="{{ route('download', [$partsInvoice->id, 'document' => 'invoice_services']) }}">
                            <span>Nota fiscal de serviços</span>
                        </a>
                     </div>

                    @if(($partsInvoice->discharge_term))
                    <div class="btn" style="width:33%;">
                    @else
                    <div class="btn disabled" style="width:33%;">
                    @endif
                        <a class="black-link" href="{{ route('download', [$partsInvoice->id, 'document' => 'discharge_term']) }}">
                            <span>Termo de quitação</span>
                        </a>
                     </div>
                </p>
            </div>
            <div class="col s12 page-navigation">
                <h5><i class="yellow-link material-icons">chevron_left</i><a class="yellow-link" href="{{{ URL::route('partsinvoices') }}}">Voltar</a></h5>
            </div>
            @else
            <div class="col s12">
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{!! $message !!}</strong>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection