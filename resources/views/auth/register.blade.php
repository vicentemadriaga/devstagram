@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center ">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="imagen de registro de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg justify-center shadow-xl">
            <form action="/crear-cuenta" method="post" >
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label> 
                    <input 
                    id="name"
                    name="name"
                    type="text"
                    placeholder="ingrese su nombre completo"
                    class="border p-3 w-full rounded-xl @error('name')
                        border-red-500
                    @enderror "
                    value="{{ old('name')}}"
                    
                    >
                    @error('name')
                        <p class=" text-red-600 text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre de Usuario
                    </label> 
                    <input 
                    id="username"
                    name="username"
                    type="text"
                    placeholder="ingrese su nombre de usuario"
                    class="border p-3 w-full rounded-xl @error('username')
                        border-red-500
                    @enderror "
                    value="{{ old('username')}}"
                    
                    >
                    @error('username')
                        <p class=" text-red-600 text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label> 
                    <input 
                    id="email"
                    name="email"
                    type="email"
                    placeholder="ingrese tu email de registro"
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
                    placeholder="crea una nueva password"
                    class="border p-3 w-full rounded-xl @error('password')
                        border-red-500
                    @enderror "
                    >
                    @error('password')
                        <p class=" text-red-600 text-sm text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">
                        Repetir Contraseña
                    </label> 
                    <input 
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    placeholder="Repite la password"
                    class="border p-3 w-full rounded-xl"                    
                    >
                </div>
                
                <input 
                type="submit"
                value="Crear cuenta"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-xl"
                >
            </form>
        </div>

    </div>
@endsection

