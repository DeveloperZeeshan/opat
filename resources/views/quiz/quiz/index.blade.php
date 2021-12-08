@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
@if(auth()->user()->HasRole('admin') || auth()->user()->HasRole('user') || auth()->user()->HasRole('career'))
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Quiz</h3>
                    @can('add-'.str_slug('Quiz'))
                        <a class="btn btn-success pull-right" href="{{ url('/quiz/quiz/create') }}"><i
                                    class="icon-plus"></i> Add Quiz</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th><th>Answer</th>
                                <!-- <th>Description</th> -->
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quiz as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->question }}</td>
                                    <td>{{ $item->smallCorrectAnswer }}</td>
                                    <!-- <td>{{ $item->description }}</td> -->
                                    <td>
                                        @if(auth()->user()->hasrole('consumer'))
                                        @can('view-'.str_slug('Quiz'))
                                            <a href="{{ url('/quiz/quiz/' . $item->id) }}"
                                               title="View Quiz">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> Start Quiz
                                                </button>
                                            </a>
                                        @endcan
                                        @endif

                                        @can('edit-'.str_slug('Quiz'))
                                            <a href="{{ url('/quiz/quiz/' . $item->id . '/edit') }}"
                                               title="Edit Quiz">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('Quiz'))
                                            <form method="POST"
                                                  action="{{ url('/quiz/quiz' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Quiz"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $quiz->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if(auth()->user()->HasRole('consumer'))
<div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Quiz</h3>
                    @can('add-'.str_slug('Quiz'))
                        <a class="btn btn-success pull-right" href="{{ url('/quiz/quiz/create') }}"><i
                                    class="icon-plus"></i> Add Quiz</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <tbody>
                            @foreach($quiz as $item)
                                        @can('view-'.str_slug('Quiz'))
                                            <a href="{{ url('/quiz/quiz/' . $item->id) }}"
                                               title="View Quiz">
                                                <button class="btn btn-info btn-sm" style="margin: 0 0 0 441px;">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> Start Quiz
                                                </button>
                                            </a>
                                        @endcan
                                @break
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $quiz->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
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
    </script>
@include('includes.common_search_datatable')
@endpush
