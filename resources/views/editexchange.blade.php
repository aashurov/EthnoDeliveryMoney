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
                      Пожалуйста заполните все поля
                    </div>
                    <div class="mt-6 text-gray-500">
                        <form method="POST" action={{route('updateexchange', $exchanges->id)}}>
                            @csrf
                            <div class="form-row">
                              <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="customer_id"  value="{{$exchanges->customer_id}}">
                              </div>
                              <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="customername"  value="{{$exchanges->customer_name}}">
                              </div>
                              <div class="form-group col-md-4">
                                  <input type="text" class="form-control" name="couriername"  value="{{$exchanges->courier_id}}">
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                @if ($exchanges->type == "USD->RUB")
                                <input type="text" class="form-control" value="{{$exchanges->usd}}" name="amount" 
                                placeholder="Введите сумму конвертации">
                                @endif
                                @if ($exchanges->type == "USD->UZS")
                                <input type="text" class="form-control" value="{{$exchanges->usd}}" name="amount" 
                                placeholder="Введите сумму конвертации">
                                @endif
                                @if ($exchanges->type == "RUB->USD")
                                <input type="text" class="form-control" value="{{$exchanges->rub}}" name="amount" 
                                placeholder="Введите сумму конвертации">
                                @endif
                                @if ($exchanges->type == "RUB->UZS")
                                <input type="text" class="form-control" value="{{$exchanges->rub}}" name="amount" 
                                placeholder="Введите сумму конвертации">
                                @endif
                                @if ($exchanges->type == "UZS->USD")
                                <input type="text" class="form-control" value="{{$exchanges->uzs}}" name="amount" 
                                placeholder="Введите сумму конвертации">
                                @endif
                                @if ($exchanges->type == "UZS->RUB")
                                <input type="text" class="form-control" value="{{$exchanges->uzs}}" name="amount" 
                                placeholder="Введите сумму конвертации">
                                @endif
                              </div>
                              <div class="form-group col-md-6">
                                  <select name="type" class="form-control">
                                    <option selected>Тип конвертации...</option>

                                    @if ($exchanges->type == "USD->RUB")
                                        <option  value="{{$exchanges->type}}" selected>{{$exchanges->type}}</option>
                                        <option value="USD->UZS">USD->UZS</option>
                                        <option value="RUB->USD">RUB->USD</option>
                                        <option value="RUB->UZS">RUB->UZS</option>
                                        <option value="UZS->USD">UZS->USD</option>
                                        <option value="UZS->RUB">UZS->RUB</option>
                                      @endif

                                      @if ($exchanges->type == "USD->UZS")
                                      <option >USD->RUB</option>
                                      <option  value="{{$exchanges->type}}" selected>{{$exchanges->type}}</option>
                                      <option value="RUB->USD">RUB->USD</option>
                                      <option value="RUB->UZS">RUB->UZS</option>
                                      <option value="UZS->USD">UZS->USD</option>
                                      <option value="UZS->RUB">UZS->RUB</option>
                                    @endif

                                    @if ($exchanges->type == "RUB->USD")
                                    <option >USD->RUB</option>
                                    <option >USD->UZS</option>
                                    <option  value="{{$exchanges->type}}" selected>{{$exchanges->type}}</option>
                                    <option value="RUB->UZS">RUB->UZS</option>
                                    <option value="UZS->USD">UZS->USD</option>
                                    <option value="UZS->RUB">UZS->RUB</option>
                                  @endif


                                  @if ($exchanges->type == "RUB->UZS")
                                  <option >USD->RUB</option>
                                  <option >USD->UZS</option>
                                  <option >RUB->USD</option>
                                  <option  value="{{$exchanges->type}}" selected>{{$exchanges->type}}</option>
                                  <option value="UZS->USD">UZS->USD</option>
                                  <option value="UZS->RUB">UZS->RUB</option>
                                @endif

                                @if ($exchanges->type == "UZS->USD")
                                  <option >USD->RUB</option>
                                  <option >USD->UZS</option>
                                  <option >RUB->USD</option>
                                  <option >RUB->UZS</option>
                                  <option  value="{{$exchanges->type}}" selected>{{$exchanges->type}}</option>
                                  <option value="UZS->RUB">UZS->RUB</option>
                                @endif

                                @if ($exchanges->type == "UZS->RUB")
                                <option >USD->RUB</option>
                                <option >USD->UZS</option>
                                <option >RUB->USD</option>
                                <option >RUB->UZS</option>
                                <option >UZS->USD</option>
                                <option  value="{{$exchanges->type}}" selected>{{$exchanges->type}}</option>
                              @endif
                                  </select>
                                </div>
                            </div>
                             

                         
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$exchanges->description}}</textarea>
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