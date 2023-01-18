@extends('master')
@section("content")
<div class="custom-product">

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
      <div class="carousel-indicators">
        @foreach($newslists as $newslist)
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$newslist->id - 1}}" aria-label="Slide {{$newslist->id}}" class="{{$newslist->id==1?'active':''}}" aria-current="{{$newslist->id==1?'true':''}}"></button>
        @endforeach
      </div>@extends('master')
@section("content")
<div class="custom-product">

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
      <div class="carousel-indicators">
        @foreach($newslists as $newslist)
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$newslist->id - 1}}" aria-label="Slide {{$newslist->id}}" class="{{$newslist->id==1?'active':''}}" aria-current="{{$newslist->id==1?'true':''}}"></button>
        @endforeach
      </div>
      <div class="carousel-inner">
        @foreach($newslists as $newslist)
        <div class="carousel-item {{$newslist->id==1?'active':''}}">
          <a href="detail/{{$newslist->id}}">
            <img class="slider-img" src="{{$newslist->url_to_image}}" class="d-block w-100" alt="{{$newslist->title}}">
            <div class="carousel-caption d-none d-md-block slider-text">
              <h5>{{$newslist->title}}</h5>
              <p>{{$newslist->description}}</p>
            </div>
          </a> 
        </div>     
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="tranding-wrapper">
      <h3> Top business headlines in the US right now </h3>
      @foreach($newslists as $newslist)
          <div class="tranding-item">
            <a href="detail/{{$newslist->id}}">
              <img class="tranding-image" src="{{$newslist->url_to_image}}" class="d-block w-100" alt="{{$newslist->title}}">
            </a>    
              <div class="">
                <h5>{{$newslist->title}}</h5>
              </div>
             
          </div>   
      
        @endforeach
    </div>
</div>
