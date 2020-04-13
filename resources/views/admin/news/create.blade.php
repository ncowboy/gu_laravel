@extends('layouts.admin.main')

@section('content')
    <h1>Добавление новости</h1>

    <form method="post" action="{{route('admin::news::create')}}">
        @include('admin.news._form-fields')
    </form>
@endsection
