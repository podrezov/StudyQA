@extends('layouts.app')

@section('content')
    <div class="m-auto col-6">
        <div class="card">
            <form action="{{ route('news.store') }}" method="post">
                <div class="card-header">
                    Create news
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <label>Заголовок</label>
                        <input type="text" name="title" class="form-control"><br>

                        <label>Краткое описание</label>
                        <input type="text" name="short_content" class="form-control"><br>

                        <label>Текст</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  name="content"></textarea><br>

                        @if($errors->isNotEmpty('bags'))
                            <strong>{{ $errors->first() }}</strong>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-success">
                    <a href="{{ route('news') }}" class="btn btn-primary">Назад</a>
                </div>
            </form>
        </div>

    </div>
@endsection