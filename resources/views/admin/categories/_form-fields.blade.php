@csrf
<div class="form-group">
    <label for="exampleFormControlInput1">Название</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
           placeholder="Название" value="{{$model->name}}">
</div>
@if($errors->has('name'))
    <div class="alert alert-danger">
        @foreach($errors->get('name') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="form-group">
    <label for="exampleFormControlTextarea1">Описание</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$model->description}}</textarea>
</div>
@if($errors->has('description'))
    <div class="alert alert-danger">
        @foreach($errors->get('description') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="form-group form-check">
    <label for="exampleFormControlSelect222">На главной</label>
    <select name="main" class="form-control" id="exampleFormControlSelect3">
        <option value="1" @if ($model->main == 1) selected @endif>Да</option>
        <option value="0" @if ($model->main == 0) selected @endif>Нет</option>
    </select>
</div>
@if($errors->has('active'))
    <div class="alert alert-danger">
        @foreach($errors->get('active') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="form-group form-check">
    <label for="exampleFormControlSelect222">Активность</label>
    <select name="active" class="form-control" id="exampleFormControlSelect3">
        <option value="1" @if ($model->active == 1) selected @endif>Да</option>
        <option value="0" @if ($model->active == 0) selected @endif>Нет</option>
    </select>
</div>
@if($errors->has('active'))
    <div class="alert alert-danger">
        @foreach($errors->get('active') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
        @endforeach
    </div>
@endif
<button type="submit" class="btn btn-primary">Отправить</button>
