<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <title>{{$title ?? ""}}</title>
    <link rel="stylesheet" href="{{asset('/blog/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/blog/panel/css/font.css')}}">
    <link rel="stylesheet" href="{{asset('blog/panel/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('blog/panel/css/responsive_991.css')}}" media="(max-width:991px)">
    <link rel="stylesheet" href="{{asset('blog/panel/css/responsive_768.css')}}" media="(max-width:768px)">
    {{$style ?? ""}}

</head>
<body>
<div class="sidebar__nav border-top border-left  ">
    <span class="bars d-none padding-0-18"></span>
    <a class="header__logo  d-none" href="https://webamooz.net"></a>
    <div class="profile__info border cursor-pointer text-center">
        <div class="avatar__img"><img src="{{auth()->user()->getProfileSrc()}}" class="avatar___img">
            <input type="file" accept="image/*" class="hidden avatar-img__input">
            <div class="v-dialog__container" style="display: block;"></div>
            <div class="box__camera default__avatar"></div>
        </div>

        <span class="profile__name">کاربر : {{auth()->user()->name}}</span>
        <span class="profile__name">نقش کاربر : {{auth()->user()->rolefa}}</span>
    </div>

@include('panel.layouts.sidebar')

</div>
<div class="content">
    <div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
        <div class="header__right d-flex flex-grow-1 item-center">
            <span class="bars"></span>
            <a class="header__logo" href="https://webamooz.net"></a>
        </div>
        <div class="header__left d-flex flex-end item-center margin-top-2">
            <a onclick="event.preventDefault();document.getElementById('frm-logout').submit()" class="logout" title="خروج"></a>
            <form action="{{route('logout')}}" method="post" id="frm-logout">@csrf</form>
        </div>
    </div>

    {{$slot}}
</div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('blog/panel/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('blog/panel/js/js.js')}}"></script>
@include('sweet::alert')
{{$script ?? ""}}
</html>
