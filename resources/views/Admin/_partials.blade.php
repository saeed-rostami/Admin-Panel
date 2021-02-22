@if($errors->any())
    <div class="alert alert-warning text-danger rounded">
        <h4>خطا</h4>
        @foreach($errors->all() as $error)
            <h5>{{$error}}</h5>
        @endforeach
    </div>
@endif
