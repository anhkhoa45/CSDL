<div class="col-md-3">
  <div class="portlet sale-summary">
    <div class="portlet-title">
<<<<<<< HEAD
<<<<<<< HEAD
      <div class="caption font-red sbold"> Pay Summary</div>
=======
      <div class="caption font-red sbold"><a href="#"> Sale Summary</div>
>>>>>>> e732d846422fd6cde3e60ec06b44e7c2addb8725
=======
      <div class="caption font-red-haze sbold"> Sale Summary </div>
>>>>>>> 2f51ccdd072821b88d1b3f44600a424f5b7bbd4c
    </div>
    <div class="portlet-body">
      <ul class="list-unstyled">
        <li>
          <span class="sale-info"> TODAY PAID
              <i class="fa fa-img-up"></i>
          </span>
<<<<<<< HEAD
        @foreach($todayPay as $todaypay)
          <span class="sale-num"> ${{$todaypay->pay}}</span>
        @endforeach
        </li>
        <li>
          <span class="sale-info"> WEEKLY PAID
              <i class="fa fa-img-down"></i>
          </span>
          @foreach($weekPay as $weekpay)
          <span class="sale-num"> ${{$weekpay->pay}} </span>
          @endforeach
        </li>
        <li>
          <span class="sale-info"> TOTAL PAID  </span>
          @foreach($totalPay as $totalpay)
          <span class="sale-num"> ${{$totalpay->pay}} </span>
=======
        @foreach($todaySale as $todaysale)
          @if($user->id === $todaysale->id)
            <span class="sale-num"> ${{$todaysale->sale}}</span>
            @endif
        @endforeach
        </li>
        <li>
          <span class="sale-info"> WEEKLY SOLD
              <i class="fa fa-img-down"></i>
          </span>
          @foreach($weekSale as $weeksale)
            @if($user->id === $weeksale->id)
              <span class="sale-num"> ${{$weeksale->sale}}</span>
            @endif
          @endforeach
        </li>
        <li>
          <span class="sale-info"> TOTAL SOLD </span>
          @foreach($totalSale as $totalsale)
            @if($user->id === $totalsale->id)
              <span class="sale-num"> ${{$totalsale->sale}}</span>
            @endif
>>>>>>> e732d846422fd6cde3e60ec06b44e7c2addb8725
          @endforeach
        </li>
      </ul>
    </div>
  </div>
</div>