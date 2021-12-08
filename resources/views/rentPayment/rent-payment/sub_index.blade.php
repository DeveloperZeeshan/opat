@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')

    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Rent Payment</h3>
                    @can('add-'.str_slug('RentPayment'))
                        <a class="btn btn-success pull-right" href="{{ url('/rentPayment/rent-payment/create') }}"><i
                                    class="icon-plus"></i> Add Rent Payment</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Resident</th>
                                <th>Rent Date</th>
                                <th>Bed Amount</th>
                                <th>Amount Recieved</th>
                                <th>Amount Due</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($rentpayment as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->getUserDetail->name??"Not Available" }}</td>
                                    <td>{{ $item->rent_date }}</td>
                                    <td>{{ $item->bed_amount }}</td>
                                    <td>{{ $item->actual_amount }}</td>
                                   
                                    <?php 
                                        $amount_due= 0;
                                    $amount_due += $item['actual_amount']-$item['bed_amount'];
                                    ?>
                                    <td>{{ $amount_due }}</td>
                                    <td>
                                        @can('view-'.str_slug('RentPayment'))
                                            <a href="{{ url('/rentPayment/rent-payment/' . $item->id) }}"
                                               title="View RentPayment">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan
                                        @if(!(auth()->user()->hasrole('company') || auth()->user()->hasrole('manager') || auth()->user()->hasrole('finance')))
                                        @can('edit-'.str_slug('RentPayment'))
                                            <a href="{{ url('/rentPayment/rent-payment/' . $item->id . '/edit') }}"
                                               title="Edit RentPayment">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
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
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan
                                        <button class="btn btn-primary btn-sm rentpayment_edit_button" attr="{{ $item->id }}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                        </button>
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

        $(function () {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });


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
    </script>
@endpush
