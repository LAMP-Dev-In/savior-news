@extends('master')
@section("content")
<div class="container">
    <div class="row">
        <a href="/">Go Back</a>

        <div class="col-sm-6">
            <img class="detail-img" src="{{$newslist->url_to_image}}" alt="">
        </div>
        <div class="col-sm-6">
            <h2>{{$newslist->title}}</h2>
            <h4>{{$newslist->description}}</h4>
            <h5>Source : {{$newslist->source}}</h5>
            <h5>Author : {{$newslist->author}} </h5>
            <h5>{{$newslist->published_at}}</h5>
            <h6>{{$newslist->time_ago}}</h6>
            <h4><a href="{{$newslist->url}}" target="_blank"> {{$newslist->url}}</a></h4>            
            <h4>{{$newslist->content}}</h4>
            <br><br>

        </div>
    </div>

</div>
@endsection