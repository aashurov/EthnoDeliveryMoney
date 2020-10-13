<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Редактировать клиента') }}
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
                        <form method="POST" action={{route('updatecustomer', $customers->id)}}>
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input value="{{$customers->c_id}}" type="text" class="form-control" name="customernumber" placeholder="Введите ID клиента">
                                  </div>
                              <div class="form-group col-md-4">
                                <input value="{{$customers->flname}}" type="text" class="form-control" name="customername" placeholder="Введите имя клиента">
                              </div>
                              <div class="form-group col-md-4">
                                <input value="{{$customers->phone_number}}" type="text" class="form-control" name="phonenumber" placeholder="Введите контакты клиента">
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                          </form>
                    </div>
                    <div class="table-responsive mt-6">
                        
                        <table class="table table-bordered table-sm ">
                          <thead>
                            <tr>
                              <th scope="col">№</th>
                              {{-- <th scope="col">ID Клиента</th> --}}
                              {{-- <th scope="col">Имя Клиент</th> --}}
                              <th scope="col">Курер</th>
                              <th scope="col">USD</th>
                              <th scope="col">RUB</th>
                              <th scope="col">UZS</th>
                              <th scope="col">Тип</th>
                              <th scope="col">Тип сервиса</th>
                              <th scope="col">Дата взятие</th>
                              <th scope="col">Статус</th>
                              <th scope="col">Дата принятие</th>
                              <th scope="col">Описание</th>
                              {{-- <th scope="col">Действие</th> --}}
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              @php
                              $i = 0;
                          @endphp
                          @foreach ($forcustomers as $forcustomer)
                              <tr>
                                  <td>{{ ++$i }}</td> 
                                  {{-- <td>{{ $forcustomer->customer_id}}</td> --}}
                                  {{-- <td>{{ $forcustomer->customer_name}}</td> --}}
                                  <td>{{ $forcustomer->courier_id }}</td>
                                  <td>{{ $forcustomer->usd }}</td>
                                  <td>{{ $forcustomer->rub }}</td>
                                  <td>{{ $forcustomer->uzs }}</td>
                                  <td>{{ $forcustomer->type }}</td>
                                  <td>{{ $forcustomer->servicetype }}</td>
                                  <td>{{ $forcustomer->dategive }}</td>
                                  <td>{{ $forcustomer->status }}</td>
                                  <td>{{ $forcustomer->datereceive }}</td> 
                                   <td>{{ $forcustomer->description }}</td> 
                                  <td>
                                    {{-- <form action="{{route('deletemoney', $money->id)}}" method="POST", enctype="multipart/form-data"> --}}
                                      @csrf
                                      @method('POST')
                                      {{-- <a class="btn btn-success btn-sm" href="{{ route('editmoney',$money->id) }}"><i class="fa fa-eye"></i></a> --}}
  
                                      {{-- <a class="btn btn-warning btn-sm" href="{{ route('editmoney',$money->id) }}"><i class="fa fa-pencil"></i></a> --}}
                                      {{-- <button class="btn btn-danger btn-sm" type="submit"> --}}
                                        <i class="fa fa-trash"></i></button>
                                    </form>
                                    </td>
                              </tr>
                         @endforeach 
                            </tr>
                          </tbody>
                          
                        </table>
                        {{-- {{$moneys->render()}} --}}
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