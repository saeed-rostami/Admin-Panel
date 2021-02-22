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
                <label>
                    <select type="text" name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label>
                    <input type="file" class="form-control" name="image">
                </label>

            </div>

            <div class="form-group">
                <label>
                    <input type="date" class="form-control" name="published_at">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <input type="text" class="form-control" name="tag">
                </label>
            </div>

            <div class="form-group">
                <label>
                    <select type="text" class="form-control" name="status">
                        <option value="{{'Draft'}}">پیش نویس</option>
                        <option value="{{'Published'}}">منتشر شود</option>
                    </select>
                </label>
            </div>
        </div>
        <button class="btn btn-success"> تغییر</button>
    </form>
@endsection
