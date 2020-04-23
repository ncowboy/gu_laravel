@extends('layouts.admin.main')

@section('content')
    <h1>Добавление RSS канала</h1>

    <form method="post" action="{{route('admin::rssFeeds::create')}}">
        @include('admin.rss-feeds._form-fields')
    </form>
@endsection
