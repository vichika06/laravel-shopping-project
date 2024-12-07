@extends('backend.masterDash')

@section('site-title')
Logout
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
                <h1>Are you sure you want to logout this category?</h1>
                <form action="{{route('submit-logout')}}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <input class="form-control" type="hidden" id="html5-text-input" name="remove_id" value="" />
                    </div>
                    <div class="mb-3 ">
                        <button type="submit" class="btn btn-outline-success">logout</button>
                        <a href="{{route('dashboard')}}" class="btn btn-outline-danger ms-2">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection