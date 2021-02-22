@extends('layouts.app')

@section('content')
    <h1 class="text-center">داشبورد</h1>
    <nav>
        <ul>
            <li>
                <a class="btn-outline-success" href="{{route('admin.categories')}}">مدیریت دسته بندی</a>
            </li>
            <li>
                <a class="btn-outline-success" href="{{route('admin.articles')}}">مدیریت مقالات</a>
            </li>
            <li>
                <a class="btn-outline-success" href="{{route('admin.admins')}}">مدیریت مدیران</a>
                <span class="badge badge-danger">
                     این بخش فقط برای مدیران ارشد قابل دسترس میباشد
                </span>
            </li>
        </ul>
    </nav>
@endsection
