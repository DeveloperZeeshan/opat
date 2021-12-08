@extends('layouts.master')

@push('css')
<link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
      type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row colorbox-group-widget">
            <div class="col-md-4 col-sm-4 info-color-box">
                <div class="white-box">
                    <div class="media bg-primary">
                        <div class="media-body">
                            <h3 class="info-count">${{$rentAmount??'0'}}<span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                            <p class="info-text font-12">Total Monthly Rent Amount</p>
                            {{--<p class="info-ot font-15">Total<span class="label label-rounded">20</span></p>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 info-color-box">
                <div class="white-box">
                    <div class="media bg-success">
                        <div class="media-body">
                            <h3 class="info-count">${{$RecievedAmount??'0'}}<span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                            <p class="info-text font-12">Total Amount Recieved</p>
                            {{--<p class="info-ot font-15">Total Pending<span class="label label-rounded">2</span></p>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 info-color-box">
                <div class="white-box">
                    <div class="media bg-danger">
                        <div class="media-body">
                            <h3 class="info-count">${{$dueAmount??'0'}}<span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                            <p class="info-text font-12">Total Amount Due</p>
                            {{--<p class="info-ot font-15">Total<span class="label label-rounded">2316</span></p>--}}
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-md-3 col-sm-6 info-color-box">--}}
            {{--<div class="white-box">--}}
            {{--<div class="media bg-warning">--}}
            {{--<div class="media-body">--}}
            {{--<h3 class="info-count">$356 <span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>--}}
            {{--<p class="info-text font-12">Total Amount Earn</p>--}}
            {{--<p class="info-ot font-15">Pending<span class="label label-rounded">$82</span></p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Income Tracker</h3>
                    @can('add-'.str_slug('RentPayment'))
                    <a class="btn btn-success pull-right" href="{{ url('/rentPayment/rent-payment/create') }}"><i
                                class="icon-plus"></i> Add Income Tracker</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Resident</th>
                                <th>Payment Date</th>
                                <th>Monthly Rent Amount $</th>
                                <th>Amount Recieved</th>
                                <th>Amount Due</th>
                                <th>Rent Source</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($rentpayment as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id}}</td>
                                    <td><input class="form-control" name="" id="rent_name" type="text" value="{{ $item->getUserDetail->name??"Not Available" }}" readonly></td>
                                    {{--onclick="acceptstatus({{ $item->getUserDetail->id}},'{{ $item->getUserDetail->name}}')"  onkeyup="acceptstatus({{ $item->getUserDetail->name??''}},'{{ $item->getUserDetail->id}}')"--}}
                                    <td><input class="form-control" name="" id="rent_date" type="date" value="{{ $item->rent_date }}" onchange="acceptstatus('{{$item->id}}','rent_date')"></td>
                                    <td><input class="form-control" name="" id="bed_amount" type="text" value="{{ $item->bed_amount }}" onchange="acceptstatus('{{$item->id}}','bed_amount')"></td>
                                    <td><input class="form-control" name="" id="recieved_amount" type="text" value="{{ $item->recieved_amount }}" onchange="acceptstatus('{{$item->id}}','recieved_amount')"></td>

                                    <?php
                                    $amount_due= 0;
                                    $amount_due += $item['bed_amount']-$item['recieved_amount'];
                                    ?>
                                    <td><input class="form-control" name="" id="due_amount" type="text" value="{{ $amount_due }}" onchange="acceptstatus('{{$item->id}}','due_amount')"></td>
                                    <td><input class="form-control" name="" id="" type="text" value="{{$item->getUserDetail->profile->rent_source_id}}" readonly></td>
                                    <td>

                                        <!-- <a href="{{ route('sub_index_rent_payment') }}"
                                               title="View RentPayment">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View Detail
                                                </button>
                                            </a> -->
                                        {{--<button class="btn btn-primary btn-sm rentpayment_edit_button" attr="{{ $item->id }}">--}}
                                        {{--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--}}
                                        {{--</button>--}}
                                        @can('view-'.str_slug('RentPayment'))
                                        <a href="{{ url('/rentPayment/rent-payment/' . $item->id) }}"
                                           title="View RentPayment">
                                            <button class="btn btn-info btn-sm">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        @endcan
                                        @if(!(auth()->user()->hasrole('company') || auth()->user()->hasrole('manager') || auth()->user()->hasrole('finance')))
                                            @can('edit-'.str_slug('RentPayment'))
                                            <a href="{{ url('/rentPayment/rent-payment/' . $item->id . '/edit') }}"
                                               title="Edit RentPayment">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            @endcan
                                        @endif
                                        @can('delete-'.str_slug('RentPayment'))
                                        <form method="POST"
                                              action="{{ url('/rentPayment/rent-payment' . '/' . $item->id) }}"
                                              accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Delete RentPayment"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                        @endcan
                                        {{--<button class="btn btn-primary btn-sm rentpayment_edit_button" attr="{{ $item->id }}">--}}
                                        {{--<i class="fa fa-pencil-square-o" aria-hidden="true"></i> --}}
                                        {{--</button>--}}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $rentpayment->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="rentpayment_edit_modal">

    </div>

@endsection

@push('js')
<script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

<script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
<!-- start - This is for export functionality only -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script>
    $(document).ready(function () {

        @if(\Session::has('message'))
        $.toast({
            heading: 'Success!',
            position: 'top-center',
            text: '{{session()->get('message')}}',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 3000,
            stack: 6
        });
        @endif
    })
    //
    //        $(function () {
    //            $('#myTable').DataTable({
    //                'aoColumnDefs': [{
    //                    'bSortable': false,
    //                    'aTargets': [-1] /* 1st one, start by the right */
    //                }]
    //            });
    //
    //        });


    $(document).on('click','.rentpayment_edit_button',function(e){
        var id = $(this).attr('attr');
        $.ajax({
            url: "{{ route('rent_payment_edit_record') }}/"+id,
            method: "GET",
            success:function(data){
                $('#rentpayment_edit_modal').show();
                $('#rentpayment_edit_modal').html(data);
            }
        });
    });
    $(document).on('click','.rentpayment_edit_close_button',function(e){
        $('#rentpayment_edit_modal').hide();
    });

    //Print, CSV, PDF
    $(document).ready(function() {
        $('#myTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    text: 'PRINT',
//                                className: 'btn btn-info btn-sm',
                    exportOptions: {
                        columns: 'th:not(:last-child) '
                    }
                },
                {
                    extend: 'csv',
                    text: 'CSV',
//                                className: 'btn btn-info btn-sm',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    extend: 'copy',
                    text: 'COPY',
//                                className: 'btn btn-info btn-sm',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    extend: 'excel',
                    text: 'EXCEL',
//                                className: 'btn btn-info btn-sm',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
//                                className: 'btn btn-info btn-sm',
                    exportOptions: {
                        columns: 'th:not(:last-child)'

                    }
                },
            ]

        });
    });

    //        $("#bed_amount").on('change input', function(){
    //            var id = $(this).attr('attr');

    //        });
    function acceptstatus(id,column) {

        if (column == 'bed_amount') {
            var value = $('#bed_amount').val();
        }
        if(column == 'rent_date'){
            var value = $('#rent_date').val();
        }
        if(column == 'recieved_amount'){
            var value = $('#recieved_amount').val();
        }
        if(column == 'due_amount'){
            var value = $('#due_amount').val();
        }


        swal({
            title: "Are you sure?",
            text: "Do you really want to change the value!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willdelete) => {
            if (willdelete) {
                console.log(id);
                console.log(value);
                console.log(column);
                $.get('{{ URL::to("rent_payment_update")}}/'+id+'/'+value+'/'+column,function(data){
                    console.log(data);
                    window.location.reload();

                });
                swal("Your user data has been updated!", {
                    icon: "success",

                });
            }else {
                swal("Your user data has not changed!");
    }
    });
    }
</script>


@include('includes.common_search_datatable')
@endpush
