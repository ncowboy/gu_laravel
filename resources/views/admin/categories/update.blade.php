@extends('layouts.admin.main')

@section('content')
    <h1>Редактирование категории</h1>
    <form method="post" action="{{route('admin::categories::update', ['model' => $model])}}">
       @include('admin.categories._form-fields')
    </form>
@endsection
