@extends('layouts.app')

@section('content')
    <h1>{{$user->name}}</h1>
    <form action="{{route('admin.roleUser.store' , $user->id)}}" method="POST">
        @csrf
        @foreach($roles as $role)
            <input type="radio" id="{{$role->id}}" name="role" value="{{$role->id}}">
            <label for="vehicle1">{{$role->name}}</label><br>
        @endforeach
        <button type="submit" class="btn btn-success">اعمال</button>
    </form>

    <form action="{{route('admin.roleUser.remove' , $user->id)}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">عذل نقش</button>
    </form>
@endsection
