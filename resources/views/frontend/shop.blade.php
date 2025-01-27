@extends('frontend.master')

@section('title')
Shops page
@endsection

@section('main_page')
<main>
    <main class="shop">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <div class="row">
                            @if(isset($products))

                            @foreach($products as $product)
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
                                {!! $products->links() !!}
                            </div>

                            @else
                            <tr>
                                <td colspan="4">No products found</td>
                            </tr>
                            @endif
                        </div>
                    </div>
                    <div class="col-3 filter">
                        <form action="{{route('products.filter')}}" method="GET">
                            <ul>
                                <h4>Color:</h4>
                                <li>
                                    <input type="checkbox" name="color[]" value="black" id="black">
                                    <label for="black"><a href="">Black </a></label>
                                </li>

                                <li>
                                    <input type="checkbox" name="color[]" value="white" id="white">
                                    <label for="white"><a href="">White</a></label>
                                </li>

                                <li>
                                    <input type="checkbox" name="color[]" value="yellow" id="yellow">
                                    <label for="yellow"><a href="">Yellow</a></label>

                                </li>
                                <li>
                                    <input type="checkbox" name="color[]" value="blue" id="blue">
                                    <label for="blue"><a href="">Blue</a></label>

                                </li>
                                <li>
                                    <input type="checkbox" name="color[]" value="grey" id="grey">
                                    <label for="blue"><a href="">Grey</a></label>

                                </li>

                                <h4>Size:</h4>

                                <li>
                                    <input type="checkbox" name="size[]" value="s" id="s">
                                    <label for="s"><a href="">S</a></label>
                                </li>
                                <li>
                                    <input type="checkbox" name="size[]" value="m" id="m">
                                    <label for="m"><a href="">M</a></label>
                                </li>
                                <li>
                                    <input type="checkbox" name="size[]" value="l" id="l">
                                    <label for="l"><a href="">L</a></label>
                                </li>
                                <li>
                                    <input type="checkbox" name="size[]" value="xl" id="xl">
                                    <label for="xl"><a href="">XL</a></label>
                                </li>
                                <li>
                                    <input type="checkbox" name="size[]" value="2xl" id="2xl">
                                    <label for="2xl"><a href="">2XL</a></label>
                                </li>
                                <button class="btn btn-outline-success mt-1 form-control" type="submit">Find</button>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
</main>
@endsection