@extends('installer::installer.master')
@section('title'){{{trans('installer::installer.title.requirements')}}}@stop
@section('body')
<div class="container d-table">
    <div class="d-100vh-va-middle">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active">{{{trans('installer::installer.title.welcome')}}}</li>
                    <li class="active">{{{trans('installer::installer.title.requirements')}}}</li>
                    <li>{{{trans('installer::installer.title.permissions')}}}</li>
                    <li>{{{trans('installer::installer.title.setup')}}}</li>
                    <li>{{{trans('installer::installer.title.user')}}}</li>
                    <li>{{{trans('installer::installer.title.final')}}}</li>
                </ul>
                <!-- fieldsets -->
                <div class="card-group">
                    <div class="card p-2">
                        <div class="card-block">
                            <h1 class="text-xs-center">{{{trans('installer::installer.title.requirements')}}}</h1>
                            <br />
                            <p>{{{trans('installer::installer.requirements.message')}}}</p>
                            <br />
                            <table class="table table-hover table-outline m-b-0 hidden-sm-down">
                                <tbody>
                                    @foreach($requirements['requirements'] as $key => $requirement)
                                    <tr>
                                        <td>
                                        {{{$requirementsConfig[$key]}}}
                                        </td>
                                        @if($requirement)
                                        <td class="text-xs-center success">
                                        <i class="icon-check"></i>
                                        @else
                                        <td class="text-xs-center error">
                                        <i class="icon-close"></i>
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-xs-center">
                                @if (!isset($requirements['errors']))
                                <a href="{{ route('Installer::permissions') }}" class="btn btn-primary px-2 ">{{{trans('installer::installer.button.next')}}}</a>
                                @else
                                <a href="{{ route('Installer::requirements') }}" class="btn btn-primary px-2 ">{{{trans('installer::installer.button.retry')}}}</a>
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
