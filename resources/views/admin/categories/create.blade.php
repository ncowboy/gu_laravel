@extends('layouts.admin.main')

@section('content')
    <h1>Добавление категории</h1>

    <form method="post" action="{{route('admin::categories::create')}}">
        @include('admin.categories._form-fields')
    </form>
@endsection
