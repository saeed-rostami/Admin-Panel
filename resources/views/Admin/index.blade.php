@extends('layouts.app')

@section('content')
    <h1 class="text-center">داشبورد</h1>

 <div class="d-flex justify-content-around animate__animated animate__fadeIn">
     <div class="box bg-warning">
         <a href="{{route('admin.categories')}}">مدیریت دسته بندی</a>
     </div>

     <div class="box bg-success">
         <a href="{{route('admin.articles')}}">مدیریت مقالات</a>

     </div>

     <div class="box bg-info">
         <a href="{{route('admin.admins')}}">مدیریت مدیران</a>
     </div>
 </div>
@endsection

<style>
    .box{
        height: 200px;
        width: 500px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .box a {
        font-size: x-large;
        color: black;
    }
</style>
