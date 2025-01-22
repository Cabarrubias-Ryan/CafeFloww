@extends('layouts/contentNavbarLayout')

@section('title', 'Store Suppliers')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
<script src="{{ asset('assets/js/scripts/supplier.js')}}"></script>
@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-style1">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Admin</a>
    </li>
    <li class="breadcrumb-item active">Suppliers</li>
  </ol>
</nav>
<div class="row">
  <div class="col">
    <div class="card px-4 py-4">
      <div class="table-responsive text-nowrap">
        <div class="card-header py-3 d-flex justify-content-end">
          <button type="button" class="btn btn-primary" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">
            <span class="tf-icons bx bx-plus me-1"></span>Add Supplier
          </button>
        </div>
        <table class="table">
          <caption class="ms-4">Supplier</caption>
          <thead>
            <tr>
              <th>Name</th>
              <th>Address</th>
              <th>Phone Number</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($supplier as $data)
            <tr>
              <td>{{ $data->name}}</td>
              <td>{{ $data->phone}}</td>
              <td>{{ $data->address}}</td>
              <td>{{ $data->description}}</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                  <div class="dropdown-menu">
                    <button class="dropdown-item edit-btn" id="edit-btn" data-bs-toggle="modal" data-bs-target="#EditModal" data-id="{{ $data->id }}" data-name="{{ $data->name }}" data-phone="{{ $data->phone }}" data-address="{{ $data->address }}" data-description="{{ $data->description }}">
                      <i class="bx bx-edit-alt me-1"></i> Edit
                    </button>
                    <form class="d-inline">
                      @csrf
                      <button type="button" class="dropdown-item delete-person" onclick="confirmDelete({{ $data->id}})"><i class="bx bx-trash me-1"></i> Delete</button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      <div class="demo-inline-spacing">
        <nav aria-label="Page navigation">
           <ul class="pagination justify-content-end">
              <!-- Previous Page Link -->
              <li class="page-item {{ ($supplier->onFirstPage()) ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $supplier->previousPageUrl() }}" tabindex="-1">
                      <i class="tf-icon bx bx-chevron-left"></i>
                  </a>
              </li>

              <!-- Page Numbers -->
              @foreach ($supplier->getUrlRange(1, $supplier->lastPage()) as $page => $url)
                  <li class="page-item {{ ($supplier->currentPage() == $page) ? 'active' : '' }}">
                      <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                  </li>
              @endforeach

              <!-- Next Page Link -->
              <li class="page-item {{ ($supplier->hasMorePages()) ? '' : 'disabled' }}">
                  <a class="page-link" href="{{ $supplier->nextPageUrl() }}">
                      <i class="tf-icon bx bx-chevron-right"></i>
                  </a>
              </li>
           </ul>
        </nav>
     </div>
    </div>
  </div>
</div>

{{-- Insert Modal --}}
<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" id="supplierForm">
      @csrf
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <h5 class="modal-title text-center" id="backDropModalTitle">Supplier</h5>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="supplier" class="form-label">Supplier Name</label>
            <input type="text" id="supplier" name="supplier" class="form-control" placeholder="Enter supplier name">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="phonenumber" class="form-label">Phone Number</label>
            <input type="text" id="phonenumber" name="phonenumber" class="form-control" placeholder="Enter phone number">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="Enter address">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="description" class="form-label">Description</label>
            <div class="input-group input-group-merge form-send-message">
              <textarea class="form-control message-input" name="description" id="description" placeholder="Say it" rows="4"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="saveBtn" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>
{{-- Edit Modal --}}

<div class="modal fade" id="EditModal" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" id="editSupplierForm">
      @csrf
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <h5 class="modal-title text-center" id="backDropModalTitle">Supplier</h5>
      <div class="modal-body">
        <div class="row">
          <input type="hidden" id="Edit_supplier_id" name="Edit_supplier_id">
          <div class="col mb-3">
            <label for="supplier" class="form-label">Supplier Name</label>
            <input type="text" id="Edit_supplier" name="Edit_supplier" class="form-control" placeholder="Enter supplier name">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="phonenumber" class="form-label">Phone Number</label>
            <input type="text" id="Edit_phonenumber" name="Edit_phonenumber" class="form-control" placeholder="Enter phone number">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="Edit_address" id="Edit_address" class="form-control" placeholder="Enter address">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="description" class="form-label">Description</label>
            <div class="input-group input-group-merge form-send-message">
              <textarea class="form-control message-input" name="Edit_description" id="Edit_description" placeholder="Say it" rows="4"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="editSaveBtn" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>

<!--/ Card layout -->
@endsection
