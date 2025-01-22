@extends('layouts/contentNavbarLayout')

@section('title', 'Store Menu')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
<script src="{{ asset('assets/js/scripts/storemenu.js')}}"></script>
@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-style1">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Admin</a>
    </li>
    <li class="breadcrumb-item active">Menu</li>
  </ol>
</nav>
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
        <div class="navbar-nav align-items-left py-md-3">
          <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search...">
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
          @foreach ($productCoffee as $item)
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{$item->picture}}" alt="Card image cap" style="width: 100%; height: auto;"/>
              <div class="card-body">
                <h5 class="card-title text-center">{{$item->name}}</h5>
                <div class="mb-2 text-center">
                  <span>&#8369;{{ number_format( $item->price,2)}}</span>
                </div>
                <button type="button" class="btn btn-primary menu-btn" id="menu-btn" data-bs-toggle="modal" data-bs-target="#modalCenter"  data-id="{{ $item->id }}" data-name="{{ $item->name }}"  data-price="{{ $item->price }}" data-picture="{{ $item->picture }}">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          @endforeach
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
        <div class="navbar-nav align-items-left py-md-3">
          <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search...">
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
          @foreach ($productIcedCoffee as $item)
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset($item->picture)}}" alt="Card image cap" style="width: 100%; height: auto;"/>
              <div class="card-body">
                <h5 class="card-title text-center">{{$item->name}}</h5>
                <div class="mb-2 text-center">
                  <span>&#8369;{{ number_format( $item->price,2)}}</span>
                </div>
                <button type="button" class="btn btn-primary menu-btn" id="menu-btn" data-bs-toggle="modal" data-bs-target="#modalCenter" data-id="{{ $item->id }}" data-name="{{ $item->name }}"  data-price="{{ $item->price }}" data-picture="{{ $item->picture }}"  >
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          @endforeach
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
        <div class="navbar-nav align-items-left py-md-3">
          <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search...">
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
          @foreach ($productCake as $item)
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset($item->picture)}}" alt="product" style="width: 100%; height: auto;" />
              <div class="card-body">
                <h5 class="card-title text-center">{{$item->name}}</h5>
                <div class="mb-2 text-center">
                  <span>&#8369; {{ number_format( $item->price,2)}}</span>
                </div>
                <button type="button" class="btn btn-primary menu-btn" id="menu-btn" data-bs-toggle="modal" data-bs-target="#modalCenter"  data-id="{{ $item->id }}" data-name="{{ $item->name }}"  data-price="{{ $item->price }}" data-picture="{{ $item->picture }}">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          @endforeach
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
<!-- Add to cart modal-->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ><span id="productName"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <img class="img-fluid d-flex mx-auto my-4 rounded" alt="Card image cap" style="object-fit: cover; height: 400px;" id="productPicture" />
          <div class="col-xl-6 d-flex mx-auto">
            <div class="input-group number-spinner">
              <button class="btn btn-primary" data-dir="dwn">
                <span class="tf-icons bx bx-minus me-1"></span>
              </button>
              <input type="text" class="form-control form-control-sm text-center" value="1" aria-label="Number input">
              <button class="btn btn-primary" data-dir="up">
                <span class="tf-icons bx bx-plus me-1"></span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <form id="addtoCart" action="{{ route('store-add-cart') }}" method="post">
          @csrf
          <input type="hidden" id="productId" name="productId">
          <input type="hidden" id="productQuantity" name="productQuantity">
          <input type="submit" class="btn btn-primary" value="Add to Cart">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
