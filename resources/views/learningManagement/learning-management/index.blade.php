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
                    <h3 class="box-title pull-left">Blogs</h3>
                    @can('add-'.str_slug('LearningManagement'))
                        <a class="btn btn-success pull-right" href="{{ url('/learningManagement/learning-management/create') }}"><i
                                    class="icon-plus"></i> Add Blog</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Lecture</th>
                                <!-- <th>Upload File</th> -->
                                <th>Video</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($learningmanagement as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->lecture }}</td>
                                    <!-- <td>{{ $item->upload_file }}</td> -->
                                    <td><video width="220" height="100" controls>
                              <source src="{{asset('website/'.$item->upload_video)}}" type="video/mp4" >
                            </video></td>
                                    <td>
                                        @can('view-'.str_slug('LearningManagement'))
                                            <a href="{{ url('/learningManagement/learning-management/' . $item->id) }}"
                                               title="View LearningManagement">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('LearningManagement'))
                                            <a href="{{ url('/learningManagement/learning-management/' . $item->id . '/edit') }}"
                                               title="Edit LearningManagement">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('LearningManagement'))
                                            <form method="POST"
                                                  action="{{ url('/learningManagement/learning-management' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete LearningManagement"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan
                                        {{--@if(auth()->user()->hasrole('user'))--}}
                                            {{--<a title="Create Quiz" style="cursor: pointer;" class="create_lms_id" attr="{{ $item->id }}">  --}}
                                                {{--<button class="btn btn-primary btn-sm">--}}
                                                    {{--<i class="fa fa-eye" aria-hidden="true"></i> Create Quiz--}}
                                                {{--</button>--}}
                                            {{--</a>--}}
                                        {{--@endif--}}
                                      


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $learningmanagement->appends(['search' => Request::get('search')])->render() !!} </div>
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
        $(document).on('click','.create_lms_id',function(e){
            var quiz_id = $(this).attr('attr');
            $.ajax({
                url: "{{route('create_lms_id_session')}}/"+quiz_id,
                type:'get',
                success: function(response) {
                    location.href = "{{ url('quiz/quiz/create') }}";
                }
            });
        });
    </script>
@include('includes.common_search_datatable')
@endpush
