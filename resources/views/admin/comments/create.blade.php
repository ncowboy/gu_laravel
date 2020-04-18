@extends('layouts.admin.main')

@section('content')
    <h1>Добавление комментария</h1>

    <form method="post" action="{{route('admin::comments::create')}}">
        @include('admin.comments._form-fields')
    </form>
@endsection
