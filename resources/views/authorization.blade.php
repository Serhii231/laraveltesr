@extends('layouts/app')
@section('titleblock')Авторизація @endsection
@section('content')
<h3>Авторизація</h3>

@if(!empty($errors) && $errors->any())
            <div>
                <div class="font-medium text-red-600">
                    {{ __('Whoops! Something went wrong.') }}
                </div>

                <ul class="mt-3 list-disc list-inside text-sm text-red-600" style="color: red;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
    <form action="{{route('authorization_submit')}}" method = "POST">
        @csrf
        <input type="text" name = "username" placeholder="Логін">
        <br>
        <br>
        <input type="password" name='password' placeholder="Пароль">
        <br><br>
        <input type="submit" value = "Увійти">
    </form>
@endsection