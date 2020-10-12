<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Редактировать приход') }}
        </h2>
    </x-slot>

    <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
<link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        {{-- <x-jet-application-logo class="block h-12 w-auto" /> --}}
                    </div>
                    <div class="mt-8 text-2xl">
                      Пожалуйста запольните все поля
                    </div>
                    <div class="mt-6 text-gray-500">
                        <form method="POST" action={{route('updatemoney', $moneys->id)}}>
                            @csrf
                            <div class="form-row">
                              <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="customer_id"  value="{{$moneys->customer_id}}">
                              </div>
                              <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="customername"  value="{{$moneys->customer_name}}">
                              </div>
                              <div class="form-group col-md-4">
                                  <input type="text" class="form-control" name="couriername"  value="{{$moneys->courier_id}}">
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                  @if ($moneys->type=='USD')
                                  <input type="text" class="form-control" name="amount"  value="{{$moneys->usd }}" placeholder="Enter amount replenishment ">
                                  @endif
                                  @if ($moneys->type=='RUB')
                                  <input type="text" class="form-control" name="amount"  value="{{$moneys->rub }}" placeholder="Enter amount replenishment ">
                                  @endif
                                  @if ($moneys->type=='UZS')
                                  <input type="text" class="form-control" name="amount"  value="{{$moneys->uzs }}" placeholder="Enter amount replenishment ">
                                  @endif
      
                                </div>
                                <div class="form-group col-md-3">
                                    <select name="type" class="form-control">
                                      @if ($moneys->type == "USD")
                                        <option value="{{$moneys->type}}" selected>{{$moneys->type}}</option>
                                        <option value="RUB">RUB</option>
                                        <option value="UZS">UZS</option>
                                      @endif
                                      @if ($moneys->type == "RUB")
                                      <option value="USD">USD</option>
                                      <option value="{{$moneys->type}}" selected>{{$moneys->type}}</option>
                                      <option value="UZS">UZS</option>
                                      @endif
                                      @if ($moneys->type == "UZS")
                                      <option value="USD">USD</option>
                                      <option value="RUB">RUB</option>
                                      <option value="{{$moneys->type}}" selected>{{$moneys->type}}</option>
                                      @endif
                                    </select>
                                  </div>

                                  <div class="form-group col-md-3">
                                    <select name="servicetype" class="form-control">
                                      @if ($moneys->servicetype == "Предоплата (нал.)")
                                        <option  value="{{$moneys->servicetype}}" selected>{{$moneys->servicetype}}</option>
                                      {{-- <option value="Предоплата (нал.)">Предоплата (нал.)</option> --}}
                                        <option value="Предоплата (кар.)">Предоплата (кар.)</option>
                                        <option value="За перевозку (нал.)">За перевозку (нал.)</option>
                                        <option value="За перевозку (карт.)">За перевозку (карт.)</option>
                                        <option value="За товар (нал.)">За товар (нал.)</option>
                                        <option value="За товар (кар.)">За товар (кар.)</option>
                                        <option value="В Займы (нал.)">В Займы (нал.)</option>
                                        <option value="В Займы (кар.)">В Займы (кар.)</option>
                                        <option value="Обмен">Обмен</option>
                                      @endif

                                      @if ($moneys->servicetype == "Предоплата (кар.)")
                                      <option value="Предоплата (нал.)">Предоплата (нал.)</option>
                                      <option  value="{{$moneys->servicetype}}" selected>{{$moneys->servicetype}}</option>

                                      {{-- <option value="Предоплата (кар.)">Предоплата (кар.)</option> --}}
                                      <option value="За перевозку (нал.)">За перевозку (нал.)</option>
                                      <option value="За перевозку (карт.)">За перевозку (карт.)</option>
                                      <option value="За товар (нал.)">За товар (нал.)</option>
                                      <option value="За товар (кар.)">За товар (кар.)</option>
                                      <option value="В Займы (нал.)">В Займы (нал.)</option>
                                      <option value="В Займы (кар.)">В Займы (кар.)</option>
                                      <option value="Обмен">Обмен</option>
                                      @endif

                                      @if ($moneys->servicetype == "За перевозку (нал.)")
                                      <option value="Предоплата (нал.)">Предоплата (нал.)</option>
                                      <option value="Предоплата (кар.)">Предоплата (кар.)</option>
                                      <option  value="{{$moneys->servicetype}}" selected>{{$moneys->servicetype}}</option>

                                      {{-- <option value="За перевозку (нал.)">За перевозку (нал.)</option> --}}
                                      <option value="За перевозку (карт.)">За перевозку (карт.)</option>
                                      <option value="За товар (нал.)">За товар (нал.)</option>
                                      <option value="За товар (кар.)">За товар (кар.)</option>
                                      <option value="В Займы (нал.)">В Займы (нал.)</option>
                                      <option value="В Займы (кар.)">В Займы (кар.)</option>
                                      <option value="Обмен">Обмен</option>
                                      @endif

                                      @if ($moneys->servicetype == "За перевозку (карт.)")
                                      <option value="Предоплата (нал.)">Предоплата (нал.)</option>
                                      <option value="Предоплата (кар.)">Предоплата (кар.)</option>
                                      <option value="За перевозку (нал.)">За перевозку (нал.)</option>
                                      <option  value="{{$moneys->servicetype}}" selected>{{$moneys->servicetype}}</option>

                                      {{-- <option value="За перевозку (карт.)">За перевозку (карт.)</option> --}}
                                      <option value="За товар (нал.)">За товар (нал.)</option>
                                      <option value="За товар (кар.)">За товар (кар.)</option>
                                      <option value="В Займы (нал.)">В Займы (нал.)</option>
                                      <option value="В Займы (кар.)">В Займы (кар.)</option>
                                      <option value="Обмен">Обмен</option>
                                      @endif

                                      @if ($moneys->servicetype == "За товар (нал.)")
                                      <option value="Предоплата (нал.)">Предоплата (нал.)</option>
                                      <option value="Предоплата (кар.)">Предоплата (кар.)</option>
                                      <option value="За перевозку (нал.)">За перевозку (нал.)</option>
                                      <option value="За перевозку (карт.)">За перевозку (карт.)</option>
                                      <option  value="{{$moneys->servicetype}}" selected>{{$moneys->servicetype}}</option>

                                      {{-- <option value="За товар (нал.)">За товар (нал.)</option> --}}
                                      <option value="За товар (кар.)">За товар (кар.)</option>
                                      <option value="В Займы (нал.)">В Займы (нал.)</option>
                                      <option value="В Займы (кар.)">В Займы (кар.)</option>
                                      <option value="Обмен">Обмен</option>
                                      @endif

                                      @if ($moneys->servicetype == "За товар (кар.)")
                                      <option value="Предоплата (нал.)">Предоплата (нал.)</option>
                                      <option value="Предоплата (кар.)">Предоплата (кар.)</option>
                                      <option value="За перевозку (нал.)">За перевозку (нал.)</option>
                                      <option value="За перевозку (карт.)">За перевозку (карт.)</option>
                                      <option value="За товар (нал.)">За товар (нал.)</option>
                                      <option  value="{{$moneys->servicetype}}" selected>{{$moneys->servicetype}}</option>

                                      {{-- <option value="За товар (кар.)">За товар (кар.)</option> --}}
                                      <option value="В Займы (нал.)">В Займы (нал.)</option>
                                      <option value="В Займы (кар.)">В Займы (кар.)</option>
                                      <option value="Обмен">Обмен</option>
                                      @endif

                                      @if ($moneys->servicetype == "В Займы (нал.)")
                                      <option value="Предоплата (нал.)">Предоплата (нал.)</option>
                                      <option value="Предоплата (кар.)">Предоплата (кар.)</option>
                                      <option value="За перевозку (нал.)">За перевозку (нал.)</option>
                                      <option value="За перевозку (карт.)">За перевозку (карт.)</option>
                                      <option value="За товар (нал.)">За товар (нал.)</option>
                                      <option value="За товар (кар.)">За товар (кар.)</option>
                                      <option  value="{{$moneys->servicetype}}" selected>{{$moneys->servicetype}}</option>

                                      {{-- <option value="В Займы (нал.)">В Займы (нал.)</option> --}}
                                      <option value="В Займы (кар.)">В Займы (кар.)</option>
                                      <option value="Обмен">Обмен</option>
                                      @endif

                                      @if ($moneys->servicetype == "В Займы (кар.)")
                                      <option value="Предоплата (нал.)">Предоплата (нал.)</option>
                                      <option value="Предоплата (кар.)">Предоплата (кар.)</option>
                                      <option value="За перевозку (нал.)">За перевозку (нал.)</option>
                                      <option value="За перевозку (карт.)">За перевозку (карт.)</option>
                                      <option value="За товар (нал.)">За товар (нал.)</option>
                                      <option value="За товар (кар.)">За товар (кар.)</option>
                                      <option value="В Займы (нал.)">В Займы (нал.)</option>
                                      <option  value="{{$moneys->servicetype}}" selected>{{$moneys->servicetype}}</option>

                                      {{-- <option value="В Займы (кар.)">В Займы (кар.)</option> --}}
                                      <option value="Обмен">Обмен</option>
                                      @endif

                                      @if ($moneys->servicetype == "Обмен")
                                      <option value="Предоплата (нал.)">Предоплата (нал.)</option>
                                      <option value="Предоплата (кар.)">Предоплата (кар.)</option>
                                      <option value="За перевозку (нал.)">За перевозку (нал.)</option>
                                      <option value="За перевозку (карт.)">За перевозку (карт.)</option>
                                      <option value="За товар (нал.)">За товар (нал.)</option>
                                      <option value="За товар (кар.)">За товар (кар.)</option>
                                      <option value="В Займы (нал.)">В Займы (нал.)</option>
                                      <option value="В Займы (кар.)">В Займы (кар.)</option>
                                      <option  value="{{$moneys->servicetype}}" selected>{{$moneys->servicetype}}</option>

                                      {{-- <option value="Обмен">Обмен</option> --}}
                                      @endif

                                      
                                      
                                  </select>

                                  </div>
                                  <div class="form-group col-md-3">

                                    <select name="status" class="form-control">
                                    @if ($moneys->status == "Принят")
                                      <option value="{{$moneys->status}}" selected>{{$moneys->status}}</option>
                                      <option value="Не Принят">Не Принят</option>
                                    @endif

                                      @if ($moneys->status == "Не Принят")
                                        <option value="Принят">Принят</option>
                                        <option value="{{$moneys->status}}" selected>{{$moneys->status}}</option>
                                        @endif

                                      </select>
                                  </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$moneys->description}}</textarea>
                                </div>
                              </div>
                            <div class="form-group">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                  Отправить отчет по телеграму
                                </label>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                          </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script >$('#editable-select').editableSelect();
$('#editable-select1').editableSelect();
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>