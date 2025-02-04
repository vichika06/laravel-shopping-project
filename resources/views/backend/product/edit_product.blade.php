@extends('backend.masterDash')
@section('site-title')
EDITING PRODUCT
@endsection

@section('content')

<div class="content-wrapper">
    @section('page-main-title')
    Edit Products
    @endsection
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl-12">
            <!-- File input -->
            <form action="{{route('submit_Edit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">

                    <div class="card-body">

                        <div class="row">
                            <div class="mb-3 col-6">
                                <!-- <input type="hidden" name="update_id" value="{{ Auth::user()->id }}"> -->
                                <input type="hidden" name="update_id" value="{{$products[0]->id}}">
                                <label for="formFile" class="form-label">Name</label>
                                <input class="form-control" type="text" value="{{$products[0]->name}}" name="update_name" />
                            </div>

                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Quantity</label>
                                <input class="form-control" type="text" value="{{$products[0]->qty}}" name="update_qty" />
                            </div>
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Regular Price</label>
                                <input class="form-control" type="number" value="{{$products[0]->regular_price}}" name="update_regular_price" />
                            </div>
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Sale Price</label>
                                <input class="form-control" type="number" value="{{$products[0]->sale_price}}" name="update_sale_price" />
                            </div>
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Available Size</label>
                                <select name="update_size[]" class="form-control size-color" multiple="multiple">
                                    @php
                                    $selectSize = explode(',', $products[0]->size);
                                    @endphp

                                    <option value="s" {{ in_array('s', $selectSize) ? 'selected' : ''}}>S</option>
                                    <option value="m" {{ in_array('m', $selectSize) ? 'selected' : ''}}>M</option>
                                    <option value="l" {{ in_array('l', $selectSize) ? 'selected' : ''}}>L</option>
                                    <option value="xl" {{ in_array('xl', $selectSize) ? 'selected' : ''}}>XL</option>
                                    <option value="2xl" {{ in_array('2xl', $selectSize) ? 'selected' : ''}}>2XL</option>
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Available Color</label>
                                <select name="update_color[]" class="form-control size-color" multiple="multiple">
                                    @php
                                    $selectColor = explode(',', $products[0]->color);
                                    @endphp

                                    <option value="black" {{ in_array('black', $selectColor) ? 'selected' : '' }}>Black</option>
                                    <option value="yellow" {{ in_array('yellow', $selectColor) ? 'selected' : '' }}>Yellow</option>
                                    <option value="white" {{ in_array('white', $selectColor) ? 'selected' : '' }}>White</option>
                                    <option value="blue" {{ in_array('blue', $selectColor) ? 'selected' : '' }}>Blue</option>
                                </select>
                            </div>

                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Category</label>

                                <select name="update_category" class="form-control">
                                    @foreach ($category as $cat)
                                    <option value="{{$cat -> id}}" @selected($cat->id == $products[0]->category_id)>{{$cat -> name}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label text-danger">Recommend image size ..x.. pixels.</label>
                               

                                <input class="form-control" type="file" name="update_thumbnail" />
                                <input type="text" name="old-thumbnail" value="{{$products[0] -> thumbnail}}">

                            </div>
                            <div class="mb-3 col-12">
                                <label for="formFile" class="form-label ">Description</label>
                                <textarea name="update_description" class="form-control" cols="30" rows="10">{{$products[0]->description}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Confirm Edit">
                            <input type="submit" class="btn btn-danger" value="Cancel">
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection