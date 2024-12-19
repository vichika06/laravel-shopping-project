@extends('frontend.master')

@section('main_page')

<main class="product-detail">

    <section class="review">
        <div class="container">
            <div class="row">
                @foreach ($detailProduct as $detail )
                <div class="col-5">
                    <figure>
                        <div class="thumbnail">
                            @if ($detail->regular_price > $detail->sale_price)
                            <div class="status">
                                Promotion
                            </div>
                            @else
                            <div class="status d-none">
                                Promotion
                            </div>
                            @endif
                            <img width="450" height="670" src="../assets/image/{{$detail->thumbnail}}" alt="">
                        </div>
                </div>
                <div class="col-7">
                    <div class="detail">
                        <div class="price-list">
                            @if ($detail->regular_price > $detail->sale_price)
                            <div class="price d-none">US 30.5</div>
                            <div class="regular-price"><strike>US {{$detail->regular_price}}</strike></div>
                            <div class="sale-price">US {{$detail->sale_price}}</div>
                            @else
                            <div class="sale-price">US {{$detail->sale_price}}</div>
                            @endif
                        </div>
                        <h5 class="title">Plain {{$detail->name}}</h5>
                        <div class="group-size">
                            <span class="title">Color Available</span>
                            <div class="group">
                                {{$detail->color}}
                            </div>
                        </div>
                        <div class="group-size">
                            <span class="title">Size Available</span>
                            <div class="group">
                                {{$detail->size}}
                            </div>
                        </div>
                        <div class="group-size">
                            <span class="title">Description</span>
                            <div class="description">
                                {{$detail->description}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </figure>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="main-title">
                        RELATED PRODUCTS
                    </h3>
                </div>
            </div>

            <div class="row">

                @foreach ($relatedProduct as $related )
                <div class="col-3">
                    <figure>
                        <div class="thumbnail">
                            @if ($related->regular_price > $related->sale_price)
                            <div class="status">
                                Promotion
                            </div>
                            @else
                            <div class="status d-none">
                                Promotion
                            </div>
                            @endif
                            <a href="{{route('detail',['id'=>$related->id])}}">
                                <img width="450" height="370" src="../assets/image/{{$related->thumbnail}}" alt="">
                            </a>
                        </div>
                        <div class="detail">
                            <div class="price-list">
                                @if($related->sale_price < $related->regular_price)

                                    <div class="regular-price "><strike> US {{$related->regular_price}}</strike></div>
                                    <div class="sale-price ">US {{$related->sale_price}}</div>
                                    @else
                                    <div class="sale-price ">US {{$related->sale_price}}</div>
                                    @endif
                            </div>
                            <h5 class="title">{{$related->name}}</h5>
                        </div>
                    </figure>
                </div>

                @endforeach

            </div>
        </div>
    </section>

</main>

@endsection