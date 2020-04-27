@csrf

<div class="form-group">
    <label for="exampleFormControlTextarea1">URL</label>
    <input type="text" name="url" class="form-control" value="{{$model->url}}">
</div>
@if($errors->has('url'))
    <div class="alert alert-danger">
        @foreach($errors->get('url') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="form-group">
    <label for="exampleFormControlSelect2">Категория</label>
    <select name="category_id" class="form-control" id="exampleFormControlSelect2">
        @foreach($categories as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
</div>
@if($errors->has('category_id'))
    <div class="alert alert-danger">
        @foreach($errors->get('category_id') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
        @endforeach
    </div>
@endif


<button type="submit" class="btn btn-primary">Отправить</button>
