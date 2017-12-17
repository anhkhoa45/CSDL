<div class="col-md-3">

  <div class="portlet sale-summary">
    <div class="portlet-title">
      <div class="caption font-red sbold"><a href="#"> Sale Summary</div>
    </div>
    <div class="portlet-body">
      <ul class="list-unstyled">
        <li>
          <span class="sale-info"> TODAY SOLD
              <i class="fa fa-img-up"></i>
          </span>
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
          @endforeach
        </li>
      </ul>
    </div>
  </div>
</div>