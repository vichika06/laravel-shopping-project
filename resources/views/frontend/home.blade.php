    @extends('frontend.master')

    @section('title')
    Home page
    @endsection

    @section('main_page')
    <main class="home">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">
                            NEW PRODUCTS
                        </h3>
                    </div>
                </div>

                <div class="row">
                    @foreach ($lastProduct as $lastitem )
                    <div class="col-3">
                        <figure>
                            <div class="thumbnail">
                                @if($lastitem -> sale_price < $lastitem -> regular_price)
                                    <div class="status">
                                        Promotion
                                    </div>
                                    @else
                                    <div class="status d-none">
                                        Promotion
                                    </div>
                                    @endif

                                    <a href="{{route('detail', ['id'=>$lastitem->id])}}">
                                        <img width="450" height="370px" src="../assets/image/{{$lastitem->thumbnail}}" alt="">
                                    </a>
                            </div>
                            <div class="detail">
                                <div class="price-list">
                                    @if($lastitem -> sale_price < $lastitem -> regular_price)
                                        <div class="regular-price "><strike> US {{$lastitem->regular_price}}</strike></div>
                                        <div class="sale-price ">US {{$lastitem->sale_price}}</div>
                                        @else
                                        <div class="regular-price d-none "> US {{$lastitem->regular_price}}</div>
                                        <div class="sale-price ">US {{$lastitem->sale_price}}</div>
                                        @endif
                                </div>
                                <h5 class="title">{{$lastitem->name}}</h5>
                            </div>
                        </figure>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">
                            PROMOTION PRODUCTS
                        </h3>
                    </div>
                </div>
                <div class="row">
                    @foreach ($promotionProduct as $promotion )


                    <div class="col-3">
                        <figure>
                            <div class="thumbnail">
                                <div class="status">
                                    Promotion
                                </div>
                                <a href="{{route('detail', ['id'=>$promotion->id])}}">
                                    <img width="450" height="370" src="../assets/image/{{$promotion->thumbnail}}" alt="">
                                </a>
                            </div>
                            <div class="detail">
                                <div class="price-list">
                                    <div class="price d-none">US 10</div>
                                    <div class="regular-price "><strike> US {{$promotion->regular_price}}</strike></div>
                                    <div class="sale-price ">US {{$promotion->sale_price}}</div>
                                </div>
                                <h5 class="title">{{$promotion->name}}</h5>
                            </div>
                        </figure>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="main-title">
                            POPULAR PRODUCTS
                        </h3>
                    </div>
                </div>
                <div class="row">
                    @foreach ($pupularProduct as $pupular)


                    <div class="col-3">
                        <figure>
                            <div class="thumbnail">
                                @if($pupular-> sale_price <$pupular -> regular_price)

                                    <div class="status">
                                        Promotion
                                    </div>
                                    @else
                                    <div class="status d-none">
                                        Promotion
                                    </div>
                                    @endif

                                    <a href="{{route('detail', ['id'=>$pupular->id])}}">
                                        <img width="450" height="370" src="../assets/image/{{$pupular->thumbnail}}" alt="">
                                    </a>
                            </div>
                            <div class="detail">
                                <div class="price-list">
                                    <div class="price d-none">US 10</div>
                                    <div class="regular-price "><strike>US {{$pupular->regular_price}} </strike></div>
                                    <div class="sale-price ">US {{$pupular->sale_price}}</div>
                                </div>
                                <h5 class="title">{{$pupular->name}}</h5>
                            </div>
                        </figure>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>

    @endsection