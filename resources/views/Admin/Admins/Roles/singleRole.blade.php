@extends('layouts.app')

@section('content')
    <h1>{{$role->name}}</h1>
    <form action="{{route('admin.permissionsRole.store' , $role->id)}}" method="POST">
        @csrf
        @foreach($permissions as $permission)
            <input type="checkbox" id="{{$permission->id}}" name="permisssion[]" value="{{$permission->id}}">
            <label for="vehicle1">{{$permission->name}}</label><br>
        @endforeach
        <button type="submit" class="btn btn-success">اعمال</button>
    </form>
@endsection
