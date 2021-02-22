@extends('layouts.app')

@section('content')
    <h1>ویرایش دسته بندی</h1>
    <form action="{{route('admin.category.update' , $category->id)}}" method="POST">
        @method('put')
        @csrf
        <label>
            <input type="text" name="title" value="{{$category->title}}">
        </label>
        <button class="btn btn-success"> تغییر</button>
    </form>
@endsection
