<x-panel>
    <x-slot name="title"> دسته بندی ها</x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a class="is-active">دسته بندی ها</a></li>
        </ul>
    </div>
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دسته بندی ها</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام دسته بندی</th>
                            <th>نام انگلیسی دسته بندی</th>
                            <th>دسته پدر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr role="row" class="">
                                <td><a href="">{{$category->id}}</a></td>
                                <td><a href=""> {{$category->name}}</a></td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->parent->name ?? 'ندارد'}}</td>
                                <td>
                                    <a onclick="event.preventDefault();document.getElementById('frm-delete-{{$category->id}}').submit()" class="item-delete mlg-15" title="حذف"></a>
                                    <a href="{{route('categories.edit',$category->id)}}" class="item-edit " title="ویرایش"></a>
                                    <form id="frm-delete-{{$category->id}}" action="{{route('categories.destroy',$category->id)}}" method="post">@csrf @method('DELETE')</form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد دسته بندی جدید</p>
                <form action="{{route('categories.store')}}" method="post" class="padding-30">
                    @csrf
                    <input name="name" type="text" placeholder="نام دسته بندی" class="text">
                    <input name="slug" type="text" placeholder="نام انگلیسی دسته بندی" class="text">
                    <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
                    <select name="category_id" id="">
                        <option value="">ندارد</option>
                        @foreach($parentCategory as $parent)
                            <option value="{{$parent->id}}">{{$parent->name}}</option>

                        @endforeach
                    </select>
                    <button class="btn btn-webamooz_net">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>
</x-panel>
