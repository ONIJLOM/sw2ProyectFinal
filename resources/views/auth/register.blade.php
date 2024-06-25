@extends('layouts.app')

@section('content')
    <!-- Create By Joker Banny -->
    <?php $configuracion=DB::table('configurations')->where('id',1)->first();
    ?>
    <div class="min-h-screen bg-no-repeat bg-cover bg-center" style="background-image: url('https://th.bing.com/th/id/R.eed3c3a0ecec297d18cf597297569675?rik=tJnSJkaKU6VYDQ&riu=http%3a%2f%2f2.bp.blogspot.com%2f-HK1kISpBfRU%2fTtbAqPcWRnI%2fAAAAAAAAAAw%2fVnAq0jZX_Ns%2fs1600%2fHIPERMAXI.jpg&ehk=fO45E8zuqcITTegcFMvwL3ZcvGfdYZ%2bVdBi%2bDZuH160%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1')">
        <div class="flex justify-center items-center min-h-screen bg-opacity-30 bg-gray-900 p-4 sm:p-8">
            <div class="bg-center flex  justify-center items-center w-full max-w-md p-8 sm:p-10 bg-white bg-opacity-50 rounded-3xl shadow-lg">
                

                    <form class="p-20 bg-opasity-50 rounded-3xl flex justify-center items-center flex-col shadow-md"
                        method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf
                        <div>
                            <span class="text-sm text-gray-900">Bienvenido al Supermercado</span>
                            <h1 class="text-2xl font-bold">Crea tu Cuenta</h1>
                        </div>

                        <div class="my-3">
                            <label class="block text-md mb-2" for="name">{{ __('Name') }}</label>
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror px-6 w-full border-2 py-2 rounded-md text-sm outline-none"
                                name="name" value="{{ old('name') }}" placeholder="nombre"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="my-3">
                            <label class="block text-md mb-2" for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror px-6 w-full border-2 py-2 rounded-md text-sm outline-none"
                                name="email" value="{{ old('email') }}"
                                placeholder="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <label class="block text-md mb-2" for="password">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror px-6 w-full border-2 py-2 rounded-md text-sm outline-none"
                                name="password" placeholder="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <label for="password-confirm"
                                class="block text-md mb-2">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control  px-6 w-full border-2 py-2 rounded-md text-sm outline-none" name="password_confirmation"
                                 placeholder="password">


                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="">
                            <button type="submit"
                                class="mt-4 mb-3 w-full bg-blue-500 hover:bg-blue-400 text-white py-2 rounded-md transition duration-100">
                                {{ __('Register') }}
                            </button>
                            <div>
                                <br>
                                <a href="{{ route('login') }}"
                                    class="font-semibold border-2 border-blue-800 py-2 px-4 rounded-md hover:bg-blue-800 hover:text-white">Ya tengo Cuenta</a>
    
                            </div>
                    </form>

                
            </div>
        </div>
    </div>
    </div>
@endsection
