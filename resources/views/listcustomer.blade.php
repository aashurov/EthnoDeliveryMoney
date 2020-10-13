<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Список клиентов') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200" >
                    <div>
                        {{-- <x-jet-application-logo class="block h-12 w-auto" /> --}}
                    </div>
                    <div class="mt-6 text-gray-500">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col col-xs-6">
                            <h3 class="panel-title">Список клиентов</h3>
                          </div>
                          <div class="col col-xs-6 text-right">
                            <a class="btn btn-sm btn-primary btn-create"  href="{{ route('addcustomer') }}">Добавить</a>
                          </div>
                        </div>
                      </div>
                      <div class="table-responsive">
                        
                      <table class="table table-bordered table-sm">
                        <thead>
                          <tr>
                            <th scope="col">№</th>
                            <th scope="col">ID Клиента</th>
                            <th scope="col">Имя Клиента</th>
                            <th scope="col">Контакты</th>
                            <th scope="col">Действия</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @php
                            $i = 0;
                        @endphp
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $customer->c_id }}</td>
                                <td>{{ $customer->flname }}</td>
                                <td>{{ $customer->phone_number}}</td>
                                <td>
                                  <form action="{{route('deletecustomer', $customer->id)}}" method="POST", enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <a class="btn btn-success btn-sm" href="{{ route('editcustomer',$customer->id) }}"><i class="fa fa-eye"></i></a>

                                    <a class="btn btn-warning btn-sm" href="{{ route('editcustomer',$customer->id) }}"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-sm" type="submit">
                                      <i class="fa fa-trash"></i></button>
                                  </form>
                                  </td>
                            </tr>
                        @endforeach
                          </tr>
                        </tbody>
                      </table>
                      {{$customers->render()}}

                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>