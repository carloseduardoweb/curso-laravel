@extends('layout.principal')

@section('conteudo')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error) 
                <li> {{$error}} </li>
            @endforeach
            </ul>
        </div>
    @endif
    <h1>Login</h1>
    <form method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" />
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input id="senha" type="password" name="password" class="form-control" />
        </div>
        <div class="form-group">
            <button formaction="{{action('LoginController@form')}}" class="btn btn-primary btn-block">Login</button>
        </div>
    </form>
@stop
