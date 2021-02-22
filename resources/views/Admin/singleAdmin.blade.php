@extends('layouts.app')

@section('content')
   <div class="d-flex justify-content-center">
       <h1>{{$user->name}}</h1>
       @foreach($user->roles as $role)
           <h1 class="text-danger">({{$role->name}})</h1>
       @endforeach
   </div>
    <form action="{{route('admin.roleUser.store' , $user->id)}}" method="POST">
        @csrf
        @foreach($roles as $role)
            <input type="radio" id="{{$role->id}}" name="role" value="{{$role->id}}">
            <label for="vehicle1">{{$role->name}}</label><br>
        @endforeach
        <button type="submit" class="btn btn-success">اعمال</button>
    </form>

    <form action="{{route('admin.roleUser.remove' , $user->id)}}" method="POST" class="my-1">
        @csrf
        <button type="submit" class="btn btn-danger">حذف نقش</button>
    </form>
@endsection
