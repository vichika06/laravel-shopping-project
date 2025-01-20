@extends('backend.masterDash')

@section('site-title')
Add Category
@endsection

@section('content')
@section('site-title')
    Admin | List News
    @endsection
    @section('page-main-title')
    Add Category
    @endsection
<div class="row  p-5">
    <div class="col-xl-12">
        <!-- HTML5 Inputs -->
        <div class="card mb-4">
            <h5 class="card-header">
                @yield('site-title')
            </h5>
            <div class="card-body">
                <form action="{{route('category.submit')}}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Name : </label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="html5-text-input" name="name" />
                        </div>
                    </div>
                    <div class="mb-3 ">
                        <button type="submit" class="btn btn-outline-success">Confirm Add</button>
                        <a href="{{route('category.view')}}" class="btn btn-outline-danger ms-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection