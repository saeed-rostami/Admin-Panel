@extends('layouts.app')

@section('content')
    <div>
        <h1>ایجادنقش جدید</h1>
        <form action="{{route('admin.role.store')}}" method="POST">
            @csrf
            <label>
                <input type="text" name="role">
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
                <th scope="col">سطوح دسترسی</th>
                <th scope="col">عملیات حذف</th>
                <th scope="col">عملیات ویرایش</th>
            </tr>
            </thead>
            <tbody>

            @foreach($roles as $role)
                <tr>
                    <th scope="row">{{$role->id}}</th>
                    <td>
                        <a href="{{route('admin.role.show' , $role->id)}}">
                            {{$role->name}}
                        </a>
                    </td>

                    <td>
                        @if(count($role->permissions))

                        @foreach($role->permissions as $permission)
                            <span class="badge badge-light">
                            {{$permission->name}}
                        </span>
                        @endforeach

                            @else
                            <span class="badge badge-danger">بدون سطوح دسترسی</span>
                            @endif
                    </td>

                    <td>
                        <form action="{{route('admin.role.delete' , $role->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn
                btn-outline-danger">حذف
                            </button>
                        </form>
                    </td>

                    <td>
                        <a href="{{route('admin.roles.edit' , $role->id)}}"
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
