@extends('layouts.admin.main')

@section('content')
    <h1>Редактирование новости</h1>
    <form method="post" action="{{route('admin::news::update', ['model' => $model])}}">
       @include('admin.news._form-fields')
    </form>
@endsection
