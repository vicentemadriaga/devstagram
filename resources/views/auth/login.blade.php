@extends('layouts.app')

@section('titulo')
    Inicia sesion en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center ">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="imagen de login de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg justify-center shadow-xl">
            <form  method="POST" action="{{ route('login') }}" novalidate>
                @csrf
                
                @if (session('mensaje'))
                    <p class=" text-red-600 text-sm text-center">{{ session('mensaje') }}</p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label> 
                    <input 
                    id="email"
                    name="email"
                    type="email"
                    placeholder="ingresa tu email"
                    class="border p-3 w-full rounded-xl @error('email')
                        border-red-500
                    @enderror "
                    value="{{ old('email')}}"
                    
                    >
                    @error('email')
                        <p class=" text-red-600 text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label> 
                    <input 
                    id="password"
                    name="password"
                    type="password"
                    placeholder="ingresa tu password"
                    class="border p-3 w-full rounded-xl @error('password')
                        border-red-500
                    @enderror "
                    >
                    @error('password')
                        <p class=" text-red-600 text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember" id="">  Mantener sesion abierta
                </div>

                <input 
                type="submit"
                value="Iniciar sesion"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl"
                >
            </form>
        </div>

    </div>
@endsection

