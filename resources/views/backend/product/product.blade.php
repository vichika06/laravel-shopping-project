@extends('backend.masterDash')
@section('site-title')
Products
@endsection

@section('content')

<div class="content-wrapper">
    @section('site-title')
    Admin | List Post
    @endsection
    @section('page-main-title')
    List Products
    @endsection

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Regular Price</th>
                            <th>Sale Price</th>
                            <th>Category</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Viewer</th>
                            <th>Author</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($product as $row)

                        <tr>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <img src="/assets/image/{{$row->thumbnail}}" alt="Avatar" class="rounded-circle"
                                        style="width: 50px;
                                object-fit: cover;
                                border-radius: 0px !important;
                            ">
                                </ul>
                            </td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$row->name}}</strong></td>
                            <td>{{$row->qty}}</td>
                            <td>{{$row->regular_price}}</td>
                            <td>{{$row->sale_price}}</td>
                            <td><span class="badge bg-label-success me-1">{{$row-> cat_name}}</span></td>
                            <td><span class="badge bg-label-primary me-1">{{$row->color}}</span></td>
                            <td><span class="badge bg-label-primary me-1">{{$row->size}}</span></td>
                            <td>{{$row->views}}</td>
                            <td><span class="badge bg-label-warning me-1">{{$row-> user_name}}</span></td>

                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('edit_product',['id'=>$row->id , 'category_id'=>$row->category_id ])}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" id="remove-post-key" data-value="1" data-bs-toggle="modal" data-bs-target="#basicModal" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">
            <form action="{{route('remove-product')}}" method="post">
                @csrf
                <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Are you sure to remove this post?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" id="remove-val" name="remove_id">
                                <button type="submit" class="btn btn-danger">Confirm</button>
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>

        <hr class="my-5" />
    </div>
    <!-- / Content -->
</div>

@endsection