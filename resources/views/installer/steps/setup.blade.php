@extends('installer::installer.master')
@section('title'){{{trans('installer::installer.title.setup')}}}@stop
@section('extend-css')
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.css" media="all" rel="stylesheet" type="text/css" />
@stop
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
                    <li>{{{trans('installer::installer.title.user')}}}</li>
                    <li>{{{trans('installer::installer.title.final')}}}</li>
                </ul>
                <!-- fieldsets -->
                <div class="card-group">
                    <div class="card p-2">
                        <div class="card-block">
                            <h1 class="text-xs-center">{{{trans('installer::installer.title.setup')}}}</h1>
                            <div class="card-block">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{{$error}}}</p>
                                @endforeach
                                </div>
                            @endif
                            {!! Form::open(['route' => 'Installer::setupSave', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                                <div class="row">
                                    <h5>{{{trans('installer::installer.setup.dct')}}}</h5>
                                    <br />
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.dc')}}}</label>
                                            <input type="text" class="form-control" id="DB_CONNECTION" name="DB_CONNECTION" placeholder="mysql" value="{{{old('DB_CONNECTION', 'mysql')}}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.dh')}}}</label>
                                            <input type="text" class="form-control" id="DB_HOST" name="DB_HOST" placeholder="localhost" value="{{{old('DB_HOST', 'localhost')}}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.dp')}}}</label>
                                            <input type="text" class="form-control" id="DB_PORT" name="DB_PORT" placeholder="3306" value="{{{old('DB_PORT', '3306')}}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.dt')}}}</label>
                                            <input type="text" class="form-control" id="DB_DATABASE" name="DB_DATABASE" value="{{{old('DB_DATABASE')}}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.du')}}}</label>
                                            <input type="text" class="form-control" id="DB_USERNAME" name="DB_USERNAME" value="{{{old('DB_USERNAME')}}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.dup')}}}</label>
                                            <input type="text" class="form-control" id="DB_PASSWORD" name="DB_PASSWORD" required>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <hr/>
                                <br/>
                                <div class="row">
                                    <h5>{{{trans('installer::installer.setup.mc')}}}</h5>
                                    <br />
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.md')}}}</label>
                                            <input type="text" class="form-control" id="MAIL_DRIVER" name="MAIL_DRIVER" placeholder="mailgun" value="{{{old('MAIL_DRIVER', 'mailgun')}}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.mh')}}}</label>
                                            <input type="text" class="form-control" id="MAIL_HOST" name="MAIL_HOST" placeholder="mailtrap.io" value="{{{old('MAIL_HOST', 'mailtrap.io')}}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.mp')}}}</label>
                                            <input type="text" class="form-control" id="MAIL_PORT" name="MAIL_PORT" placeholder="2525" value="{{{old('MAIL_PORT', '2525')}}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.mu')}}}</label>
                                            <input type="text" class="form-control" id="MAIL_USERNAME" name="MAIL_USERNAME" value="{{{old('MAIL_USERNAME')}}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.mup')}}}</label>
                                            <input type="text" class="form-control" id="MAIL_PASSWORD" name="MAIL_PASSWORD" value="{{{old('MAIL_PASSWORD')}}}">
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <hr/>
                                <br/>
                                <div class="row">
                                    <h5>{{{trans('installer::installer.setup.fc')}}}</h5>
                                    <br />
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.fai')}}}</label>
                                            <input type="text" class="form-control" id="FACEBOOK_APP_ID" name="FACEBOOK_APP_ID" value="{{{old('FACEBOOK_APP_ID')}}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.fask')}}}</label>
                                            <input type="text" class="form-control" id="FACEBOOK_APP_SECRET_KEY" name="FACEBOOK_APP_SECRET_KEY" value="{{{old('FACEBOOK_APP_SECRET_KEY')}}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.fau')}}}</label>
                                            <input type="text" class="form-control" id="FACEBOOK_APP_URL" name="FACEBOOK_APP_URL" value="{{{old('FACEBOOK_APP_URL')}}}">
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <hr/>
                                <br/>
                                <div class="row">
                                    <h5>{{{trans('installer::installer.setup.ga')}}}</h5>
                                    <br />
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.gac')}}}</label>
                                            <input type="text" class="form-control" id="GOOGLE_CODE" name="GOOGLE_CODE" placeholder="UA-****" value="{{{old('GOOGLE_CODE')}}}">
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <hr/>
                                <br/>
                                <div class="row">
                                    <h5>{{{trans('installer::installer.setup.ad')}}}</h5>
                                    <br />
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{{trans('installer::installer.setup.alv')}}}</label>
                                            <input type="text" name="daterange" class="form-control" id="date_range" value="{{{old('daterange')}}}">
                                            <input type="hidden" class="form-control" id="APPLICATION_START_DATE" name="APPLICATION_START_DATE" value="{{{old('APPLICATION_START_DATE')}}}">
                                            <input type="hidden" class="form-control" id="APPLICATION_END_DATE" name="APPLICATION_END_DATE" value="{{{old('APPLICATION_END_DATE')}}}">
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
@section('extend-scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/moment.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function() {
    $('input[name="daterange"]').daterangepicker({
        startDate: new Date(),
        minDate: new Date(),
        timePicker: true,
        timePicker24Hour: true,
        locale: {
            format: 'DD/MM/YYYY h:mm'
        }
    }, function(start, end, label) {
        $('#APPLICATION_START_DATE').val(start.format('DD/MM/YYYY H:MM'));
        $('#APPLICATION_END_DATE').val(end.format('DD/MM/YYYY H:MM'));
    });
});
</script>
@stop