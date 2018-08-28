@extends('layouts.app')

@section('content')
    <div class="col-md-7 m-auto">
        <div class="card text-center">
            <div class="card-header">
                {{ $news->title }}

                <div class="dropdown float-right">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Действие
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="{{ route('news.update.show', $news->id) }}" class="dropdown-item">Редактировать</a>
                        <a href="{{ route('news.delete', $news->id) }}" class="dropdown-item">Удалить</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h3 class="card-title">{{ $news->content }}</h3>
            </div>

        </div>
        <a href="{{ route('news') }}" class="btn btn-primary">Назад</a>
    </div>
@endsection