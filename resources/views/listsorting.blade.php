<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Панель управления') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        {{-- <x-jet-application-logo class="block h-12 w-auto" /> --}}
                    </div>
                    <div class="mt-8 text-2xl">
                        Добро пожаловать!
                    </div>
                    {{-- <div class="mt-6 text-gray-500"> --}}
                    {{-- </div> --}}
                </div>
                <div class="bg-gray-200 border-b bg-opacity-25 grid grid-cols-1 md:grid-cols-1">
                    
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"> Приходы </div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th style="text-align:center" scope="col">#</th>
                                        <th style="text-align:center" scope="col">Сегодня</th>
                                        <th style="text-align:center" scope="col">Вчера</th>
                                        <th style="text-align:center" scope="col">Прошлая неделя</th>
                                        <th style="text-align:center" scope="col">Прошлые 7 дней</th>
                                        <th style="text-align:center" scope="col">Прошлый месяц</th>
                                        <th style="text-align:center" scope="col">За все время</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th style="text-align:center" scope="row">USD</th>
                                        <td style="text-align:center"> {{$usd_sumSP}}</td>
                                        <td style="text-align:center"> {{$usd_sumVP}}</td>
                                        <td style="text-align:center"> {{$usd_sumNP}}</td>
                                        <td style="text-align:center"> {{$usd_sumN7}}</td>
                                        <td style="text-align:center"> {{$usd_sumMP}} </td>
                                        <td style="text-align:center"> {{$usd_sumALLP}}</td>

                                      </tr>
                                      <tr>
                                        <th style="text-align:center" scope="row">RUB</th>
                                        <td style="text-align:center"> {{$rub_sumSP}}</td>
                                        <td style="text-align:center"> {{$rub_sumVP}}</td>
                                        <td style="text-align:center"> {{$rub_sumNP}}</td>
                                        <td style="text-align:center"> {{$rub_sumN7}}</td>
                                        <td style="text-align:center"> {{$rub_sumMP}}</td>
                                        <td style="text-align:center"> {{$rub_sumALLP}}</td>

                                      </tr>
                                      <tr>
                                        <th style="text-align:center" scope="row">UZS</th>
                                        <td style="text-align:center"> {{$uzs_sumSP}}</td>
                                        <td style="text-align:center"> {{$uzs_sumVP}}</td>
                                        <td style="text-align:center"> {{$uzs_sumNP}}</td>
                                        <td style="text-align:center"> {{$uzs_sumN7}}</td>
                                        <td style="text-align:center"> {{$uzs_sumMP}}</td>
                                        <td style="text-align:center"> {{$uzs_sumALLP}}</td>

                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                            
                        </div>
                    </div>
       
                </div>
                <div class="bg-gray-200 border-b bg-opacity-25 grid grid-cols-1 md:grid-cols-1">
                    
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"> Расходы </div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th style="text-align:center" scope="col">#</th>
                                        <th style="text-align:center" scope="col">Сегодня</th>
                                        <th style="text-align:center" scope="col">Вчера</th>
                                        <th style="text-align:center" scope="col">Прошлая неделя</th>
                                        <th style="text-align:center" scope="col">Прошлые 7 дней</th>
                                        <th style="text-align:center" scope="col">Прошлый месяц</th>
                                        <th style="text-align:center" scope="col">За все время</th>


                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th style="text-align:center" scope="row">USD</th>
                                        <td style="text-align:center"> {{$usd_sumSTR}}</td>
                                        <td style="text-align:center"> {{$usd_sumVTR}}</td>
                                        <td style="text-align:center"> {{$usd_sumNTR}}</td>
                                        <td style="text-align:center"> {{$usd_sumNTR7}}</td>
                                        <td style="text-align:center"> {{$usd_sumMTR}} </td>
                                        <td style="text-align:center"> {{$usd_sumALLTR}}</td>
                                      </tr>
                                      <tr>
                                        <th style="text-align:center" scope="row">RUB</th>
                                        <td style="text-align:center"> {{$rub_sumSTR}}</td>
                                        <td style="text-align:center"> {{$rub_sumVTR}}</td>
                                        <td style="text-align:center"> {{$rub_sumNTR}}</td>
                                        <td style="text-align:center"> {{$rub_sumNTR7}}</td>
                                        <td style="text-align:center"> {{$rub_sumMTR}}</td>
                                        <td style="text-align:center"> {{$rub_sumALLTR}}</td>
                                      </tr>
                                      <tr>
                                        <th style="text-align:center" scope="row">UZS</th>
                                        <td style="text-align:center"> {{$uzs_sumSTR}}</td>
                                        <td style="text-align:center"> {{$uzs_sumVTR}}</td>
                                        <td style="text-align:center"> {{$uzs_sumNTR}}</td>
                                        <td style="text-align:center"> {{$uzs_sumNTR7}}</td>
                                        <td style="text-align:center"> {{$uzs_sumMTR}}</td>
                                        <td style="text-align:center"> {{$uzs_sumALLTR}}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                            
                        </div>
                    </div>
       
                </div>
                <div class="bg-gray-200 border-b bg-opacity-25 grid grid-cols-1 md:grid-cols-1">
                    
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"> Долги</div>
                        </div>
                        <div class="container mt-3">
                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs">
                            <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#home">Все</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#menu1">Не отданные</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#menu2">Отданные</a>
                            </li>
                          </ul>
                        
                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div id="home" class="container tab-pane active">
                              {{-- <br> --}}
                              {{-- <div class="ml-12"> --}}
                                {{-- <div class="mt-2 text-sm text-gray-500"> --}}
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th style="text-align:center" scope="col">#</th>
                                            <th style="text-align:center" scope="col">Сегодня</th>
                                            <th style="text-align:center" scope="col">Вчера</th>
                                            <th style="text-align:center" scope="col">Прошлая неделя</th>
                                            <th style="text-align:center" scope="col">Прошлые 7 дней</th>
                                            <th style="text-align:center" scope="col">Прошлый месяц</th>
                                            <th style="text-align:center" scope="col">За все время</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th style="text-align:center" scope="row">USD</th>
                                            <td style="text-align:center"> {{$usd_sumSD}}</td>
                                            <td style="text-align:center"> {{$usd_sumVD}}</td>
                                            <td style="text-align:center"> {{$usd_sumND}}</td>
                                            <td style="text-align:center"> {{$usd_sumND7}}</td>
                                            <td style="text-align:center"> {{$usd_sumMD}} </td>
                                            <td style="text-align:center"> {{$usd_sumALLD}}</td>
                                          </tr>
                                          <tr>
                                            <th style="text-align:center" scope="row">RUB</th>
                                            <td style="text-align:center"> {{$rub_sumSD}}</td>
                                            <td style="text-align:center"> {{$rub_sumVD}}</td>
                                            <td style="text-align:center"> {{$rub_sumND}}</td>
                                            <td style="text-align:center"> {{$rub_sumND7}}</td>
                                            <td style="text-align:center"> {{$rub_sumMD}}</td>
                                            <td style="text-align:center"> {{$rub_sumALLD}}</td>
                                          </tr>
                                          <tr>
                                            <th style="text-align:center" scope="row">UZS</th>
                                            <td style="text-align:center"> {{$uzs_sumSD}}</td>
                                            <td style="text-align:center"> {{$uzs_sumVD}}</td>
                                            <td style="text-align:center"> {{$uzs_sumND}}</td>
                                            <td style="text-align:center"> {{$uzs_sumND7}}</td>
                                            <td style="text-align:center"> {{$uzs_sumMD}}</td>
                                            <td style="text-align:center"> {{$uzs_sumALLD}}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                {{-- </div> --}}
                                
                            {{-- </div> --}}
                            </div>
                            <div id="menu1" class="container tab-pane fade">
                              {{-- <br> --}}
                              {{-- <div class="ml-12"> --}}
                                {{-- <div class="mt-2 text-sm text-gray-500"> --}}
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th style="text-align:center" scope="col">#</th>
                                            <th style="text-align:center" scope="col">Сегодня</th>
                                            <th style="text-align:center" scope="col">Вчера</th>
                                            <th style="text-align:center" scope="col">Прошлая неделя</th>
                                            <th style="text-align:center" scope="col">Прошлые 7 дней</th>
                                            <th style="text-align:center" scope="col">Прошлый месяц</th>
                                            <th style="text-align:center" scope="col">За все время</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th style="text-align:center" scope="row">USD</th>
                                            <td style="text-align:center"> {{$usd_sumSDnone}}</td>
                                            <td style="text-align:center"> {{$usd_sumVDnone}}</td>
                                            <td style="text-align:center"> {{$usd_sumNDnone}}</td>
                                            <td style="text-align:center"> {{$usd_sumND7none}}</td>
                                            <td style="text-align:center"> {{$usd_sumMDnone}} </td>
                                            <td style="text-align:center"> {{$usd_sumALLDnone}}</td>
                                          </tr>
                                          <tr>
                                            <th style="text-align:center" scope="row">RUB</th>
                                            <td style="text-align:center"> {{$rub_sumSDnone}}</td>
                                            <td style="text-align:center"> {{$rub_sumVDnone}}</td>
                                            <td style="text-align:center"> {{$rub_sumNDnone}}</td>
                                            <td style="text-align:center"> {{$rub_sumND7none}}</td>
                                            <td style="text-align:center"> {{$rub_sumMDnone}}</td>
                                            <td style="text-align:center"> {{$rub_sumALLDnone}}</td>
                                          </tr>
                                          <tr>
                                            <th style="text-align:center" scope="row">UZS</th>
                                            <td style="text-align:center"> {{$uzs_sumSDnone}}</td>
                                            <td style="text-align:center"> {{$uzs_sumVDnone}}</td>
                                            <td style="text-align:center"> {{$uzs_sumNDnone}}</td>
                                            <td style="text-align:center"> {{$uzs_sumND7none}}</td>
                                            <td style="text-align:center"> {{$uzs_sumMDnone}}</td>
                                            <td style="text-align:center"> {{$uzs_sumALLDnone}}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                {{-- </div> --}}
                                
                            {{-- </div> --}}
                            </div>
                            <div id="menu2" class="container tab-pane fade">
                              {{-- <br> --}}
                              {{-- <div class="ml-12"> --}}
                                {{-- <div class="mt-2 text-sm text-gray-500"> --}}
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th style="text-align:center" scope="col">#</th>
                                            <th style="text-align:center" scope="col">Сегодня</th>
                                            <th style="text-align:center" scope="col">Вчера</th>
                                            <th style="text-align:center" scope="col">Прошлая неделя</th>
                                            <th style="text-align:center" scope="col">Прошлые 7 дней</th>
                                            <th style="text-align:center" scope="col">Прошлый месяц</th>
                                            <th style="text-align:center" scope="col">За все время</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th style="text-align:center" scope="row">USD</th>
                                            <td style="text-align:center"> {{$usd_sumSDyes}}</td>
                                            <td style="text-align:center"> {{$usd_sumVDyes}}</td>
                                            <td style="text-align:center"> {{$usd_sumNDyes}}</td>
                                            <td style="text-align:center"> {{$usd_sumND7yes}}</td>
                                            <td style="text-align:center"> {{$usd_sumMDyes}} </td>
                                            <td style="text-align:center"> {{$usd_sumALLDyes}}</td>
                                          </tr>
                                          <tr>
                                            <th style="text-align:center" scope="row">RUB</th>
                                            <td style="text-align:center"> {{$rub_sumSDyes}}</td>
                                            <td style="text-align:center"> {{$rub_sumVDyes}}</td>
                                            <td style="text-align:center"> {{$rub_sumNDyes}}</td>
                                            <td style="text-align:center"> {{$rub_sumND7yes}}</td>
                                            <td style="text-align:center"> {{$rub_sumMDyes}}</td>
                                            <td style="text-align:center"> {{$rub_sumALLDyes}}</td>
                                          </tr>
                                          <tr>
                                            <th style="text-align:center" scope="row">UZS</th>
                                            <td style="text-align:center"> {{$uzs_sumSDyes}}</td>
                                            <td style="text-align:center"> {{$uzs_sumVDyes}}</td>
                                            <td style="text-align:center"> {{$uzs_sumNDyes}}</td>
                                            <td style="text-align:center"> {{$uzs_sumND7yes}}</td>
                                            <td style="text-align:center"> {{$uzs_sumMDyes}}</td>
                                            <td style="text-align:center"> {{$uzs_sumALLDyes}}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                {{-- </div> --}}
                                
                            {{-- </div> --}}
                            </div>
                          </div>
                        </div>
                        
                    </div>
                </div>

 
                          

            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>