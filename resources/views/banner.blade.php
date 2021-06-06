@section('banner')
<div class="main-banner owl-carousel">
    @foreach($slider as $key => $sli)
    <div class="item"><a href="#"><img src={{URL::to('public/uploads/slider/'.$sli->slider_image)}}  alt="{{$sli->name}}" class="img-responsive" height="120" width="500" /></a></div>
    @endforeach
</div>

@endsection
