@extends('layouts/contentNavbarLayout')

@section('title', 'Store Product')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
<script src="{{ asset('assets/js/scripts/product.js')}}"></script>
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
                    <th>Product Code</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($productCoffee as $coffee)
                  <tr>
                    <td><i class="bx bx-coffee bx-sm text-danger me-3"></i> <span class="fw-medium">{{ $coffee->name }}</span></td>
                    <td>{{$coffee->fullname}}</td>
                    <td>{{ $coffee->product_code}}</td>
                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <button class="dropdown-item edit-btn" id="editBtn" data-bs-toggle="modal" data-bs-target="#editProduct"
                          data-id="{{$coffee->id}}" data-name="{{ $coffee->name}}" data-code="{{$coffee->product_code}}" data-price="{{ $coffee->price}}" data-description="{{ $coffee->description}}" data-category="{{ $coffee->category}}" data-picture="{{ $coffee->picture}}">
                            <i class="bx bx-edit-alt me-1"></i> Edit
                          </button>
                          <form id class="d-inline"  >
                            <button type="button" class="dropdown-item delete-person" onclick="confirmDelete({{$coffee->id}})"><i class="bx bx-trash me-1"></i> Delete</button>
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
                    <li class="page-item {{ ($productCoffee->onFirstPage()) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $productCoffee->previousPageUrl() }}" tabindex="-1">
                            <i class="tf-icon bx bx-chevron-left"></i>
                        </a>
                    </li>

                    <!-- Page Numbers -->
                    @foreach ($productCoffee->getUrlRange(1, $productCoffee->lastPage()) as $page => $url)
                        <li class="page-item {{ ($productCoffee->currentPage() == $page) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <!-- Next Page Link -->
                    <li class="page-item {{ ($productCoffee->hasMorePages()) ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $productCoffee->nextPageUrl() }}">
                            <i class="tf-icon bx bx-chevron-right"></i>
                        </a>
                    </li>
                 </ul>
              </nav>
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
                  <th>Product Code</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($productIcedCoffee as $icedCoffe)
                <tr>
                  <td><i class="bx bxs-coffee-togo bx-sm text-danger me-3"></i> <span class="fw-medium">{{ $icedCoffe->name }}</span></td>
                  <td>{{ $icedCoffe->fullname }}</td>
                  <td>{{ $icedCoffe->product_code }}</td>
                  <td><span class="badge bg-label-primary me-1">Active</span></td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                        <button class="dropdown-item edit-btn" id="editBtn" data-bs-toggle="modal" data-bs-target="#editProduct"
                          data-id="{{$icedCoffe->id}}" data-name="{{ $icedCoffe->name}}" data-code="{{$icedCoffe->product_code}}" data-price="{{ $icedCoffe->price}}" data-description="{{ $icedCoffe->description}}" data-category="{{ $icedCoffe->category}}" data-picture="{{ $icedCoffe->picture}}">
                          <i class="bx bx-edit-alt me-1"></i> Edit
                        </button>
                        <form method="POST" class="d-inline"  >
                          @csrf
                          <button type="button" class="dropdown-item delete-person" onclick="confirmDelete({{ $icedCoffe->id}})"><i class="bx bx-trash me-1"></i> Delete</button>
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
                  <li class="page-item {{ ($productIcedCoffee->onFirstPage()) ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $productIcedCoffee->previousPageUrl() }}" tabindex="-1">
                          <i class="tf-icon bx bx-chevron-left"></i>
                      </a>
                  </li>

                  <!-- Page Numbers -->
                  @foreach ($productIcedCoffee->getUrlRange(1, $productIcedCoffee->lastPage()) as $page => $url)
                      <li class="page-item {{ ($productIcedCoffee->currentPage() == $page) ? 'active' : '' }}">
                          <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                      </li>
                  @endforeach

                  <!-- Next Page Link -->
                  <li class="page-item {{ ($productIcedCoffee->hasMorePages()) ? '' : 'disabled' }}">
                      <a class="page-link" href="{{ $productIcedCoffee->nextPageUrl() }}">
                          <i class="tf-icon bx bx-chevron-right"></i>
                      </a>
                  </li>
               </ul>
            </nav>
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
                  <th>Product Code</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($productCake as $cake)
                  <tr>
                    <td><i class="bx bx-cake bx-sm text-danger me-3"></i> <span class="fw-medium">{{ $cake->name}}</span></td>
                    <td>{{ $cake->fullname}}</td>
                    <td>{{ $cake->product_code}}</td>
                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">
                          <button class="dropdown-item edit-btn" id="editBtn" data-bs-toggle="modal" data-bs-target="#editProduct"
                            data-id="{{$cake->id}}" data-name="{{ $cake->name}}" data-code="{{$cake->product_code}}" data-price="{{ $cake->price}}" data-description="{{ $cake->description}}" data-category="{{ $cake->category}}" data-picture="{{ $cake->picture}}">
                            <i class="bx bx-edit-alt me-1"></i> Edit
                          </button>
                          <form action="" method="POST" class="d-inline"  >
                            @csrf
                            <button type="button" class="dropdown-item delete-person" onclick="confirmDelete({{ $cake->id}})"><i class="bx bx-trash me-1"></i> Delete</button>
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
                  <li class="page-item {{ ($productCake->onFirstPage()) ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $productCake->previousPageUrl() }}" tabindex="-1">
                          <i class="tf-icon bx bx-chevron-left"></i>
                      </a>
                  </li>

                  <!-- Page Numbers -->
                  @foreach ($productCake->getUrlRange(1, $productCake->lastPage()) as $page => $url)
                      <li class="page-item {{ ($productCake->currentPage() == $page) ? 'active' : '' }}">
                          <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                      </li>
                  @endforeach

                  <!-- Next Page Link -->
                  <li class="page-item {{ ($productCake->hasMorePages()) ? '' : 'disabled' }}">
                      <a class="page-link" href="{{ $productCake->nextPageUrl() }}">
                          <i class="tf-icon bx bx-chevron-right"></i>
                      </a>
                  </li>
               </ul>
            </nav>
         </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" id="productForm">
      @csrf
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="modal-title text-center" id="backDropModalTitle">Product</h5>
        <div class="row">
          <div class="col mb-3">
            <div class="mb-4 d-flex justify-content-center">
                <img id="selectedImage" src="{{asset('assets/img/logo/logo.png')}}"
                alt="example placeholder" style="width: 300px;" />
            </div>
            <div class="d-flex justify-content-center">
                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                    <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                    <input type="file" name="picture" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="product" class="form-label">Product Name</label>
            <input type="text" id="product" name="product" class="form-control" placeholder="Enter Name">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="product" class="form-label">Category</label>
            <select name="category" class="form-control" id="category">
              <option value="" selected disabled>--Select category--</option>
              <option value="Cake">Cake</option>
              <option value="Iced Coffee">Iced Coffee</option>
              <option value="Coffee">Coffee</option>
            </select>
          </div>
        </div>
        <div class="row g-2 pt-2">
          <div class="col mb-0">
            <label for="productcode" class="form-label">Product code</label>
            <input type="text" id="productcode" name="productcode" class="form-control" placeholder="Enter Product Code">
          </div>
          <div class="col mb-0">
            <label for="price" class="form-label">Price</label>
            <input type="number" placeholder="Enter price" id="price" name="price" class="form-control">
          </div>
        </div>
        <div class="row pt-2">
          <div class="col mb-3">
            <label for="supplier" class="form-label">Supplier</label>
            <select name="supplier" id="supplier" class="form-control">
              <option value="" selected disabled>--Select supplier--</option>
              @foreach ($supplier as $item)
              <option value="{{ $item->id}}">{{ $item->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Say it"></textarea>
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
<!--/ Card layout -->

<div class="modal fade" id="editProduct" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" id="Edit_productForm">
      @csrf
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="modal-title text-center" id="backDropModalTitle">Product</h5>
        <div class="row">
          <div class="col mb-3">
            <div class="mb-4 d-flex justify-content-center">
                <img id="Edit_selectedImage"
                alt="example placeholder" style="width: 300px;" />
            </div>
            <div class="d-flex justify-content-center">
                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                    <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                    <input type="file" name="edit_picture" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'Edit_selectedImage')" />
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="product" class="form-label">Product Name</label>
            <input type="hidden" id="Edit_product_id" name="edit_id" class="form-control">
            <input type="text" id="Edit_product" name="edit_product" class="form-control" placeholder="Enter Name">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="product" class="form-label">Category</label>
            <select name="edit_category" class="form-control" id="Edit_category">
              <option value="" selected disabled>--Select category--</option>
              <option value="Cake">Cake</option>
              <option value="Iced Coffee">Iced Coffee</option>
              <option value="Coffee">Coffee</option>
            </select>
          </div>
        </div>
        <div class="row g-2 pt-2">
          <div class="col mb-0">
            <label for="productcode" class="form-label">Product code</label>
            <input type="text" id="Edit_productcode" name="edit_productcode" class="form-control" placeholder="Enter Product Code">
          </div>
          <div class="col mb-0">
            <label for="price" class="form-label">Price</label>
            <input type="number" placeholder="Enter price" id="Edit_price" name="edit_price" class="form-control">
          </div>
        </div>
        <div class="row mt-3">
          <div class="col mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="edit_description" id="Edit_description" class="form-control" rows="4" placeholder="Say it"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="editProductBtn" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>
@endsection
