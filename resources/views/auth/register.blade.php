@extends('layouts.app')

@section('content')
<div class="container">

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="label-txt">Nome</label>


            <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')

            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="line-box">
                <div class="line"></div>
            </div>

        </div>

        <div class="form-group row">
            <label for="email" class="label-txt">Endereço de E-mail</label>


            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="line-box">
                <div class="line"></div>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="label-txt">Senha</label>


            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="line-box">
                <div class="line"></div>
            </div>

        </div>

        <div class="form-group row">
            <label for="password-confirm" class="label-txt">Confirme sua senha</label>


            <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
            <div class="line-box">
                <div class="line"></div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Registrar-se
                </button>
            </div>
        </div>
    </form>

</div>
@endsection
@section('head')
<style>
    body {
        background: #C5E1A5;
    }

    form {
        width: 60%;
        margin: 60px auto;
        background: #efefef;
        padding: 60px 120px 80px 120px;
        text-align: center;
        -webkit-box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.1);
        box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.1);
    }

    div.form-group {
        display: block;
        position: relative;
        margin: 40px 0px;
    }

    .label-txt {
        position: absolute;
        top: -1.6em;
        padding: 10px;
        font-family: sans-serif;
        font-size: .8em;
        letter-spacing: 1px;
        color: rgb(120, 120, 120);
        transition: ease .3s;
    }

    .input {
        width: 100%;
        padding: 10px;
        background: transparent;
        border: none;
        outline: none;
    }

    .line-box {
        position: relative;
        width: 100%;
        height: 2px;
        background: #BCBCBC;
    }

    .line {
        position: absolute;
        width: 0%;
        height: 2px;
        top: 0px;
        left: 50%;
        transform: translateX(-50%);
        background: #8BC34A;
        transition: ease .6s;
    }

    .input:focus+.line-box .line {
        width: 100%;
    }

    .label-active {
        top: -3em;
    }

    button {
        display: inline-block;
        padding: 12px 24px;
        background: rgb(220, 220, 220);
        font-weight: bold;
        color: rgb(120, 120, 120);
        border: none;
        outline: none;
        border-radius: 3px;
        cursor: pointer;
        transition: ease .3s;
    }

    button:hover {
        background: #8BC34A;
        color: #ffffff;
    }
</style>
@endsection