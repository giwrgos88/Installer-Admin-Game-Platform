@extends('installer::installer.master')
@section('title'){{{trans('installer::installer.title.welcome')}}}@stop
@section('body')
<div class="container d-table">
    <div class="d-100vh-va-middle">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active">{{{trans('installer::installer.title.welcome')}}}</li>
                    <li>{{{trans('installer::installer.title.requirements')}}}</li>
                    <li>{{{trans('installer::installer.title.permissions')}}}</li>
                    <li>{{{trans('installer::installer.title.setup')}}}</li>
                    <li>{{{trans('installer::installer.title.user')}}}</li>
                    <li>{{{trans('installer::installer.title.final')}}}</li>
                </ul>
                <!-- fieldsets -->
                <div class="card-group">
                    <div class="card p-2">
                        <div class="card-block">
                            <h1 class="text-xs-center">{{{trans('installer::installer.title.welcome')}}}</h1>
                            <br />
                            <p>{{{trans('installer::installer.welcome.message')}}}</p>
                            <br />
                            <div class="text-xs-center">
                                <a href="{{ route('Installer::requirements') }}" class="btn btn-primary px-2 ">{{{trans('installer::installer.button.next')}}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
