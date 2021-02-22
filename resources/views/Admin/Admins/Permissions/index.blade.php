@extends('layouts.app')

@section('content')
    <div>
        <h1>ایجاد سطح دسترسی جدید</h1>
        <form action="{{route('admin.permission.store')}}" method="POST">
            @csrf
            <label>
                <input type="text" name="permission">
            </label>
            <button class="btn btn-success"> ایجاد</button>
        </form>
    </div>

    <div>
        <table class="table table-hover table-striped table-dark">
            <thead>
            <tr class="text-warning">
                <th scope="col">#</th>
                <th scope="col">نقش</th>
                <th scope="col">عملیات حذف</th>
                <th scope="col">عملیات ویرایش</th>
            </tr>
            </thead>
            <tbody>

            @foreach($permissions as $permission)
                <tr>
                    <th scope="row">{{$permission->id}}</th>
                    <td>
                        {{$permission->name}}
                    </td>

                    <td>
                        <form action="{{route('admin.permission.delete' , $permission->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn
                btn-outline-danger">حذف
                            </button>
                        </form>
                    </td>

                    <td>
                        <a href="{{route('admin.permission.edit' , $permission->id)}}"
                           class="btn
                btn-outline-info mb-2"
                        >ویرایش</a>
                    </td>

                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
@endsection
