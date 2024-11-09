@extends('layouts/contentNavbarLayout')

@section('title', 'Store Menu')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
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
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/2.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/13.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/4.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/18.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/19.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/20.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
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
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
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
        <div class="navbar-nav align-items-left py-md-3">
          <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search...">
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/2.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/13.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/4.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/18.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/19.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/20.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
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
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
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
        <div class="navbar-nav align-items-left py-md-3">
          <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search...">
          </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/2.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/13.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/4.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/18.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/19.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-60">
              <img class="card-img-top" src="{{asset('assets/img/elements/20.jpg')}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-center">Card title</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                  <span class="tf-icons bx bxs-cart-add me-1"></span>Order
                </button>
              </div>
            </div>
          </div>
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
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="javascript:void(0);">2</a>
              </li>
              <li class="page-item active">
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
<!-- Add to cart modal-->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Product NAME</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <img class="img-fluid d-flex mx-auto my-4 rounded" src="{{asset('assets/img/elements/4.jpg')}}" alt="Card image cap" style="object-fit: cover; height: 400px;" />
          <div class="d-flex justify-content-left" style="margin-left: 50px; margin-bottom: 15px;">
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item active">
                  <input type="button" value="S" class="page-link">
                </li>
                <li class="page-item">
                  <input type="button" value="M" class="page-link">
                </li>
                <li class="page-item">
                  <input type="button" value="L" class="page-link">
                </li>
              </ul>
            </nav>
          </div>
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
        <button type="button" class="btn btn-primary">
          <span class="tf-icons bx bxs-cart-add me-1"></span>Add to Cart
        </button>
      </div>
    </div>
  </div>
</div>
@endsection
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
  $(document).ready(function() {
    $(document).on('click', '.number-spinner button', function () {
      var btn = $(this),
          oldValue = btn.closest('.number-spinner').find('input').val().trim(),
          newVal = 0;

      if (btn.attr('data-dir') == 'up') {
        newVal = parseInt(oldValue) + 1;
      } else {
        newVal = Math.max(parseInt(oldValue) - 1, 1); // Ensure value does not go below 1
      }
      btn.closest('.number-spinner').find('input').val(newVal);
    });
  });
</script>
