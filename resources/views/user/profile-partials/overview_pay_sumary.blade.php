<div class="col-md-3">

  <div class="portlet sale-summary">
    <div class="portlet-title">
      <div class="caption font-blue-dark sbold"> Pay Summary </div>
    </div>
    <div class="portlet-body">
      <ul class="list-unstyled">
        <li>
          <span class="sale-info"> TODAY PAID
              <i class="fa fa-img-up"></i>
          </span>
        @foreach($todayPay as $todaypay)
          @if(($user->id === $todaypay->id))
                <span class="sale-num"> ${{ $todaypay->pay }}</span>
            @endif
        @endforeach
        </li>
        <li>
          <span class="sale-info"> WEEKLY PAID
              <i class="fa fa-img-down"></i>
          </span>
          @foreach($weekPay as $weekpay)
            @if($user->id === $weekpay->id)
          <span class="sale-num"> ${{$weekpay->pay}} </span>
            @endif
          @endforeach
        </li>
        <li>
          <span class="sale-info"> TOTAL PAID  </span>
          @foreach($totalPay as $totalpay)
            @if($user->id === $totalpay->id)
          <span class="sale-num"> ${{$totalpay->pay}} </span>
            @endif
          @endforeach
        </li>
      </ul>
    </div>
  </div>
</div>