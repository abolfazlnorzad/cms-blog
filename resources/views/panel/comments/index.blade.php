<x-panel>
    <x-slot name="title">دیدگاه ها</x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{route('dashboard')}}">پیشخوان</a></li>
            <li><a class="is-active"> نظرات</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">

                <a class="tab__item {{request()->getQueryString() == ''? 'is-active' : ''}}" href="{{route('comments.index')}}"> همه نظرات</a>
                <a class="tab__item  {{request()->getQueryString() == 'approved=0' ? 'is-active' : ''}}" href="{{route('comments.index',['approved'=>0])}}">نظرات تاییده نشده</a>
                <a class="tab__item {{request()->getQueryString() == 'approved=1' ? 'is-active' : ''}}" href="{{route('comments.index',['approved'=>1])}}">نظرات تاییده شده</a>
            </div>
        </div>


        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>ارسال کننده</th>
                    <th>برای</th>
                    <th>دیدگاه</th>
                    <th>تاریخ</th>
                    <th>تعداد پاسخ ها</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr role="row">
                        <td><a href="">{{$comment->id}}</a></td>
                        <td><a href=""> {{$comment->user->name}} </a></td>
                        <td><a href=""> {{$comment->post->title}}</a></td>
                        <td>{{$comment->content}}</td>
                        <td>{{$comment->shamsiDate()}}</td>
                        <td>{{$comment->replies_count}}</td>
                        <td class="{{$comment->approved ? 'text-success' : 'text-error'}}">{{$comment->approved ? 'تاییده شده' : 'تایید نشده'}}</td>
                        <td>
                            <a onclick="event.preventDefault();document.getElementById('frm-del-{{$comment->id}}').submit()"
                               class="item-delete mlg-15" title="حذف"></a>
                            @if($comment->approved)
                                <a onclick="event.preventDefault();document.getElementById('frm-update-{{$comment->id}}').submit()" class="item-reject mlg-15" title="رد"></a>
                            @else
                                <a onclick="event.preventDefault();document.getElementById('frm-update-{{$comment->id}}').submit()" class="item-confirm mlg-15" title="تایید"></a>
                            @endif
                            <a href="show-comment.html" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                            <form method="post" id="frm-del-{{$comment->id}}"
                                  action="{{route('comments.destroy',$comment->id)}}">@csrf @method('delete')</form>
                            <form method="post" id="frm-update-{{$comment->id}}"
                                  action="{{route('comments.update',$comment->id)}}">@csrf @method('patch')</form>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-panel>
