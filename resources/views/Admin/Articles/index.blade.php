@extends('layouts.app')

@section('content')
    <div class="mb-1 d-flex justify-content-around">
        <a class="btn btn-outline-success" href="{{route('admin.article.create')}}">ایجاد مقاله جدید</a>
        <div>
            <form action="{{route('admin.articles')}}" method="GET">
                @csrf
               <strong>
                   مقالات بر اساس
               </strong>
                <label>
                    <select name="status">
                        <option value="{{'All'}}">
                            همه
                        </option>
                        <option value="{{'Draft'}}">
                            پیش نویس
                        </option>

                        <option value="{{'Published'}}">
                            منتشر شده
                        </option>
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
                <th scope="col">تیتر دسته بندی</th>
                <th scope="col">وضعیت</th>
                <th scope="col">نویسنده</th>
                <th scope="col">دسته بندی</th>
                <th scope="col">تاریخ انتشار</th>
                <th scope="col">عملیات حذف</th>
                <th scope="col">عملیات ویرایش</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <th scope="row">{{$article->id}}</th>
                    <td>
                        <a href="{{route('admin.article.show' , $article->id)}}">
                            {{$article->title}}
                        </a>
                    </td>

                    <td>{{$article->status}}</td>

                    <td>{{$article->user->name}}</td>

                    <td>{{$article->category->title}}</td>

                    <td>{{$article->published_at}}</td>

                    @role('admin')
                    <td>
                        <form action="{{route('admin.article.delete' , $article->id)}}" method="POST">
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
                        <a href="{{route('admin.article.edit' , $article->id)}}"
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

{{--@foreach($articles as $article)--}}
{{--{{dump($article)}}--}}
{{--@endforeach--}}
