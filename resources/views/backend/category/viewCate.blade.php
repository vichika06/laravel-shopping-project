@extends('backend.masterDash')

@section('site-title')
View Category
@endsection

@section('content')

<div class="row p-5">
    <div class="card">
        <h5 class="card-header">
            @yield('site-title')
        </h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated at</th>

                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($row as $category)
                    <tr>
                        <td>{{$category -> id}}</td>
                        <td>{{$category -> name}}</td>
                        <td>{{$category -> created_at}}</td>
                        <td>{{$category -> updated_at}}</td>

                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('category.edit',['id'=>$category->id])}}"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);" data-value="{{$category -> id}}" data-bs-toggle="modal" data-bs-target="#basicModal" id="remove-post-key"><i class="bx bx-trash me-1"></i>
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6">
            <!-- <small class="text-light fw-semibold">Default</small> -->
            <div class="mt-3">
                <!-- Button trigger modal -->
                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    Launch modal
                </button> -->

                <!-- Modal -->
                <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Are u sure to remove this post?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <form action="{{route('category.submitDeleteCategory')}}" method="post">
                                    @csrf
                                    <input type="hidden" id="remove-val" name="remove_id">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection