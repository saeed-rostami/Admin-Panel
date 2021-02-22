@extends('layouts.app')

@section('content')
    <h1>ویرایش نقش</h1>
    <form action="{{route('admin.role.update' , $role->id)}}" method="POST">
        @method('put')
        @csrf
        <label>
            <input type="text" name="name" value="{{$role->name}}">
        </label>
        <button class="btn btn-success"> تغییر</button>
    </form>
@endsection
