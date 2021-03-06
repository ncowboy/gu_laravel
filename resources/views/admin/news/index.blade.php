@extends('layouts.admin.main')

@section('content')
    <h1>Новости</h1>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <a class="btn btn-success" href="{{ route('admin::news::create') }}">Добавить новость</a>
                <form class="form-inline" method="post" action="{{route('admin::news::parseXml')}}">
                    @csrf
                    <div class="form-group">
                        <select name="category_id" class="form-control">
                            @foreach($categories as $key => $value)
                                <option value="{{$key}}"> {{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info ml-3">Добавить из RSS каналов</button>
                </form>
            </div>
        </div>


    </div>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Заголовок</th>
            <th>Категория</th>
            <th>Автор</th>
            <th>Активность</th>
            <th>Создан</th>
            <th>Изменён</th>
            <th>Действия</th>
        </tr>
        @foreach($models as $model)
            <tr>
                <td>{{$model->id}}</td>
                <td>{{$model->title}}</td>
                <td>{{$model->category()->name}}</td>
                <td>{{$model->user()->name}}</td>
                <td>{{$model->active}}</td>
                <td>{{$model->created_at}}</td>
                <td>{{$model->updated_at}}</td>
                <td>
                    <div class="input-group input-group-sm">
                        <a class="btn btn-primary btn-sm input-group-prepend"
                           href="{{ route('admin::news::update', ['id'=> $model->id]) }}">Редактировать</a>
                        <form class="input-group-append" action="{{ route('admin::news::delete', $model->id) }}"
                              method="post">
                            @csrf
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Вы уверены?')">
                                Удалить
                            </button>
                        </form>
                    </div>


                </td>
            </tr>
        @endforeach
        {{$models->links()}}

    </table>
    {{$models->links()}}
@endsection
