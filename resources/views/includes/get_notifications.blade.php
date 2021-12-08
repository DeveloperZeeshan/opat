    <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown"
       href="javascript:void(0);">
        {{--<i class="icon-speech"></i>--}}
        <i class="fa fa-bell-slash"></i>
        <span class="badge badge-xs badge-danger">{{$allNotifications->count()}}</span>
    </a>
    <ul class="dropdown-menu mailbox animated bounceInDown">
        <li>
            <div class="drop-title">You have {{$allNotifications->count()}} new messages</div>
        </li>
        <li>
            <div class="message-center">
                @foreach($allNotifications->take(3) as $allNotification)
                    <a href="{{route('yacht-availablity',$allNotification->id)}}">
                        <div class="user-img">
                            <span class="profile-status online pull-right"></span>
                        </div>
                        <div class="mail-contnet">
                            <h5>{{$allNotification->title??''}}</h5>
                            <span class="mail-desc">{{$allNotification->subject}}</span>
                            <span class="time">{{$allNotification->date}}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </li>
        <li>
            <a href="{{route('yacht-availablity','all')}}">
                <strong>See all notifications</strong>
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
