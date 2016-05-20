
@extends('layouts.general.principallogin')

@section('content')

<div class="container loginge">
    <div class="row">

        <div class="col-md-offset-2 col-lg-offset-3 col-xs-12 col-sm-12 col-md-6 col-lg-6 loginge" style="margin-top: 12%">
            <div class="text-center">
                @include('layouts.general.logoingles')
            </div>
            <div class="panel panel-default">
                
                <div class="panel-heading text-center">
                    <h3 class="panel-title">Formulario de ingreso</h3>
                </div>
                {!!Form::open()!!}
                <div class="panel-body">
                    <form role="form">

                        <fieldset>
                            <div class="form-group">
                                {!!Form::text('username',null,['class'=>'form-control', 'required', 'placeholder'=>'Usuario'])!!}
                            </div>
                            <div class="form-group">
                                {!!Form::password('password',['class'=>'form-control', 'required', 'placeholder'=>'Contraseña'])!!}
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Recuerdame
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Login"/>                            
                            <a href="facebook" class="btn btn-primary btn-lg  btn-block">Iniciar sesion con Facebook</a>

                        </fieldset>
                    </form>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>

@endsection