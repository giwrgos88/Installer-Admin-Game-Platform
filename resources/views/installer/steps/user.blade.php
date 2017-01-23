@extends('installer::installer.master')
@section('title'){{{trans('installer::installer.title.user')}}}@stop
@section('body')
<div class="container d-table">
    <div class="d-100vh-va-middle">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active">{{{trans('installer::installer.title.welcome')}}}</li>
                    <li class="active">{{{trans('installer::installer.title.requirements')}}}</li>
                    <li class="active">{{{trans('installer::installer.title.permissions')}}}</li>
                    <li class="active">{{{trans('installer::installer.title.setup')}}}</li>
                    <li class="active">{{{trans('installer::installer.title.user')}}}</li>
                    <li>{{{trans('installer::installer.title.final')}}}</li>
                </ul>
                <!-- fieldsets -->
                <div class="card-group">
                    <div class="card p-2">
                        <div class="card-block">
                            <h1 class="text-xs-center">{{{trans('installer::installer.title.user')}}}</h1>
                            <div class="card-block">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{{$error}}}</p>
                                @endforeach
                                </div>
                            @endif
                            {!! Form::open(['route' => 'Installer::userStore', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.user.name')}}}</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{{old('name')}}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="email">{{{trans('installer::installer.user.email')}}}</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{{old('email')}}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="password">{{{trans('installer::installer.user.password')}}}</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="password_confirmation">{{{trans('installer::installer.user.password_confirmation')}}}</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-center">
                                    <button type="submit" class="btn btn-info">{{{trans('installer::installer.button.next')}}}</button>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop