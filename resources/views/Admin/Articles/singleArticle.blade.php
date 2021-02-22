@extends('layouts.app')

@section('content')
    {{$article->title}}
    {{$article->brief}}
    {{$article->body}}
    <img src="{{asset('images/' . $article->image)}}" alt="">
@endsection
