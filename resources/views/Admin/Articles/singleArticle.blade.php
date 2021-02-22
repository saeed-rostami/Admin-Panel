@extends('layouts.app')

@section('content')

    <div class="card" style="width: 18rem;">
        <img src="{{asset('images/' . $article->image)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$article->title}}</h5>
            <p class="card-text">{{$article->body}}</p>
          <div class="d-flex flex-column">
              نویسنده: <strong>{{$article->user->name}}</strong>
              تاریخ انتشار: <strong>{{date('d-m-Y' , strtotime($article->published_at))}}</strong>
              دسته بندی: <strong>{{$article->category->title}}</strong>
              وضعیت: <strong>{{$article->status}}</strong>
          </div>
        </div>
    </div>
@endsection
