<x-panel>
    <x-slot name="title">ایجاد کاربر جدید</x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}" title="پیشخوان">پیشخوان</a></li>
            <li><a href="{{route('users.index')}}" class="">کاربران</a></li>
            <li><a  class="is-active">ایجاد کاربر جدید</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">ایجاد کاربر جدید</p>
                <form action="{{route('users.store')}}" class="padding-30" method="post">
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
                    <select name="role" >
                        <option value="user" selected>کاربر عادی</option>
                        <option value="author">نویسنده</option>
                        <option value="admin">مدیر</option>
                    </select>
                    <button class="btn btn-webamooz_net">ایجاد</button>
                </form>

            </div>
        </div>
    </div>
</x-panel>
