@extends('frontend.master')

@section('title')
News page
@endsection

@section('main_page')

<main class="shop news-blog">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="main-title">
                        NEWS BLOG
                    </h3>
                </div>
            </div>
            <div class="row">
                @foreach ($newsBlog as $news )

                <div class="col-3">
                    <figure>
                        <div class="thumbnail">
                            <a href="{{route('News_detail',['id'=>$news->id])}}">
                                <img width="450" height="370px" src="assets/image/{{$news->thumbnail}}" alt="">
                            </a>
                        </div>
                        <div class="detail">
                            <h5 class="title">{{$news->title}}</h5>
                        </div>
                    </figure>
                </div>

                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection