@extends('backend.masterDash');
@section('site-litle')
View Logo
@endsection
@section('content')

<div class="content-wrapper">

    @section('page-main-title')
    List Logo
    @endsection

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($logo as $row )

                        <tr>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <img src="/assets/image/{{$row->thumbnail}}" alt="Avatar" style="width: 100px">
                                </ul>
                            </td>
                            <td><span class="badge bg-label-success me-1">{{$row->name}}</span></td>
                            <td><span class="badge bg-label-primary me-1">{{$row->created_at}}</span></td>
                            <td><span class="badge bg-label-primary me-1">{{$row->updated_at}}</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" id="remove-post-key" data-value="" data-bs-toggle="modal" data-bs-target="#basicModal" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
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
            <form action="/admin/delete-logo-submit" method="post">
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
</div>

@endsection