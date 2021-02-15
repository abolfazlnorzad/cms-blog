<x-panel>
    <x-slot name="title">ویرایش کاربر </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}" title="پیشخوان">پیشخوان</a></li>
            <li><a href="{{route('users.index')}}" class="">کاربران</a></li>
            <li><a  class="is-active">ویرایش کاربر</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters bg-white margin-bottom-20">
            <div class="col-12">
                <p class="box__title">ویرایش کاربر</p>
                <form action="{{route('users.update',$user->id)}}" class="padding-30" method="post">
                    @csrf
                    @method('PATCH')
                    <div>
                        <input value="{{old('name',$user->name)}}" type="text" name="name" class="text text--right" placeholder="نام  و نام خانوادگی"/>
                        @error('name')
                        <small class="valid-frm">{{$message}}</small>
                        @enderror
                    </div>
                    <div>
                        <input value="{{old('mobile',$user->mobile)}}" type="text" name="mobile" class="text text--left" placeholder="شماره موبایل"/>
                        @error('mobile')
                        <small class="valid-frm">{{$message}}</small>
                        @enderror
                    </div>
                    <div>
                        <input value="{{old('email',$user->email)}}" type="email" name="email" class="text text--left" placeholder="ایمیل"/>
                        @error('email')
                        <small class="valid-frm">{{$message}}</small>
                        @enderror
                    </div>
                    <select name="role" >
                        <option value="user" @if($user->role === 'user') selected @endif>کاربر عادی</option>
                        <option value="author" @if($user->role === 'author') selected @endif>نویسنده</option>
                        <option value="admin" @if($user->role === 'admin') selected @endif>مدیر</option>
                    </select>
                    <button class="btn btn-webamooz_net">ویرایش</button>
                </form>

            </div>
        </div>
    </div>
</x-panel>
