@extends('layouts/contentNavbarLayout')

@section('title', 'Store Cart')

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
<script src="{{ asset('assets/js/scripts/cart.js')}}"></script>
@endsection
<style>
  .is-invalid {
    border-color: red;
  }
  .invalid-feedback {
    color: red;
    font-size: 0.875em;
  }
</style>
@section('content')
<section class="h-100 h-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0">Cart</h1>
                    <h6 class="mb-0 text-muted">Items in Cart</h6>
                  </div>
                  <hr class="my-4">

                  <!-- Cart Items will be inserted here via JS -->
                  <div id="cart-items"></div>

                  <div class="pt-5">
                    <h6 class="mb-0"><a href="{{ route('store-menu') }}" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-body-tertiary">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">
                  <div id="summary"></div> <!-- Summary will be inserted here -->
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5>&#8369; <span id="total-price"></span></h5>
                  </div>

                  <form id="orderData">
                    @csrf
                    <div class="row pb-4">
                      <div class="col"><label for="payment" class="text-uppercase">Payment</label></div>
                      <div class="col"><input type="number" id="payment" name="payment" class="form-control" ></div>
                    </div>
                    <input type="hidden" name="totalamount" id="totalamount">
                    <input type="hidden" id="cartdata" name="cartdata">
                    <button type="button" id="orderBtn" class="btn btn-dark btn-block btn-lg">Order Now</button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  // Passing PHP data to JavaScript
  const cartData = @json($cart);

  // Logging the data to the console (optional)


  // Accessing and displaying cart data dynamically using JavaScript
  document.addEventListener('DOMContentLoaded', function () {
    const cartItemsContainer = document.getElementById('cart-items');
    const summaryContainer = document.getElementById('summary');
    let total = 0;

    document.getElementById('cartdata').value = JSON.stringify(cartData);
    // Loop through cartData and create HTML elements to display cart items
    cartData.forEach(item => {
      // Create HTML for each cart item
      const itemTotalPrice = (item.price * item.quantity).toFixed(2);

      const itemHtml = `
        <div class="row mb-4 d-flex justify-content-between align-items-center">
          <div class="col-md-2 col-lg-2 col-xl-2">
            <img src="${item.picture}" class="img-fluid rounded-3" alt="${item.name}">
          </div>
          <div class="col-md-3 col-lg-3 col-xl-3">
            <h6 class="text-muted">${item.name}</h6>
          </div>
          <div class="col-md-3 col-lg-3 col-xl-2 d-flex number-spinner">
            <input id="quantity-${item.id}" min="0" name="quantity" value="${item.quantity}" type="text"
                   class="form-control form-control-sm text-center" readonly />
          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
            <h6 class="mb-0">&#8369; ${itemTotalPrice}</h6>
          </div>
          <div class="col-md-1 col-lg-1 col-xl-1 text-end">
            <a href="cart/remove/${item.cart_id}" class="text-muted"><i class="bx bx-x"></i></a>
          </div>
        </div>
        <hr class="my-4">
      `;

      // Append the item HTML to the cartItemsContainer
      cartItemsContainer.innerHTML += itemHtml;

      // Add to total price calculation
      total += item.price * item.quantity;

      // Update summary information
      const summaryHtml = `
        <div class="d-flex justify-content-between mb-4">
          <h5 class="text-uppercase">${item.name}</h5>
          <h5 class="item-price">&#8369; ${itemTotalPrice}</h5>
        </div>
      `;
      summaryContainer.innerHTML += summaryHtml;
    });

    // Display the total price
    document.getElementById('total-price').textContent = total.toFixed(2);
    document.getElementById('totalamount').value = total;
  });

</script>
@endsection
