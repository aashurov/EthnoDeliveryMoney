<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Редактировать долг') }}
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
                        <form method="POST" action={{route('updateloan', $loans->id)}}>
                            @csrf
                            <div class="form-row">
                              <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="customer_id"  value="{{$loans->customer_id}}">
                              </div>
                              <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="customername"  value="{{$loans->customer_name}}">
                              </div>
                              <div class="form-group col-md-4">
                                  <input type="text" class="form-control" name="couriername"  value="{{$loans->courier_id}}">
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                  @if ($loans->type=='USD')
                                  <input type="text" class="form-control" name="amount"  value="{{$loans->usd }}" placeholder="Enter amount replenishment ">
                                  @endif
                                  @if ($loans->type=='RUB')
                                  <input type="text" class="form-control" name="amount"  value="{{$loans->rub }}" placeholder="Enter amount replenishment ">
                                  @endif
                                  @if ($loans->type=='UZS')
                                  <input type="text" class="form-control" name="amount"  value="{{$loans->uzs }}" placeholder="Enter amount replenishment ">
                                  @endif
      
                                </div>
                                <div class="form-group col-md-4">
                                    <select name="type" class="form-control">
                                      @if ($loans->type == "USD")
                                        <option value="{{$loans->type}}" selected>{{$loans->type}}</option>
                                        <option value="RUB">RUB</option>
                                        <option value="UZS">UZS</option>
                                      @endif
                                      @if ($loans->type == "RUB")
                                      <option value="USD">USD</option>
                                      <option value="{{$loans->type}}" selected>{{$loans->type}}</option>
                                      <option value="UZS">UZS</option>
                                      @endif
                                      @if ($loans->type == "UZS")
                                      <option value="USD">USD</option>
                                      <option value="RUB">RUB</option>
                                      <option value="{{$loans->type}}" selected>{{$loans->type}}</option>
                                      @endif
                                    </select>
                                  </div>

                                  
                                  <div class="form-group col-md-4">

                                    <select name="status" class="form-control">
                                    @if ($loans->status == "Взял")
                                      <option value="{{$loans->status}}" selected>{{$loans->status}}</option>
                                      <option value="Отдал">Отдал</option>
                                    @endif

                                      @if ($loans->status == "Отдал")
                                        <option value="Взял">Взял</option>
                                        <option value="{{$loans->status}}" selected>{{$loans->status}}</option>
                                        @endif

                                      </select>
                                  </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$loans->description}}</textarea>
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