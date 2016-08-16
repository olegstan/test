@extends('layouts/main')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Создание пользователя</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" method="post" action="{{ route('user.store') }}" >
                            <div class="form-group">
                                <label class="col-md-4 control-label">Имя</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Адрес почты</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Пароль</label>
                                <div class="col-md-6">
                                    <input class="form-control" name="password" value="{{ old('password') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection