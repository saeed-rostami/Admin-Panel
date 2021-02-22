@extends('layouts.app')

@section('content')
 <div>
     <h1>ایجاد دسته بندی جدید</h1>
     <form action="{{route('admin.category.store')}}" method="POST">
         @csrf
         <label>
             <input type="text" name="title">
         </label>
         <button class="btn btn-success"> ایجاد</button>
     </form>
 </div>

    <div>

        <table class="table table-hover table-striped table-dark">
            <thead>
            <tr class="text-warning">
                <th scope="col">#</th>
                <th scope="col">تیتر دسته بندی</th>
                <th scope="col">نویسنده</th>
                <th scope="col">عملیات حذف</th>
                <th scope="col">عملیات ویرایش</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>
                        {{$category->title}}
                    </td>

                    <td>{{$category->user->name}}</td>



                    @role('admin')
                    <td>
                        <form action="{{route('admin.category.delete' , $category->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn
                btn-outline-danger">حذف
                            </button>
                        </form>
                    </td>
                    @else
                        <td>
                            برای این بخش دسترسی ندارید
                        </td>
                        @endrole


                    <td>
                        <a href="{{route('admin.category.edit' , $category->id)}}"
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
