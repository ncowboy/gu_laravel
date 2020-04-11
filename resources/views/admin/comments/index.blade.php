@extends('layouts.admin.main')

@section('content')
    <h1>Комментарии</h1>
    <div class="mb-3">
        <a class="btn btn-success" href="{{ route('admin::comments::create') }}">Добавить комментарий</a>
    </div>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Автор</th>
            <th>Новость</th>
            <th>Комментарий</th>
            <th>Создан</th>
            <th>Изменён</th>
            <th>Действия</th>
        </tr>
        @foreach($models as $model)
            <tr>
                <td>{{$model->id}}</td>
                <td>{{$model->author()->name}}</td>
                <td>{{$model->article()->title}}</td>
                <td>{{$model->comment}}</td>
                <td>{{$model->created_at}}</td>
                <td>{{$model->updated_at}}</td>
                <td>
                    <div class="input-group input-group-sm">
                        <a class="btn btn-primary btn-sm input-group-prepend"
                           href="{{ route('admin::comments::update', ['id'=> $model->id]) }}">Редактировать</a>
                        <form class="input-group-append" action="{{ route('admin::comments::delete', ['id'=> $model->id]) }}" method="post">
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
