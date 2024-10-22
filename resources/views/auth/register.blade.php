<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="address" :value="__('address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        <div class="row mb-0">
            <div class="col-md-8 offset-md-2">
                <div class="d-flex justify-content-flex">

                    <!-- Google Login Button -->
                    <a class="btn btn-danger" href="{{ url('/auth/google/redirect') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-google" viewBox="0 0 16 16">
                            <path
                                d="M8.159 5.093V6.87h4.504c-.228 1.191-.906 2.2-1.909 2.848v2.38h3.05C14.852 10.841 15.5 8.95 15.5 6.77c0-.7-.073-1.381-.212-2.03h-3.129l.016 1.068h-2.316zm-2.482.478C3.916 6.875 3.5 7.866 3.5 8.91c0 1.07.438 2.11 1.177 2.868l.124.127c.586.571 1.333 1.068 2.17 1.346l.145.049c1.125.41 2.416.342 3.514-.2l.157-.097c.679-.398 1.272-.984 1.707-1.689l.07-.12H8.16v-.736l2.758.001c-.11.404-.347.8-.708 1.123l-.099.081c-.48.396-1.115.653-1.812.653-.552 0-1.055-.145-1.49-.406l-.091-.057c-.347-.196-.641-.471-.868-.794l-.078-.107A2.935 2.935 0 0 1 5.5 8.91c0-.795.323-1.544.864-2.116l.106-.12c.215-.254.458-.46.722-.617.368-.211.784-.342 1.224-.342.604 0 1.168.227 1.607.623l.083.077.606-.606-.097-.082c-.638-.524-1.415-.816-2.291-.816-.748 0-1.452.256-2.04.735zm-.754 1.338h.002z" />
                        </svg>
                        Login with Google
                    </a>

                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
