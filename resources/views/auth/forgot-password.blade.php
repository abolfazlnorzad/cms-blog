<x-app-layout>
    <x-slot name="title">- بازیابی رمز عبور</x-slot>
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">بازیابی رمز عبور</h1>

                <form class="sign-page__form" method="post" action="{{route('password.email')}}">
                    @csrf
                    <input type="text" name="email" class="text text--left" placeholder="شماره یا ایمیل">
                    @error('email')
                    <small class="valid-frm">{{$message}}</small>
                    @enderror
                    <button type="submit" class="btn btn--blue btn--shadow-blue width-100 ">بازیابی</button>
                   <br>
                    @if(\Illuminate\Support\Facades\Session::has('status'))
                        <p
                        class="valid-frm-ok">
                            {{\Illuminate\Support\Facades\Session::get('status')}}
                        </p>
                    @endif
                    <div class="sign-page__footer">
                        <span>کاربر جدید هستید؟</span>
                        <a href="{{route('register')}}" class="color--46b2f0">صفحه ثبت نام</a>

                    </div>
                </form>

            </div>
        </div>
    </main>
</x-app-layout>
