@extends('layouts.app')

@section('content')
    <h1>ویرایش مقاله</h1>
    <form action="{{route('admin.article.update' , $article->id)}}" method="POST"
          enctype="multipart/form-data"
    >

        @method('put')
        @csrf
        <div class="form-group">
            <input type="text" name="title" placeholder="تیتر مقاله" class="form-control" value="{{$article->title}}">
        </div>

        <div class="form-group">
                <textarea type="text" name="brief" placeholder="خلاصه مقاله"
                          class="form-control input-group">{{$article->brief}}
                </textarea>
        </div>

        <div class="form-group">
            <textarea type="text" name="body" placeholder="متن مقاله" class="form-control">{{$article->body}}
            </textarea>
        </div>


        <div class="d-flex justify-content-around">
            <div class="form-group">
                دسته بندی
                <label>
                    <select type="text" name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option
                                {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}
                                value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label>
                    تاریخ انتشار
                    <input type="date" class="form-control" name="published_at" value="{{old('published_at' ,
                    date('Y-m-d', strtotime($article->published_at)))
                    }}">
                </label>
            </div>

            <div class="form-group">
                برچسب
                <label>
                    <input type="text" class="form-control" name="tag" value="{{old('tag' ,  $article->tag)}}">
                </label>
            </div>

            <div class="form-group">
                <label>
                    نوع مقاله
                    <select type="text" class="form-control" name="status">
                        <option value="{{'Draft'}}"
                            {{ old('status', $article->status) == 'Draft' ? 'selected' : '' }}
                        >پیش نویس
                        </option>

                        <option value="{{'Published'}}"
                            {{ old('status', $article->status) == 'Published' ? 'selected' : '' }}
                        >منتشر شود
                        </option>
                    </select>
                </label>
            </div>

        </div>

        <div class="form-group">
            تصویر
            <label>
                <input type="file" class="form-control" name="image">
            </label>

            <img src="{{asset('images/' . $article->image)}}" alt="" class="w-25 h-100 rounded-circle shadow">

        </div>
        <button class="btn btn-success"> تغییر</button>
    </form>
@endsection
