@extends('layouts.app')
@section('content')
<div>
    <div>
        <div>
            <div>
                <div>{{ __('Register') }}</div>
                <div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div>
                            <label for="name">{{ __('Name') }}</label>
                            <div>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                <span role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <label for="name">{{ __('lastname') }}</label>
                            <div>
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required>
                                @if ($errors->has('lastname'))
                                <span  role="alert">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <label for="cedula" >{{ __('cedula') }}</label>
                            <div >
                                <input id="cedula" type="text" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula" value="{{ old('cedula') }}" required>
                                @if ($errors->has('cedula'))
                                <span role="alert">
                                    <strong>{{ $errors->first('cedula') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <label for="celular">{{ __('celular') }}</label>
                            <div>
                                <input id="celular" type="text" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{ old('celular') }}" required>
                                @if ($errors->has('celular'))
                                <span>
                                    <strong>{{ $errors->first('celular') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div >
                            <label for="email" >{{ __('E-Mail Address') }}</label>
                            <div >
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                <span role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <label for="password">{{ __('Password') }}</label>
                            <div >
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                <span role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                            <div>
                                <input id="password-confirm" type="password" name="password_confirmation" required>
                            </div>
                        </div>
                        <div>
                            <div>
                                <button type="submit">
                                {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection