@extends('layouts/main')
@section('content')
    <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 main">
        <h1 class="page-header">Пользователи</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Имя</th>
                    <th>Почта</th>
                    <th>Дата создания / Дата редактирования</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($models as $model)
                    <tr>
                        <td>{{ $model->name }}</td>
                        <td>{{ $model->email }}</td>
                        <td>{{ $model->created_at }} / {{ $model->updated_at }}</td>
                        <td>
                            <a class="btn btn-default" href="{{ route('user.edit', ['id' => $model->id]) }}">Редактировать</a>
                            <form method="post" action="{{ route('user.destroy', ['id' => $model->id]) }}">
                                <button type="submit" class="btn btn-default">{{ Auth::id() === $model->id ? 'Не надо себя удалять! ))' : 'Удалить'}}</button>
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('user.create') }}" class="btn btn-default">Создать пользователя</a>
        </div>
    </div>
@endsection