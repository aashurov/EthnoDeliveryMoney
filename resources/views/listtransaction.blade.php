<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Список расходов') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200" >
                    <div>
                        {{-- <x-jet-application-logo class="block h-12 w-auto" /> --}}
                    </div>
                    <div class="mt-6 text-gray-500">
                      <div class="panel-heading">
                        <div class="row">
                          <div class="col col-xs-6">
                            <h3 class="panel-title">Список расходов</h3>
                          </div>
                          <div class="col col-xs-6 text-right">
                            <a class="btn btn-sm btn-primary btn-create"  href="{{ route('addtransaction') }}">Добавить</a>
                          </div>
                        </div>
                      </div>
                      <div class="table-responsive mt-6">
                        
                      <table class="table table-bordered table-sm ">
                        <thead>
                          <tr>
                            <th scope="col">№</th>
                            <th scope="col">Курер</th>
                            <th scope="col">USD</th>
                            <th scope="col">RUB</th>
                            <th scope="col">UZS</th>
                            <th scope="col">Тип</th>
                            <th scope="col">Тип расхода</th>
                            <th scope="col">Дата расхода</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Действие</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @php
                            $i = 0;
                        @endphp
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $transaction->courier_id }}</td>
                                <td>{{ $transaction->usd }}</td>
                                <td>{{ $transaction->rub }}</td>
                                <td>{{ $transaction->uzs }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->transactiontype }}</td>
                                <td>{{ $transaction->datecreate }}</td>
                                <td>{{ $transaction->description }}</td>
                                {{-- <td>{{ $transaction->description }}</td> --}}
                                <td>
                                  <form action="{{route('deletetransaction', $transaction->id)}}" method="POST", enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <a class="btn btn-warning btn-sm" href="{{ route('edittransaction',$transaction->id) }}"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-sm" type="submit">
                                      <i class="fa fa-trash"></i></button>
                                  </form>
                                  </td>
                            </tr>
                        @endforeach
                          </tr>
                        </tbody>
                      </table>
                      {{$transactions->render()}}
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