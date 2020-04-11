<?php
$menu = \App\models\Categories::query()
    ->where(['active' => 1])
    ->get()
    ->mapWithKeys(function ($item) {
        return [
            $item['id'] => $item['name']
        ];
    });
?>
<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="/">Домой</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="{{ route('index') }}" id="dropdown01"
           data-toggle="dropdown"
           aria-haspopup="true"
           aria-expanded="false">Новости</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
            @foreach($menu as $key => $value)
                <a class="dropdown-item" href="{{ route('news::category', ['id' => $key]) }}">{{$value}}</a>
            @endforeach
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('news::create') }}">Предложить новость</a>
    </li>
</ul>
