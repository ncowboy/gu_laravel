@extends('layouts.admin.main')

@section('content')
    <h1>Пользователи</h1>
    <div class="mb-3">
        <a class="btn btn-success" href="{{ route('admin::users::create') }}">Добавить пользователя</a>
    </div>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>ФИО</th>
            <th>email</th>
            <th>Администратор?</th>
            <th>Создан</th>
            <th>Изменён</th>
            <th>Действия</th>
        </tr>
        @foreach($models as $model)
            <tr>
                <td>{{$model->id}}</td>
                <td>{{$model->name}}</td>
                <td>{{$model->email}}</td>
                <td>@if($model->is_admin)Да @else Нет @endif</td>
                <td>{{$model->created_at}}</td>
                <td>{{$model->updated_at}}</td>
                <td>
                    <div class="input-group input-group-sm">
                        <a class="btn btn-primary btn-sm input-group-prepend"
                           href="{{ route('admin::users::update', ['id'=> $model->id]) }}">Редактировать</a>
                        <form class="input-group-append"
                              action="{{ route('admin::users::delete', ['id'=> $model->id]) }}" method="post">
                            @csrf
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Вы уверены?')">Удалить</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        {{$models->links()}}
    </table>
    {{$models->links()}}
@endsection
