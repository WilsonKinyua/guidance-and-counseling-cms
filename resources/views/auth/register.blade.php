@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card mx-4">
                <div class="card-body p-4">

                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <h1 class="text-center">{{ trans('global.register') }}</h1>
                        <p class="text-muted">
                            <small>
                                To preserve user anonymity, we have generated a random name, email for you. You can change
                                it by
                                clicking on the name,email field and entering your desired name,email. Ensure you remember
                                the name and email you used to register as you will need it to login.
                            </small>
                        </p>
                        <label for="" class="required">Name</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user fa-fw"></i>
                                </span>
                            </div>
                            <input type="text" name="name" id="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus
                                placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <label for="" class="required">Email</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-envelope fa-fw"></i>
                                </span>
                            </div>
                            <input type="email" name="email" id="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                                placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <label for="" class="required">Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock fa-fw"></i>
                                </span>
                            </div>
                            <input type="password" name="password" id="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required
                                placeholder="{{ trans('global.login_password') }}">
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <label for="" class="required">Confirm Password</label>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock fa-fw"></i>
                                </span>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" required
                                placeholder="{{ trans('global.login_password_confirmation') }}">
                        </div>

                        <button class="btn btn-block btn-primary">
                            {{ trans('global.register') }}
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(document).ready(function() {
            $('#name').val(Math.random().toString(36).substr(2, 5) + ' ' + Math.random().toString(36).substr(2, 5));
            $('#email').val(Math.random().toString(36).substr(2, 5) + '@guidancecounseling.com');
        })
    </script>
@endsection
