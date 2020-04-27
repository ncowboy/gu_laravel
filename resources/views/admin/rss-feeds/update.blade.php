@extends('layouts.admin.main')

@section('content')
    <h1>Редактирование RSS канала</h1>

    <form method="post" action="{{route('admin::rssFeeds::update', ['model' => $model])}}">
        @include('admin.rss-feeds._form-fields')
    </form>
@endsection
