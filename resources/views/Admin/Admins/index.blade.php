@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-2">
        <strong>
            <a class="btn btn-outline-success" href="{{route('admin.roles.index')}}">
                ورود به بخش نقش ها
            </a>
        </strong>

        <strong>
            <a class="btn btn-outline-danger" href="{{route('admin.permissions.index')}}">
                ورود به بخش سطوح دسترسی
            </a>
        </strong>

        <div>
            <form action="{{route('admin.admins')}}" method="GET">
                @csrf
                <strong>
                    مدیران بر اساس
                </strong>
                <label>
                    <select name="role">
                        <option value="All">
                            همه
                        </option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">
                                {{$role->name}}
                            </option>
                        @endforeach
                    </select>
                </label>
                <button type="submit" class="btn btn-outline-success">نمایش</button>
            </form>
        </div>
    </div>

    <div>

        <table class="table table-hover table-striped table-dark">
            <thead>
            <tr class="text-warning">
                <th scope="col">#</th>
                <th scope="col">نام کاربری</th>
                <th scope="col">ایمیل</th>
                <th scope="col">نقش</th>
                <th scope="col">عملیات حذف</th>
                <th scope="col">عملیات ویرایش</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>
                        <a href="{{route('admin.show' , $user->id)}}">
                            {{$user->name}}
                        </a>
                    </td>

                    <td>{{$user->email}}</td>

                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge badge-light">
                                    {{$role->name}}
                                </span>
                        @endforeach
                    </td>

                    <td>
                        <form action="#" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn
                btn-outline-danger">حذف
                            </button>
                        </form>
                    </td>

                    <td>
                        <a href="#"
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

