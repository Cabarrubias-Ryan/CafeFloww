@extends('layouts/contentNavbarLayout')

@section('title', 'Store Sales')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-style1">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Admin</a>
    </li>
    <li class="breadcrumb-item active">Sales</li>
  </ol>
</nav>
<div class="row bg-white pt-2">
  <div class="col">
    <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Product</th>
          <th>Category</th>
          <th>Quantity</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($sales as $item)
        <tr>
          @if ($item->category == 'Coffee')
          <td><i class="bx bxs-coffee bx-sm text-danger me-3"></i> <span class="fw-medium">{{$item->name}}</span></td>
          @elseif($item->category == 'Iced Coffee')
          <td><i class="bx bxs-coffee-togo bx-sm text-danger me-3"></i> <span class="fw-medium">{{$item->name}}</span></td>
          @else
          <td><i class="bx bxs-cake bx-sm text-danger me-3"></i> <span class="fw-medium">{{$item->name}}</span></td>
          @endif
          <td>{{$item->category}}</td>
          <td>{{$item->quantity}}</td>
          <td>{{date('M. d, Y', strtotime($item->date))}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
    <div class="demo-inline-spacing">
      <nav aria-label="Page navigation">
         <ul class="pagination justify-content-end">
            <!-- Previous Page Link -->
            <li class="page-item {{ ($sales->onFirstPage()) ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $sales->previousPageUrl() }}" tabindex="-1">
                    <i class="tf-icon bx bx-chevron-left"></i>
                </a>
            </li>

            <!-- Page Numbers -->
            @foreach ($sales->getUrlRange(1, $sales->lastPage()) as $page => $url)
                <li class="page-item {{ ($sales->currentPage() == $page) ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            <!-- Next Page Link -->
            <li class="page-item {{ ($sales->hasMorePages()) ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $sales->nextPageUrl() }}">
                    <i class="tf-icon bx bx-chevron-right"></i>
                </a>
            </li>
         </ul>
      </nav>
   </div>
  </div>
</div>

<!--/ Card layout -->
@endsection
