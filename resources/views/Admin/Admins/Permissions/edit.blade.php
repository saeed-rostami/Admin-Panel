@extends('layouts.app')

@section('content')
    <h1>ویرایش سطح دسترسی</h1>
    <form action="{{route('admin.permission.update' , $permission->id)}}" method="POST">
        @method('put')
        @csrf
        <label>
            <input type="text" name="name" value="{{$permission->name}}">
        </label>
        <button class="btn btn-success"> تغییر</button>
    </form>
@endsection
