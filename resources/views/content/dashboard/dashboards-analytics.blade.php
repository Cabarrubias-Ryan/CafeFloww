@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection
<style>
  .carousel-inner {
  height: 390px; /* Fixed height for the carousel */
}

.carousel-item img {
  object-fit: cover; /* Ensures the image covers the container without distortion */
  height: 100%; /* Makes the image fill the carousel's height */
}
</style>

@section('content')

<div class="row">
  <!-- Order Statistics -->
  <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between pb-0">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Order Statistics</h5>
          <small class="text-muted">{{number_format($totalSales->total_sales,2)}} Total Sales</small>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="d-flex flex-column align-items-center gap-1">
            <h2 class="mb-2">{{$sales}}</h2>
            <span>Total Orders</span>
          </div>
          <div id="orderStatisticsChart"></div>
        </div>
        <ul class="p-0 m-0">
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-cake'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Cake</h6>
                <small class="text-muted">Sweet and yummy cake</small>
              </div>
              <div class="user-progress">
                <span class="fw-medium" id="cake">{{number_format($salesPercategory->sales_cake,2)}}</span>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-success"><i class='bx bx-coffee'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Coffee</h6>
                <small class="text-muted">Creamy and flavorful coffee</small>
              </div>
              <div class="user-progress">
                <span class="fw-medium" id="coffee">{{ number_format($salesPercategory->sales_coffee,2)}}</span>
              </div>
            </div>
          </li>
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-info"><i class='bx bx-coffee-togo'></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Iced Coffe</h6>
                <small class="text-muted">Refreshing iced coffee</small>
              </div>
              <div class="user-progress">
                <span class="fw-medium" id="iced">{{ number_format($salesPercategory->sales_iced_coffee, 2) }}</span>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ Order Statistics -->
  <div class="col-md-6 col-lg-4 order-2 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Transactions</h5>
      </div>
      <div class="card-body">
        <ul class="p-0 m-0">
          @foreach ($orderlogs as $item)
          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <img src="{{asset('assets/img/icons/unicons/cc-success.png')}}" alt="User" class="rounded">
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <small class="text-muted d-block mb-1">Cash</small>
                <h6 class="mb-0">Ordered Food</h6>
              </div>
              <div class="user-progress d-flex align-items-center gap-1">
                <h6 class="mb-0">{{ number_format($item->amount,2)}}</h6> <span class="text-muted">PESO</span>
              </div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 order-2 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Best-seller</h5>
      </div>
      <div class="card-body">
        <!-- Bootstrap Carousel -->
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{asset('/storage/uploads/photos/dZjaTeyjIvbYdYDimhJvOHOr9UkO1M0eVTplaASc.jpg')}}" class="d-block w-100" alt="First slide">
            </div>
            <div class="carousel-item">
              <img src="{{asset('/storage/uploads/photos/Yy3kAKFhekJo8jFx8YJqUfDJ7hie8beP0eLEgYYi.jpg')}}" class="d-block w-100" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img src="{{asset('/storage/uploads/photos/WyoNx8xSCYglogeMeB0soBhlkKWfpibiHdj3ZoER.jpg')}}"  class="d-block w-100" alt="Third slide">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>

</div>
<div class="row">
  <div class="col-md-12 col-lg-12 order-1 mb-4">
    <div class="card h-100">
      <div class="card-header">
        <ul class="nav nav-pills" role="tablist">
          <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tabs-line-card-income" aria-controls="navs-tabs-line-card-income" aria-selected="true">Sales</button>
          </li>
        </ul>
      </div>
      <div class="card-body px-0">
        <div class="tab-content p-0">
          <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
            <div class="d-flex p-4 pt-3">
              <div class="avatar flex-shrink-0 me-3">
                <img src="{{asset('assets/img/icons/unicons/wallet.png')}}" alt="User">
              </div>
              <div>
                <small class="text-muted d-block">Total Sale</small>
                <div class="d-flex align-items-center">
                  <h6 class="mb-0 me-1">{{number_format($totalSales->total_sales,2)}}</h6>
                </div>
              </div>
            </div>
            <div id="incomeChart"></div>
            <div class="d-flex justify-content-center pt-4 gap-2">
              <div>
                <div id="salesData"
                    data-sales='@json($salesMonth)'>
                </div>
                <p class="mb-n1 mt-1">Monthly Sales</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
