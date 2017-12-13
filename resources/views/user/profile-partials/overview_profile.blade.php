<div class="col-md-8 profile-info">
  @php
    if($user->gender === \App\User::GENDER_MALE){
      $genderIcon = 'fa-mars';
    } elseif ($user->gender === \App\User::GENDER_FEMALE) {
      $genderIcon = 'fa-venus';
    } else {
      $genderIcon = 'fa-genderless';
    }
  @endphp

  <h1 class="font-green sbold uppercase">{{ $user->name }} <i class="fa {{ $genderIcon }}"></i></h1>
  <h4> {{ $user->description }} </h4>
  <p class="list-inline"><i class="fa fa-map-marker"></i> {{ $user->address }} </p>
  <ul class="list-inline">
    <li>
      <i class="fa fa-calendar"></i> {{ $user->DOB }}
    </li>
    <li>
      <i class="fa fa-money"></i> {{ $user->balance }}
    </li>
    <li>
      <i class="fa fa-star"></i> Top Seller
    </li>
    <li>
      <i class="fa fa-heart"></i> BASE Jumping
    </li>
  </ul>
</div>