@extends('layouts.app')

@section('content')
<!-- Create By Joker Banny -->
@php
    $configuracion = DB::table('configurations')->where('id', 1)->first();
@endphp

<div class="min-h-screen bg-no-repeat bg-cover bg-center" style="background-image: url('https://th.bing.com/th/id/R.eed3c3a0ecec297d18cf597297569675?rik=tJnSJkaKU6VYDQ&riu=http%3a%2f%2f2.bp.blogspot.com%2f-HK1kISpBfRU%2fTtbAqPcWRnI%2fAAAAAAAAAAw%2fVnAq0jZX_Ns%2fs1600%2fHIPERMAXI.jpg&ehk=fO45E8zuqcITTegcFMvwL3ZcvGfdYZ%2bVdBi%2bDZuH160%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1')">
    <div class="flex justify-center items-center min-h-screen bg-opacity-30 bg-gray-900 p-4 sm:p-8">
        <div class="bg-center flex  justify-center items-center w-full max-w-md p-8 sm:p-10 bg-white bg-opacity-50 rounded-3xl shadow-lg">
            <form method="POST" action="{{ route('login') }}" class="w-full ">
                @csrf
                <div class="text-center mb-6">
                    @if ($configuracion && $configuracion->razon_social)
                        <span class="text-sm text-gray-900">Bienvenido al Supermercado</span>
                    @endif
                    <h1 class="text-2xl font-bold mt-2">Inicia Sesión</h1>
                </div>

                <div class="mb-4">
                    <label class="block text-md mb-2" for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror px-6 w-full border border-gray-300 py-2 rounded-md text-sm outline-none focus:border-blue-500"
                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                    @error('email')
                        <span class="invalid-feedback text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-md mb-2" for="password">{{ __('Password') }}</label>
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror px-6 w-full border border-gray-300 py-2 rounded-md text-sm outline-none focus:border-blue-500"
                        name="password" required autocomplete="current-password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4 flex items-center justify-between">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-gray-600" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-700 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-400 text-white py-2 rounded-md transition duration-100">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="text-center mt-6">
                    <p class="text-sm">¿No tienes cuenta? <a href="{{ route('register') }}"
                            class="text-blue-700 hover:underline">Crear Cuenta</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
