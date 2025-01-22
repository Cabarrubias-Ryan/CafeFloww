<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Receipt</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      margin: 0;
      padding: 0;
      background-color: #fff;
      color: #000;
    }
    .dashed {
      border-top: 1px dashed #000;
      margin: 10px 0;
    }
    .line {
      display: flex;
      justify-content: space-between;
      margin: 5px 0;
    }
    .line span {
      display: inline-block;
      vertical-align: middle; /* Ensures proper vertical alignment */
    }
    .line span:last-child {
      text-align: right;
      min-width: 100%;
    }
    .total {
      font-weight: bold;
      margin-top: 10px;
    }
    h1, h2, h4 {
      text-align: center;
      margin: 5px 0;
    }
    .date {
      text-align: center;
      display: block;
      margin-bottom: 10px;
      font-size: 12px;
    }
  </style>
</head>
<body>

  <div class="receipt">
    <h1>CafeFlow</h1>
    <div class="dashed"></div>
    <h2>RECEIPT</h2>
    <span class="date">{{ date('M. d, Y', strtotime($orderDetails['date'])) }}</span>
    <div class="dashed"></div>

    <!-- Items -->
    @foreach ($productDetails as $item)
    <div class="line">
      <span>{{ $item['quantity'] }}x {{ $item['product'] }}</span>
      <span style="margin-top: -14px">{{ number_format($item['quantity'] * $item['price'], 2) }}</span>
    </div>
    @endforeach

    <div class="dashed"></div>

    <!-- Totals -->
    <div class="line total">
      <span>TOTAL AMOUNT</span>
      <span style="margin-top: -14px">{{ number_format($orderDetails['amount'], 2) }}</span>
    </div>
    <div class="dashed"></div>
    <div class="line">
      <span>CASH</span>
      <span style="margin-top: -14px">{{ number_format($orderDetails['cash'], 2) }}</span>
    </div>
    <div class="line">
      <span>CHANGE</span>
      <span style="margin-top: -14px">{{ number_format($orderDetails['change'], 2) }}</span>
    </div>

    <div class="dashed"></div>
    <h4>THANK YOU</h4>
    <div class="dashed"></div>
  </div>

</body>
</html>
