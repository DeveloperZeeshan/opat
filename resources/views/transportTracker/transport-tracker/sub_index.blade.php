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
                    <h3 class="box-title pull-left">Transport Tracker</h3>
                    {{--@if(!auth()->user()->hasrole('manager'))--}}
                    {{--@can('add-'.str_slug('TransportTracker'))--}}
                        {{--<a class="btn btn-success pull-right" href="{{ url('/transportTracker/transport-tracker/create') }}"><i class="icon-plus"></i> Add Transport Tracker</a>--}}
                    {{--@endcan--}}
                    {{--@endif--}}
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Resident</th>
                                <th>Pickup</th>
                                <th>Drop Off</th>
                                <th>Date</th>
                                <th>Notes</th>
                                <th>Miles</th>
                                <th>Rate($/mile)</th>
                                <th>Purpose</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transporttracker as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->consumer_name }}</td>
                                    <td>{{ $item->pickup }}</td>
                                    <td>{{ $item->drop_off }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{$item->notes}}</td>
                                    <td>{{ $item->milleage }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td><a class="btn btn-info"><i class="fa fa-briefcase"></i> {{ $item->purpose }}</a></td>
                                    <td>
                                        @can('view-'.str_slug('TransportTracker'))
                                            <a href="{{ url('/transportTracker/transport-tracker/' . $item->id) }}"
                                               title="View TransportTracker">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('TransportTracker'))
                                            <a href="{{ url('/transportTracker/transport-tracker/' . $item->id . '/edit') }}"
                                               title="Edit TransportTracker">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('TransportTracker'))
                                            <form method="POST"
                                                  action="{{ url('/transportTracker/transport-tracker' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete TransportTracker"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $transporttracker->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
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


        //Print, CSV, PDF
        $(document).ready(function() {
            $('#myTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'PRINT',
                        exportOptions: {
                            columns: 'th:not(:last-child) '
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                    {
                        extend: 'copy',
                        text: 'COPY',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'EXCEL',
                        exportOptions: {
                            columns: 'th:not(:last-child)'
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        exportOptions: {
                            columns: 'th:not(:last-child)'

                        }
                    },
                ]

            });
        });
    </script>

@endpush

