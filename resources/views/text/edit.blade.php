@extends('layouts.app')

@section('content')
    <div class="m-auto col-6">
        <div class="card">
            <form action="{{ route('text.update', $text) }}" method="post">
                <div class="card-header">
                    Update text
                </div>
                <div class="card-body">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <label>Текст</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                  name="text">{{ $text->content }}</textarea><br>

                        @if($errors->isNotEmpty('bags'))
                            <strong>{{ $errors->first() }}</strong>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-success">
                    <a href="{{ route('welcome') }}" class="btn btn-primary">Назад</a>
                </div>
            </form>
        </div>

    </div>
@endsection