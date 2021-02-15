<x-app-layout>
    <main>
        <div class="container article">
            <article class="single-page">
                <div class="breadcrumb">
                    <ul class="breadcrumb__ul">
                        <li class="breadcrumb__item">
                            <a href="/" class="breadcrumb__link"
                               title="صفحه اصلی">
                                صفحه اصلی
                            </a>
                        </li>

                        <li class="breadcrumb__item">
                            <a href="{{route('show.post',$post->slug)}}" class="breadcrumb__link"
                               title="{{$post->title}}">
                                {{$post->title}}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="single-page__title">
                    <h1 class="single-page__h1"> {{$post->title}} </h1>
                    @auth()
                        <span class="single-page__like"></span>
                    @endauth
                </div>
                <div class="single-page__details">
                    <div class="single-page__author">نویسنده : {{$post->user->name}}</div>
                    <div class="single-page__date">تاریخ : {{$post->shamsiDate()}}</div>
                </div>
                <div class="single-page__img">
                    <img class="single-page__img-src" src="{{$post->getBannerSrc()}}" alt="">
                </div>
                <div class="single-page__content">
                    {!! $post->content !!}
                </div>
                <div class="single-page__tags">
                    <ul class="single-page__tags-ul">
                        @foreach($post->categories as $cate)
                            <li class="single-page__tags-li"><a href="{{route('category.show',$cate->slug)}}"
                                                                class="single-page__tags-link">{{$cate->name}}</a></li>
                        @endforeach
                    </ul>
                </div>

            </article>
        </div>
        <div class="container">
            <div class="comments" id="comments">
                @auth()
                    <div class="comments__send">
                        <div class="comments__title">
                            <h3 class="comments__h3"> دیدگاه خود را بنویسید </h3>
                            <span class="comments__count">  نظرات ( {{$post->comments_count}} ) </span>
                        </div>
                        <form action="{{route('send.comment')}}" method="post">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <input type="hidden" name="comment_id" value="" id="rp-cm">
                            <textarea name="content" class="comments__textarea" placeholder="بنویسید"></textarea>
                            <button class="btn btn--blue btn--shadow-blue">ارسال نظر</button>
                            <button class="btn btn--red btn--shadow-red">انصراف</button>
                        </form>
                    </div>
                @else
                    <p class="alert alert-warning">شما برای ارسال نظر باید اول وارد سایت شوید</p>
                @endauth
                <div class="comments__list">
                    @foreach($post->comments as $comment)
                        @include('comment.comment',compact('comment'))
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <x-slot name="script">
        <script>
            function setValue(id) {
                document.getElementById('rp-cm').value = id;
            }

            $(".single-page__like").on("click", function () {
                fetch('{{ route("like", $post->slug) }}', {
                    method: 'post',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    }
                }).then((response) => {
                    if (response.ok) {
                        $(this).toggleClass("single-page__like--is-active");
                    }
                })

            })
        </script>
    </x-slot>
</x-app-layout>
