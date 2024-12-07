@extends('backend.masterDash')

@section('site-title')
Remove Category
@endsection

@section('content')
<div class="row  mx-4 my-2">
    <div class="col-xl-12">
        <!-- HTML5 Inputs -->
        <div class="card mb-4">
            <h5 class="card-header">
                @yield('site-title')
            </h5>
            <div class="card-body">
                <h1>Are you sure you want to remove this category?</h1>
                <form action="{{route('category.submitDeleteCategory')}}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <input class="form-control" type="text" id="html5-text-input" name="remove_id" value="{{$id}}" />
                    </div>
                    <div class="mb-3 ">
                        <button type="submit" class="btn btn-outline-success">Confirm Remove</button>
                        <a href="{{route('category.view')}}" class="btn btn-outline-danger ms-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection