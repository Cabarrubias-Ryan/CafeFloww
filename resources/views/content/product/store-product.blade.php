@extends('layouts/contentNavbarLayout')

@section('title', 'Store Product')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-style1">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Admin</a>
    </li>
    <li class="breadcrumb-item active">Product</li>
  </ol>
</nav>
<div class="row">
  <div class="col">
    <div class="nav-align-top mb-4">
      <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true"><i class="tf-icons bx bxs-coffee me-1"></i><span class="d-none d-sm-block">Coffee</span></button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false"><i class="tf-icons bx bxs-coffee-togo me-1"></i><span class="d-none d-sm-block">Iced Cofee</span></button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-messages" aria-controls="navs-pills-top-messages" aria-selected="false"><i class="tf-icons bx bxs-cake  me-1"></i><span class="d-none d-sm-block">Cakes</span></button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
            <div class="table-responsive text-nowrap">
              <div class="py-3 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">
                  <span class="tf-icons bx bx-plus me-1"></span>Add Product
                </button>
              </div>
              <table class="table">
                <caption class="ms-4">Product</caption>
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Supplier</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><i class="bx bx-coffee bx-sm text-danger me-3"></i> <span class="fw-medium">Coffee</span></td>
                    <td>Albert Cook</td>
                    <td>
                      30
                    </td>
                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                    <td><i class="bx bx-detail bx-sm text-dark me-3"></td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><i class="bx bx-coffee bx-sm text-danger me-3"></i> <span class="fw-medium">Coffee</span></td>
                    <td>Albert Cook</td>
                    <td>
                      30
                    </td>
                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                    <td><i class="bx bx-detail bx-sm text-dark me-3"></td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><i class="bx bx-coffee bx-sm text-danger me-3"></i> <span class="fw-medium">Coffee</span></td>
                    <td>Albert Cook</td>
                    <td>
                      30
                    </td>
                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                    <td><i class="bx bx-detail bx-sm text-dark me-3"></td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><i class="bx bx-coffee bx-sm text-danger me-3"></i> <span class="fw-medium">Coffee</span></td>
                    <td>Albert Cook</td>
                    <td>
                      30
                    </td>
                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                    <td><i class="bx bx-detail bx-sm text-dark me-3"></td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                          <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          <div class="pagination justify-content-end">
            <!-- Basic Pagination -->
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item first">
                  <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                </li>
                <li class="page-item prev">
                  <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="javascript:void(0);">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0);">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0);">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0);">4</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0);">5</a>
                </li>
                <li class="page-item next">
                  <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                </li>
                <li class="page-item last">
                  <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                </li>
              </ul>
            </nav>
            <!--/ Basic Pagination -->
          </div>
        </div>

        <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
          <div class="table-responsive text-nowrap">
            <div class="py-3 d-flex justify-content-end">
              <button type="button" class="btn btn-primary" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">
                <span class="tf-icons bx bx-plus me-1"></span>Add Product
              </button>
            </div>
            <table class="table">
              <caption class="ms-4">Product</caption>
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Supplier</th>
                  <th>Quantity</th>
                  <th>Status</th>
                  <th>Details</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><i class="bx bx-coffee bx-sm text-danger me-3"></i> <span class="fw-medium">Coffee</span></td>
                  <td>Albert Cook</td>
                  <td>
                    30
                  </td>
                  <td><span class="badge bg-label-primary me-1">Active</span></td>
                  <td><i class="bx bx-detail bx-sm text-dark me-3"></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><i class="bx bx-coffee bx-sm text-danger me-3"></i> <span class="fw-medium">Coffee</span></td>
                  <td>Albert Cook</td>
                  <td>
                    30
                  </td>
                  <td><span class="badge bg-label-primary me-1">Active</span></td>
                  <td><i class="bx bx-detail bx-sm text-dark me-3"></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><i class="bx bx-coffee bx-sm text-danger me-3"></i> <span class="fw-medium">Coffee</span></td>
                  <td>Albert Cook</td>
                  <td>
                    30
                  </td>
                  <td><span class="badge bg-label-primary me-1">Active</span></td>
                  <td><i class="bx bx-detail bx-sm text-dark me-3"></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><i class="bx bx-coffee bx-sm text-danger me-3"></i> <span class="fw-medium">Coffee</span></td>
                  <td>Albert Cook</td>
                  <td>
                    30
                  </td>
                  <td><span class="badge bg-label-primary me-1">Active</span></td>
                  <td><i class="bx bx-detail bx-sm text-dark me-3"></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="pagination justify-content-end">
            <!-- Basic Pagination -->
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item first">
                  <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                </li>
                <li class="page-item prev">
                  <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="javascript:void(0);">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0);">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0);">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0);">4</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0);">5</a>
                </li>
                <li class="page-item next">
                  <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                </li>
                <li class="page-item last">
                  <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                </li>
              </ul>
            </nav>
            <!--/ Basic Pagination -->
          </div>
        </div>
        <div class="tab-pane fade" id="navs-pills-top-messages" role="tabpanel">
          <div class="table-responsive text-nowrap">
            <div class="py-3 d-flex justify-content-end">
              <button type="button" class="btn btn-primary" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">
                <span class="tf-icons bx bx-plus me-1"></span>Add Product
              </button>
            </div>
            <table class="table">
              <caption class="ms-4">Product</caption>
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Supplier</th>
                  <th>Quantity</th>
                  <th>Status</th>
                  <th>Details</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><i class="bx bx-coffee bx-sm text-danger me-3"></i> <span class="fw-medium">Coffee</span></td>
                  <td>Albert Cook</td>
                  <td>
                    30
                  </td>
                  <td><span class="badge bg-label-primary me-1">Active</span></td>
                  <td><i class="bx bx-detail bx-sm text-dark me-3"></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><i class="bx bx-coffee bx-sm text-danger me-3"></i> <span class="fw-medium">Coffee</span></td>
                  <td>Albert Cook</td>
                  <td>
                    30
                  </td>
                  <td><span class="badge bg-label-primary me-1">Active</span></td>
                  <td><i class="bx bx-detail bx-sm text-dark me-3"></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><i class="bx bx-coffee bx-sm text-danger me-3"></i> <span class="fw-medium">Coffee</span></td>
                  <td>Albert Cook</td>
                  <td>
                    30
                  </td>
                  <td><span class="badge bg-label-primary me-1">Active</span></td>
                  <td><i class="bx bx-detail bx-sm text-dark me-3"></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><i class="bx bx-coffee bx-sm text-danger me-3"></i> <span class="fw-medium">Coffee</span></td>
                  <td>Albert Cook</td>
                  <td>
                    30
                  </td>
                  <td><span class="badge bg-label-primary me-1">Active</span></td>
                  <td><i class="bx bx-detail bx-sm text-dark me-3"></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="pagination justify-content-end">
            <!-- Basic Pagination -->
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item first">
                  <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-left"></i></a>
                </li>
                <li class="page-item prev">
                  <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="javascript:void(0);">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0);">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0);">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0);">4</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0);">5</a>
                </li>
                <li class="page-item next">
                  <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                </li>
                <li class="page-item last">
                  <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevrons-right"></i></a>
                </li>
              </ul>
            </nav>
            <!--/ Basic Pagination -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="backDropModalTitle">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="product" class="form-label">Product Name</label>
            <input type="text" id="product" class="form-control" placeholder="Enter Name">
          </div>
        </div>
        <div class="row g-2 pt-2">
          <div class="col mb-0">
            <label for="productcode" class="form-label">Product code</label>
            <input type="text" id="productcode" class="form-control" placeholder="Enter Product Code">
          </div>
          <div class="col mb-0">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" id="quantity" class="form-control">
          </div>
        </div>
        <div class="row pt-2">
          <div class="col mb-3">
            <label for="supplier" class="form-label">Supplier</label>
            <input type="text" id="supplier" class="form-control" placeholder="Enter Supplier">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>

<!--/ Card layout -->
@endsection
