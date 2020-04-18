@extends('layouts.admin.main')

@section('content')
    <h1>Редактирование комментария</h1>

    <form method="post" action="{{route('admin::comments::update', ['model' => $model])}}">
        @include('admin.comments._form-fields')
    </form>
@endsection
