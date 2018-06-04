@extends('layouts.app') @section('content')
<section class="parts-invoice panel">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1>Notas recebidas</h1>
            </div>
            <div class="row">
                <div class="col s12">
                    @include('flashMessage')
                </div>
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
                @endif
            </div>
            <div class="col s12">
                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection