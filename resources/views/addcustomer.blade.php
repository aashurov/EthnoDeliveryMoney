<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Добавить нового клиента') }}
        </h2>
    </x-slot>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">




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
                        <form method="POST" action={{route('savecustomer')}} enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="customernumber" placeholder="ID клиента">
                                  </div>
                              <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="customername" placeholder="ФИО клиента">
                              </div>
                              <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="phonenumber" placeholder="Контакты клиента">
                              </div>
                            </div>

                            <div class="form-row">
                             
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="addressmain" placeholder="Адрес клиента (с паспорта)">
                                  </div>
                              <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="addresssecond" placeholder="Адрес клиента (проживание)">
                              </div>
                              <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="passportnumber" placeholder="Номер паспорта">
                              </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input data-date-format="dd/mm/yyyy" id="datepicker1" class="form-control" name="dategive">
                                  </div>
                              <div class="form-group col-md-4">
                                <input data-date-format="dd/mm/yyyy" id="datepicker2" class="form-control" name="expirationdate">
                              </div>
                              <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="issuedby" placeholder="Кем выдан">
                              </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <input type="file" class="form-control-file" name="imageavatar">
                                  </div>
                              <div class="form-group col-md-4">
                                <input type="file" class="form-control-file" name="imagepassport">
                              </div>
                              <div class="form-group col-md-4">
                                <input type="file" class="form-control-file" name="imagepassportt">
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
 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




<script type="text/javascript">
    $('#datepicker1').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker1').datepicker("setDate", new Date());
</script>

<script type="text/javascript">
    $('#datepicker2').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker2').datepicker("setDate", new Date());
</script>
