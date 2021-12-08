<section class="counter-section pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 counter-h2">
                <h1>LET’S YOU CHOOSE WHO PROVIDES YOUR CARE</h1>
            </div>
            @foreach($providescare as $item)
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="img-fluid">
                        <img src="{{asset('website')}}/{{$item->image}}" alt="">
                        <h2 class="pt-3">{{$item->number??''}}</h2>
                        <h6>{!!$item->description??''!!}</h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
</section>