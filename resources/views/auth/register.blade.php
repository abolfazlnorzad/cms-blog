<x-app-layout>

    <x-slot name="title"> - ثبت نام</x-slot>
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">ثبت نام در وب‌سایت</h1>


                <form class="sign-page__form" method="post" action="{{route('register.store')}}">
                    @csrf
                    <div>
                        <input type="text" name="name" class="text text--right" placeholder="نام  و نام خانوادگی"/>
                        @error('name')
                        <small class="valid-frm">{{$message}}</small>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="mobile" class="text text--left" placeholder="شماره موبایل"/>
                        @error('mobile')
                        <small class="valid-frm">{{$message}}</small>
                        @enderror
                    </div>
                    <div>
                        <input type="email" name="email" class="text text--left" placeholder="ایمیل"/>
                        @error('email')
                        <small class="valid-frm">{{$message}}</small>
                        @enderror
                    </div>
                    <div>
                        <input type="password" name="password" class="text text--left" placeholder="رمز عبور"/>
                        @error('password')
                        <small class="valid-frm">{{$message}}</small>
                        @enderror
                    </div>
                    <div>
                        <input type="password" name="password_confirmation" class="text text--left"
                               placeholder="تکرار رمز عبور"/>

                    </div>

                    <button type="submit" class="btn btn--blue btn--shadow-blue width-100 mb-10">ثبت نام</button>
                    <div class="sign-page__footer">
                        <span>در سایت عضوید ؟ </span>
                        <a href="{{route('login')}}" class="color--46b2f0">صفحه ورود</a>
                    </div>

                </form>
            </div>
        </div>
    </main>
</x-app-layout>


{{--<x-guest-layout>--}}
{{--    <x-auth-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <a href="/">--}}
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--            </a>--}}
{{--        </x-slot>--}}

{{--        <!-- Validation Errors -->--}}
{{--        <x-auth-validation-errors class="mb-4" :errors="$errors" />--}}

{{--        <form method="POST" action="{{ route('register') }}">--}}
{{--            @csrf--}}

{{--            <!-- Name -->--}}
{{--            <div>--}}
{{--                <x-label for="name" :value="__('Name')" />--}}

{{--                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />--}}
{{--            </div>--}}

{{--            <!-- Email Address -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password"--}}
{{--                                required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <!-- Confirm Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--                <x-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password_confirmation" required />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">--}}
{{--                    {{ __('Already registered?') }}--}}
{{--                </a>--}}

{{--                <x-button class="ml-4">--}}
{{--                    {{ __('Register') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-auth-card>--}}
{{--</x-guest-layout>--}}
