@extends('layouts.admin.main')

@section('content')
    <h1>RSS каналы</h1>
    <div class="mb-3">
        <a class="btn btn-success" href="{{ route('admin::rssFeeds::create') }}">Добавить RSS канал</a>
    </div>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>URL</th>
            <th>Категория</th>
            <th>Последнее обновление</th>
            <th>Создан</th>
            <th>Изменён</th>
            <th>Действия</th>
        </tr>
        @foreach($models as $model)
            <tr>
                <td>{{$model->id}}</td>
                <td>{{$model->url}}</td>
                <td>{{$model->category()->name}}</td>
                <td>{{$model->feed_updated}}</td>
                <td>{{$model->created_at}}</td>
                <td>{{$model->updated_at}}</td>
                <td>
                    <div class="input-group input-group-sm">
                        <a class="btn btn-primary btn-sm input-group-prepend"
                           href="{{ route('admin::rssFeeds::update', ['id'=> $model->id]) }}">Редактировать</a>
                        <form class="input-group-append" action="{{ route('admin::rssFeeds::delete', ['id'=> $model->id]) }}" method="post">
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
