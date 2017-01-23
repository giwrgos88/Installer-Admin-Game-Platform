@extends('installer::installer.master')
@section('title'){{{trans('installer::installer.title.final')}}}@stop
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
                    <li class="active">{{{trans('installer::installer.title.final')}}}</li>
                </ul>
                <!-- fieldsets -->
                <div class="card-group">
                    <div class="card p-2">
                        <div class="card-block">
                            <h1 class="text-xs-center">{{{trans('installer::installer.title.final')}}}</h1>
                            <br />
                            <p>{{{trans('installer::installer.final.message')}}}</p>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
