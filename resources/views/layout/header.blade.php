@php
$setting = App\Models\Setting::all();
@endphp
@foreach ($setting as $item)
<div class="top-bar2">
<div class="row " style="margin: auto;">
        <div class="col">
           <a href="tel:{{$item->phone}}"><p> <i class="fa-solid fa-phone" style="padding: 0px 10px;"></i>PHONE : {{$item->phone}}</p></a>
        </div>
        <div class="col">
            <a href="mailto:{{$item->email}}"><P><i class="fa-solid fa-envelope" style="padding: 0px 10px;"></i>EMAIL :{{$item->email}}</P></a>
        </div>
        <div class="col">
           <p> <i class="fa-brands fa-rocketchat" style="padding: 0px 10px;"></i>CHAT SUPPORT</p>
        </div>
</div>
</div>

<header class="p-3 bg-dark text-white sticky-top">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="{{$item->logo}}" class="bi me-2" width="100%" height="75px" role="img" aria-label="Bootstrap">
        </a>
@endforeach
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>
        @auth
        <div class="text-end">
        <a href="/user/logout" name='but1' class="btn btn-outline-light me-2">Log out</a>
        <a href="/user/account" name='but1' class="btn btn-warning">Account</a>
        </div>
        @endauth
        @guest
        <a href="/user/login" name='but1' class="btn btn-outline-light me-2">Log in</a>
        <a href="/user/registration" class="btn btn-warning">Sign-up</a>
        @endguest
      </div>
    </div>
  </header>

