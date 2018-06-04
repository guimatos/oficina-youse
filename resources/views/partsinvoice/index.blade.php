@extends('layouts.app') @section('content')
<section class="header">
    <div class="container">
        <div class="title">
            <h2>
                Notas Fiscais de Peças e Serviços
            </h2>
            <p>Preencha as informações abaixo, logo responderemos</p>
        </div>
    </div>
</section>
<section class="form-section">
   <div class="container">
      <div class="row">
        <div class="col s12">
            @include('flashMessage')
        </div>
      </div>
      <div class="row">
         <form class="col s12" method="post" action="{{url('/')}}">
            {{ csrf_field() }}
            <div class="row">
               <div class="input-field col xl6 s12">
                  <input name="sinister" id="sinister" type="tel" class="validate" required>
                  <label for="sinister">N° Sinistro</label>
               </div>
               <div class="input-field col xl6 s12">
                  <input name="vehicle_plate" id="vehicle_plate" type="text" class="validate" required>
                  <label for="vehicle_plate">Placa do veículo</label>
               </div>
            </div>
            <div class="row">
               <div class="input-field col xl6 s12">
                  <input name="office_email" id="office_email" type="email" class="validate" required>
                  <label for="office_email">E-mail da oficina</label>
               </div>
               <div class="input-field col xl6 s12">
                  <input name="office_telephone" id="office_telephone" type="tel" class="validate" required>
                  <label for="office_telephone">Telefone</label>
               </div>
            </div>
            <div class="row">
               <div class="input-field col xl6 s12">
                  <input name="office_document" id="office_document" type="tel" class="validate" required>
                  <label for="office_document">CPF ou CNPJ da oficina</label>
               </div>
            </div>
            <div class="row">
               <div class="col s12">
                  <h5>DADOS BANCÁRIOS</h5>
               </div>
               <div class="input-field col xl4 s12">
                  <select name="bank" class="browser-default">
                     <option value="">Selecione um banco</option>
                     <option value="001">Banco do Brasil S.A.</option>
                     <option value="341">Banco Itaú S.A.</option>
                     <option value="033">Banco Santander (Brasil) S.A.</option>
                     <option value="356">Banco Real S.A. (antigo)</option>
                     <option value="652">Itaú Unibanco Holding S.A.</option>
                     <option value="237">Banco Bradesco S.A.</option>
                     <option value="745">Banco Citibank S.A.</option>
                     <option value="399">HSBC Bank Brasil S.A. –Banco Múltiplo</option>
                     <option value="104">Caixa Econômica Federal</option>
                     <option value="389">Banco Mercantil do Brasil S.A.</option>
                     <option value="453">Banco Rural S.A.</option>
                     <option value="422">Banco Safra S.A.</option>
                     <option value="633">Banco Rendimento S.A.</option>
                  </select>
               </div>
               <div class="input-field col xl4 s12">
                  <input name="agency" id="agency" type="tel" class="validate" required>
                  <label for="agency">Agência</label>
               </div>
               <div class="input-field col xl4 s12">
                  <input name="account" id="account" type="text" class="validate" required>
                  <label for="account">Conta</label>
               </div>
            </div>
            <div class="row">
               <div class="col s12">
                  <h5>DOCUMENTOS</h5>
               </div>
               <div class="input-field col s12">
                  <div class="file-field input-field">
                     <div class="btn" style="width:225px;">
                        <span>Nota fiscal de peças</span>
                        <input name="invoice_parts" type="file" multiple>
                     </div>
                     <div class="file-path-wrapper">
                        <input name="" class="file-path validate" type="text" placeholder="Envie um ou mais arquivos">
                     </div>
                  </div>
               </div>
               <div class="input-field col s12">
                  <div class="file-field input-field">
                     <div class="btn">
                        <span>Nota fiscal de serviços</span>
                        <input name="invoice_services" type="file" multiple>
                     </div>
                     <div class="file-path-wrapper">
                        <input name="" class="file-path validate" type="text" placeholder="Envie um ou mais arquivos">
                     </div>
                  </div>
               </div>
               <div class="input-field col s12">
                  <div class="file-field input-field">
                     <div class="btn" style="width:225px;">
                        <span>Termo de quitação</span>
                        <input name="discharge_term" type="file" multiple>
                     </div>
                     <div class="file-path-wrapper">
                        <input name="" class="file-path validate" type="text" placeholder="Envie um ou mais arquivos">
                     </div>
                  </div>
               </div>
               <div class="col s12 send">
                    <button class="btn yellow-btn waves-effect waves-light" type="submit" name="action">Enviar
                    </button>
               </div>
            </div>
         </form>
      </div>
   </div>
</section>
@endsection