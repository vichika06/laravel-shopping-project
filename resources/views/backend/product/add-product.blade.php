@extends('backend.masterDash')
@section('site-title')
Add Products
@endsection

@section('content')

<div class="content-wrapper">
    @section('page-main-title')
    Add Products
    @endsection
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl-12">
            <!-- File input -->
            <form action="{{route('submit-product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">

                    <div class="card-body">

                        <div class="row">
                            <div class="mb-3 col-6">
                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                <label for="formFile" class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" />
                            </div>

                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Quantity</label>
                                <input class="form-control" type="text" name="qty" />
                            </div>
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Regular Price</label>
                                <input class="form-control" type="number" name="regular_price" />
                            </div>
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Sale Price</label>
                                <input class="form-control" type="number" name="sale_price" />
                            </div>
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Available Size</label>
                                <select name="size[]" class="form-control size-color" multiple="multiple">
                                    <!-- multiple select -->
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                    <option value="2xl">2XL</option>
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Available Color</label>
                                <select name="color[]" class="form-control size-color" multiple="multiple">
                                    <option value="black">Black</option>
                                    <option value="white">White</option>
                                    <option value="grey">Grey</option>
                                    <option value="yellow">Yellow</option>
                                </select>
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label">Category</label>
                                <select name="category" class="form-control">
                                    @foreach ($row as $category_val )

                                    <option value="{{$category_val->id}}">{{$category_val->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="formFile" class="form-label text-danger">Recommend image size ..x.. pixels.</label>
                                <input class="form-control" type="file" name="thumbnail" />
                            </div>
                            <div class="mb-3 col-12">
                                <label for="formFile" class="form-label ">Description</label>
                                <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Add Post">
                            <input type="submit" class="btn btn-danger" value="Cancel">
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection