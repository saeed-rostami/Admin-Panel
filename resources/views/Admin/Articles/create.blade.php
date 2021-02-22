@extends('layouts.app')

@section('content')
    <h1>ایجاد مقاله جدید</h1>

    <div>
        <form action="{{route('admin.article.store')}}" method="POST"
              enctype="multipart/form-data"
        >
            @csrf
            <div class="form-group">
                <input type="text" name="title" placeholder="تیتر مقاله" class="form-control">
            </div>

            <div class="form-group">
                <textarea type="text" name="brief" placeholder="خلاصه مقاله"
                          class="form-control input-group"></textarea>
            </div>

            <div class="form-group">
                <textarea type="text" name="body" placeholder="متن مقاله" class="form-control"></textarea>
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


            <button class="btn btn-success"> ایجاد</button>
        </form>

    </div>
@endsection

