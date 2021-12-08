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
                    <h3 class="box-title pull-left">Feedback</h3>
                    @can('add-'.str_slug('Feedback'))
                        <a class="btn btn-success pull-right" href="{{ url('/feedback/feedback/create') }}"><i
                                    class="icon-plus"></i> Add Feedback</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Company</th><th>Message</th><th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedback as $item)
                                @if(Auth::user()->name !="User" )
                                    @if(Auth::id() != $item->company_id) @continue  @endif
                                @endif
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->getUserDetail->name??"Not Available" }}</td>
                                    <td>{{ $item->message }}</td>
                                    <td>{!! $item->status_detail !!}</td>
                                    <td>
                                        @can('view-'.str_slug('Feedback'))
                                            <a href="{{ url('/feedback/feedback/' . $item->id) }}"
                                               title="View Feedback">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                            <a type="button" class="feedback_reply_button" data-toggle="modal" title="Feedback Reply" attr="{{$item->id}}">
                                                <button class="btn btn-success btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Reply
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('Feedback'))
                                            <a href="{{ url('/feedback/feedback/' . $item->id . '/edit') }}"
                                               title="Edit Feedback">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('Feedback'))
                                            <form method="POST"
                                                  action="{{ url('/feedback/feedback' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Feedback"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $feedback->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="feedback_reply_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Feedback Reply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post"  action="{{route('feedback_reply')}}">
                    @csrf
                <div class="modal-body">
                    <input type="hidden" id="feedback_id" name="feedback_id" value="">
                    <textarea class="form-control" rows="4" name="feedback_reply_message" id="feedback_reply_message"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
                </form>
            </div>
        </div>
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
        $(".feedback_reply_button").click(function(e){
            e.preventDefault();
            var id = $(this).attr('attr');
            $('#feedback_id').val(id);
            $('#feedback_reply_modal').modal('show');
        });

    </script>
@include('includes.common_search_datatable')
@endpush
