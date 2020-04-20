@extends('layouts.admin.main')

@section('content')
    <h1>Редактирование пользователя</h1>
    <form method="post" action="{{route('admin::users::update', ['model' => $model])}}">
        @csrf

        <div class="form-group">
            <label>Имя</label>
            <input type="text" name="name" class="form-control"
                   placeholder="Имя" value="{{$model->name}}">
        </div>
        @if($errors->has('name'))
            <div class="alert alert-danger">
                @foreach($errors->get('name') as $error)
                    <p style="margin-bottom: 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   placeholder="Имя" value="{{$model->email}}">
        </div>
        @if($errors->has('email'))
            <div class="alert alert-danger">
                @foreach($errors->get('email') as $error)
                    <p style="margin-bottom: 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="form-group">
            <label>Новый пароль</label>
            <input type="password" name="newPassword" class="form-control"
                   placeholder="Новый пароль">
        </div>
        @if($errors->has('password'))
            <div class="alert alert-danger">
                @foreach($errors->get('password') as $error)
                    <p style="margin-bottom: 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="form-group">
            <label for="exampleFormControlSelect222">Администратор?</label>
            <select name="is_admin" class="form-control" id="exampleFormControlSelect3">
                <option value="1" @if ($model->is_admin == 1) selected @endif>Да</option>
                <option value="0" @if ($model->is_admin == 0) selected @endif>Нет</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
