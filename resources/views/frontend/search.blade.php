@extends('frontend.master')

@section('main_page')
<main class="shop">

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="main-title">
                        Product Result
                    </h3>
                </div>
            </div>
            <div class="row">
                @if(isset($SearchForProduct))

                @foreach($SearchForProduct as $Searchproduct)
                <div class="col-3">
                    <figure>
                        <div class="thumbnail">
                            @if($product-> sale_price <$product -> regular_price)

                                <div class="status">
                                    Promotion
                                </div>
                                @else
                                <div class="status d-none">
                                    Promotion
                                </div>
                                @endif

                                <a href="{{route('detail', ['id'=>$product->id])}}">
                                    <img width="450" height="370" src="../assets/image/{{$product->thumbnail}}" alt="">
                                </a>
                        </div>
                        <div class="detail">
                            <div class="price-list">
                                <div class="price d-none">US 10</div>
                                <div class="regular-price "><strike>US {{$product->regular_price}} </strike></div>
                                <div class="sale-price ">US {{$product->sale_price}}</div>
                            </div>
                            <h5 class="title">{{$product->name}}</h5>
                        </div>
                    </figure>
                </div>

                @endforeach

                <div>
                    {!! $SearchForProduct->links() !!}
                </div>

                @else
                <tr>
                    <td colspan="4">No products found</td>
                </tr>
                @endif
            </div>



        </div>

        <div class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <h3 class="main-title">
                        News Result
                    </h3>
                </div>
            </div>
            <div class="row">
                @if(isset($SearchForNews))
                @foreach ($SearchForNews as $Searchnews )


                <div class="col-3">
                    <figure>
                        <div class="thumbnail">
                            <a href="{{route('News_detail',['id'=>$Searchnews->id])}}">
                                <img width="450" height="370px" src="assets/image/{{$Searchnews->thumbnail}}" alt="">
                            </a>
                        </div>
                        <div class="detail">
                            <h5 class="title">{{$Searchnews->title}}</h5>
                        </div>
                    </figure>
                </div>
                @endforeach
                <div>
                    {!! $SearchForNews->links() !!}
                </div>

                @else
                <tr>
                    <td colspan="4">No products found</td>
                </tr>
                @endif
            </div>
        </div>
    </section>

</main>
@endsection