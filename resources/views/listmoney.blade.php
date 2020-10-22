<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Список приходов') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://dn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css">
    
    <style>
      thead input {
        width: 100%;
    }

    table td {
max-width: 120px;
white-space: nowrap;
text-overflow: ellipsis;
word-break: break-all;
overflow: hidden;
}
    </style>
    
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
                            <h3 class="panel-title">Список приходов</h3>
                          </div>
                          <div class="col col-xs-6 text-right">
                            <a class="btn btn-sm btn-primary btn-create"  href="{{ route('addmoney') }}">Добавить</a>
                          </div>
                        </div>
                      </div>
                      <table id="example" class="display compact cell-border" style="width:100%">
                        <thead>
                            <tr>
                              <th style="text-align:center" scope="col">№</th>
                              <th style="text-align:center" scope="col">ID Клиента</th>
                              <th style="text-align:center" scope="col">Имя Клиент</th>
                              <th style="text-align:center" scope="col">Курер</th>
                              <th style="text-align:center" scope="col">USD</th>
                              <th style="text-align:center" scope="col">RUB</th>
                              <th style="text-align:center" scope="col">UZS</th>
                              <th style="text-align:center" scope="col">Za kg</th>
                              <th style="text-align:center" scope="col">Тип</th>
                              {{--style="text-align:center"  <th scope="col">Филиал</th> --}}
                              <th style="text-align:center" scope="col">Тип сервиса</th>
                              <th style="text-align:center" scope="col">Дата взятие</th>
                              <th style="text-align:center" scope="col">Статус</th>
                              <th style="text-align:center" scope="col">Дата принятие</th>
                              <th style="text-align:center" scope="col">//</th>
                            </tr>
                        </thead>
                        <tbody>
                          @php
                          $i = 0;
                      @endphp
                      @foreach ($moneys as $money)
                            <tr>
                              <td width="1px" >{{ ++$i }}</td>
                                <td style="text-align:center">{{ $money->customer_id}}</td>
                                <td style="text-align:center">{{ $money->customer_name}}</td>
                                <td style="text-align:center">{{ $money->courier_id }}</td>
                                <td style="text-align:center">{{ $money->usd }}</td>
                                <td style="text-align:center">{{ $money->rub }}</td>
                                <td style="text-align:center">{{ $money->uzs }}</td>
                                <td style="text-align:center">{{ $money->zakg }}</td>
                                <td style="text-align:center">{{ $money->type }}</td>
                                {{-- <td style="text-align:center">{{ $money->branch}}</td> --}}
                                <td style="text-align:center">{{ $money->servicetype }}</td>
                                <td style="text-align:center">{{ $money->dategive }}</td>
                                <td style="text-align:center">{{ $money->status }}</td>
                                <td style="text-align:center">{{ $money->datereceive }}</td>
                                <td style="text-align:center" width="5px">
                                  <form action="{{route('deletemoney', $money->id)}}" method="POST", enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <a class="" href="{{ route('editmoney',$money->id) }}"><i class="fa fa-pencil"></i></a>
                                    <button class="" type="submit">
                                      <i class="fa fa-trash"></i></button>
                                  </form>
                                  </td>
                            </tr>
                            @endforeach
                        </tbody>
                     
                    </table>

                    </div>
                    
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.10.21/i18n/Russian.json"></script>


<script src="https://code.jquery.com/jquery-3.5.1.js"  ></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"  ></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"  ></script>




<script> 
$(document).ready(function() {
  
    // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder=" '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#example').DataTable( {
        pageLength: 50,
        orderCellsTop: true,
        fixedHeader: true,
        language: {
          "processing": "Подождите...",
          "search": "Поиск:",
          "lengthMenu": "Показать _MENU_ записей",
          "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
          "infoEmpty": "Записи с 0 до 0 из 0 записей",
          "infoFiltered": "(отфильтровано из _MAX_ записей)",
          "infoPostFix": "",
          "loadingRecords": "Загрузка записей...",
          "zeroRecords": "Записи отсутствуют.",
          "emptyTable": "В таблице отсутствуют данные",
          "paginate": {
            "first": "Первая",
            "previous": "Предыдущая",
            "next": "Следующая",
            "last": "Последняя"
          },
          "aria": {
            "sortAscending": ": активировать для сортировки столбца по возрастанию",
            "sortDescending": ": активировать для сортировки столбца по убыванию"
          },
          "select": {
            "rows": {
              "_": "Выбрано записей: %d",
              "0": "Кликните по записи для выбора",
              "1": "Выбрана одна запись"
            }
            }
    }
    } );



} );
  </script>