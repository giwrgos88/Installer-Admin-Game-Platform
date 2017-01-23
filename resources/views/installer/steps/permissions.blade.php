@extends('installer::installer.master')
@section('title'){{{trans('installer::installer.title.permissions')}}}@stop
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
                    <li>{{{trans('installer::installer.title.setup')}}}</li>
                    <li>{{{trans('installer::installer.title.user')}}}</li>
                    <li>{{{trans('installer::installer.title.final')}}}</li>
                </ul>
                <!-- fieldsets -->
                <div class="card-group">
                    <div class="card p-2">
                        <div class="card-block">
                            <h1 class="text-xs-center">{{{trans('installer::installer.title.permissions')}}}</h1>
                            <br />
                            <p>{{{trans('installer::installer.permissions.message')}}}</p>
                            <br />
                            <table class="table table-hover table-outline m-b-0 hidden-sm-down">
                                <tbody>
                                    @foreach($permissions['folders'] as $folder => $permission)
                                    <tr>
                                        <td>
                                        {{{$folder}}}
                                        </td>
                                        @if($permission['result'])
                                        <td class="text-xs-center success">
                                        @else
                                        <td class="text-xs-center error">
                                        @endif
                                        {{{$permission['permission']}}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-xs-center">
                                @if (!isset($requirements['errors']))
                                <a href="{{ route('Installer::setup') }}" class="btn btn-primary px-2 ">{{{trans('installer::installer.button.next')}}}</a>
                                @else
                                <a href="{{ route('Installer::permissions') }}" class="btn btn-primary px-2 ">{{{trans('installer::installer.button.retry')}}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
