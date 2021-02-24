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
    <hr>

    <div class="row bg-light">
        <div class="col-6">
            <div class="alert alert-info">لیست مقالات منتشر شده</div>
            @if(!count($publishedArticles))
              <h5 class="text-danger">  مقاله ایی یافت نشد</h5>
            @endif
            <section class="row">
                @foreach($publishedArticles as $article)
                    @include('_partials._singleArticle')
                @endforeach
            </section>
        </div>

        <div class="col-6">
            <div class="alert alert-info">لیست مقالاتی که در آینده منتشر میشوند</div>
            @if(!count($futureArticles))
                <h5 class="text-danger">  مقاله ایی یافت نشد</h5>
            @endif
            <section class="row">
                @foreach($futureArticles as $article)
                    @include('_partials._singleArticle')
                @endforeach
            </section>
        </div>
    </div>
@endsection

<style>
    .box {
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
