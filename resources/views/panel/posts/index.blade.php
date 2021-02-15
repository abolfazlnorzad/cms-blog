<x-panel>
    <x-slot name="title">پست ها</x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a class="is-active"> مقالات</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('posts.index')}}">لیست مقالات</a>
                <a class="tab__item " href="{{route('posts.create')}}">ایجاد مقاله جدید</a>
            </div>
        </div>
        <div class="bg-white padding-20">
            <div class="t-header-search">
                <form>
                    <div class="t-header-searchbox font-size-13">
                        <div type="text" class="text search-input__box font-size-13">جستجوی مقاله
                            <div class="t-header-search-content ">
                                <input type="text" name="search" class="text" placeholder="نام مقاله">
                                <button class="btn btn-webamooz_net">جستجو</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="table__box">
            <table class="table">

                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>عنوان</th>
                    <th>نویسنده</th>

                    <th>تاریخ ایجاد</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr role="row" class="">
                        <td><a href="">{{$post->id}}</a></td>
                        <td><a href="">{{$post->title}}</a></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->shamsiDate()}}</td>
                        <td>
                            <a onclick="event.preventDefault();document.getElementById('frm-del-{{$post->id}}').submit()"
                               class="item-delete mlg-15" title="حذف"></a>
                            <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                            <a href="{{route('posts.edit',$post->id)}}" class="item-edit" title="ویرایش"></a>
                            <form id="frm-del-{{$post->id}}" action="{{route('posts.destroy',$post->id)}}"
                                  method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
            {{$posts->appends(request()->query())->links()}}
        </div>
    </div>
</x-panel>
