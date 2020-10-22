<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Добавить долг') }}
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
                        <form method="POST" action={{route('saveloan')}}>
                            @csrf
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <select id="editable-select" name="customername" class="form-control" placeholder="Имя клиента">
                                  @foreach ($customers as $customer)
                                  <option value="{{$customer->flname}}">{{$customer->c_id}} {{$customer->flname}} {{$customer->phone_number}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group col-md-6">
                                <select   id="editable-select1" name="couriername" class="form-control" placeholder="Имя курера">
                                  @foreach ($couriers as $courier)
                                  <option value="{{$courier->flname}}">{{$courier->flname}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                  <input type="text" class="form-control" name="amount" placeholder="Введите сумму долга">
                                </div>
                                <div class="form-group col-md-4">
                                    <select name="type" class="form-control">
                                      <option selected>Тип валюты...</option>
                                      @foreach ($types as $type)
                                  <option value="{{$type->type_name}}">{{$type->type_name}}</option>
                                  @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <select name="status" class="form-control">
                                      <option selected>Статус...</option>
                                      <option value="Взял">Взял</option>
                                      <option value="Отдал">Отдал</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
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