@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <a href="{{ route('news.create') }}" class="btn btn-primary">Создать новость</a>
        <br><br>

        @if(session('status'))
            <div class="col-md-4 m-auto text-center">
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        @forelse($news as $entry)
            <div class="col-md-7 m-auto">
                <div class="card">
                    <div class="card-header">
                        <span>{{ $entry->title }}</span>

                        <div class="dropdown float-right">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Действие
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a href="{{ route('news.update.show', $entry->id) }}" class="dropdown-item">Редактировать</a>
                                <a href="{{ route('news.delete', $entry->id) }}" class="dropdown-item">Удалить</a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $entry->short_content }}</h5>
                        <a href="{{ route('news.show', $entry->id) }}">Подробнее...</a>
                    </div>
                    <div class="card-footer text-muted">
                        {{ $entry->created_at }}
                    </div>
                </div>
            </div>
            <br>
        @empty
            <center><h1>Нет новостей</h1></center>
        @endforelse
        <div class="col-md-1 m-auto">
            {{ $news->links() }}
        </div>
    </div>
@endsection