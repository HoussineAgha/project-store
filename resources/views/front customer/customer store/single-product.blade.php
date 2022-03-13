@extends('front customer.customer store.layout.app')

@section('title', $product->name)

@section('style')
    <style>

        #navbarResponsive{
            top:175px;
        }

        .navbar{
            height: 170px;
        }
        .flexslider .slides > li{
            display: inline-flex;
        }
        .single-product .right-content span{
            color: black;
        }
        #carousel{
            display: flex;
        }
        #carousel img{
            width: 125px;
            height: 125px;
        }
    </style>
@endsection

@section('content3')

    <!-- Pre Header -->
    <div id="pre-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                @isset($store->text_top)
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M8 16a2 2 0 001.985-1.75c.017-.137-.097-.25-.235-.25h-3.5c-.138 0-.252.113-.235.25A2 2 0 008 16z"></path><path fill-rule="evenodd" d="M8 1.5A3.5 3.5 0 004.5 5v2.947c0 .346-.102.683-.294.97l-1.703 2.556a.018.018 0 00-.003.01l.001.006c0 .002.002.004.004.006a.017.017 0 00.006.004l.007.001h10.964l.007-.001a.016.016 0 00.006-.004.016.016 0 00.004-.006l.001-.007a.017.017 0 00-.003-.01l-1.703-2.554a1.75 1.75 0 01-.294-.97V5A3.5 3.5 0 008 1.5zM3 5a5 5 0 0110 0v2.947c0 .05.015.098.042.139l1.703 2.555A1.518 1.518 0 0113.482 13H2.518a1.518 1.518 0 01-1.263-2.36l1.703-2.554A.25.25 0 003 7.947V5z"></path></svg>
                <span>{{ $store->text_top }}</span>
                @endisset

                @empty($store->text_top)
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M8 16a2 2 0 001.985-1.75c.017-.137-.097-.25-.235-.25h-3.5c-.138 0-.252.113-.235.25A2 2 0 008 16z"></path><path fill-rule="evenodd" d="M8 1.5A3.5 3.5 0 004.5 5v2.947c0 .346-.102.683-.294.97l-1.703 2.556a.018.018 0 00-.003.01l.001.006c0 .002.002.004.004.006a.017.017 0 00.006.004l.007.001h10.964l.007-.001a.016.016 0 00.006-.004.016.016 0 00.004-.006l.001-.007a.017.017 0 00-.003-.01l-1.703-2.554a1.75 1.75 0 01-.294-.97V5A3.5 3.5 0 008 1.5zM3 5a5 5 0 0110 0v2.947c0 .05.015.098.042.139l1.703 2.555A1.518 1.518 0 0113.482 13H2.518a1.518 1.518 0 01-1.263-2.36l1.703-2.554A.25.25 0 003 7.947V5z"></path></svg>
                <span>This is place Top Ads</span>
                @endempty

                <div class="email">
                    @isset($store->email)
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M1.75 2A1.75 1.75 0 000 3.75v.736a.75.75 0 000 .027v7.737C0 13.216.784 14 1.75 14h12.5A1.75 1.75 0 0016 12.25v-8.5A1.75 1.75 0 0014.25 2H1.75zM14.5 4.07v-.32a.25.25 0 00-.25-.25H1.75a.25.25 0 00-.25.25v.32L8 7.88l6.5-3.81zm-13 1.74v6.441c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V5.809L8.38 9.397a.75.75 0 01-.76 0L1.5 5.809z"></path></svg><a href="mailto:.{{ $store->email }}">{{ $store->email }}</a>
                    @endisset
                    @empty($store->email)
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M1.75 2A1.75 1.75 0 000 3.75v.736a.75.75 0 000 .027v7.737C0 13.216.784 14 1.75 14h12.5A1.75 1.75 0 0016 12.25v-8.5A1.75 1.75 0 0014.25 2H1.75zM14.5 4.07v-.32a.25.25 0 00-.25-.25H1.75a.25.25 0 00-.25.25v.32L8 7.88l6.5-3.81zm-13 1.74v6.441c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V5.809L8.38 9.397a.75.75 0 01-.76 0L1.5 5.809z"></path></svg><a href="mailto:.example@gmail.com">example@gmail.com</a>
                    @endempty
                </div>
                <div class="phone">
                    @isset($store->phone)
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M3.75 0A1.75 1.75 0 002 1.75v12.5c0 .966.784 1.75 1.75 1.75h8.5A1.75 1.75 0 0014 14.25V1.75A1.75 1.75 0 0012.25 0h-8.5zM3.5 1.75a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25h-8.5a.25.25 0 01-.25-.25V1.75zM8 13a1 1 0 100-2 1 1 0 000 2z"></path></svg><a href="tel:.{{ $store->phone }}">{{ $store->phone }}</a>
                    @endisset
                    @empty($store->phone)
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20"><path fill-rule="evenodd" d="M3.75 0A1.75 1.75 0 002 1.75v12.5c0 .966.784 1.75 1.75 1.75h8.5A1.75 1.75 0 0014 14.25V1.75A1.75 1.75 0 0012.25 0h-8.5zM3.5 1.75a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25h-8.5a.25.25 0 01-.25-.25V1.75zM8 13a1 1 0 100-2 1 1 0 000 2z"></path></svg><a href="tel:.96358977"> Example : 963954871562</a>
                    @endempty
                </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top" >
          @isset($store->logo)
          <img src="{{asset($store->logo)}}" alt="" width="225px" height="150px" id="logo-customer">
          @endisset
          @empty($store->logo)
          <img src="{{asset('img\mr.jpeg')}}" alt="" width="150px" height="150px" id="logo-customer">
          @endempty

          <div class="container">
            @isset($store->adsimage)
            <a class="navbar-brand" href="{{$store->urlads}}" target="_blank"><img src="{{asset($store->adsimage)}}" alt="" width="720px" height="150px" id="logo-customer"></a>
            @endisset
            @empty($store->adsimage)
            <a class="navbar-brand" href="#" target="_blank"></a>
            @endempty

            @if (Cart::getTotalQuantity() ==null)
            <div class="cart" style="margin: 40px ; padding-top:40px;">
                  <div class="qyt">
                      {{ Cart::getTotalQuantity()}}
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 576" width='36px' height='36px'><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM272 180H316V224C316 235 324.1 244 336 244C347 244 356 235 356 224V180H400C411 180 420 171 420 160C420 148.1 411 140 400 140H356V96C356 84.95 347 76 336 76C324.1 76 316 84.95 316 96V140H272C260.1 140 252 148.1 252 160C252 171 260.1 180 272 180zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"/></svg>
          <div>
            @else
            <div class="cart" style="margin: 40px ; padding-top:40px;">
              <a href="/cart/{{$store->id}}" class="cart">
                  <div class="qyt">
                      {{ Cart::getTotalQuantity()}}
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 576" width='36px' height='36px'><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM272 180H316V224C316 235 324.1 244 336 244C347 244 356 235 356 224V180H400C411 180 420 171 420 160C420 148.1 411 140 400 140H356V96C356 84.95 347 76 336 76C324.1 76 316 84.95 316 96V140H272C260.1 140 252 148.1 252 160C252 171 260.1 180 272 180zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z"/></svg>
              </a>
          <div>
            @endif

        <span class="navbar-toggler-icon"></span>
        <div class="container">
          <a class="navbar-brand" href="#"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse " id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">

                <a class="nav-link" href="{{route('store.show',$store->id)}}">Home
                  <span class="sr-only"></span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('page.product',$store->id)}}">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
              </li>
              @auth
              <li class="nav-item">
                <a class="nav-link " href="/user/account" target="_blank">Account</a>
              </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>
  <body>

    <!-- Page Content -->
    <!-- Single Starts Here -->
    <div class="single-product">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>{{$product->name}}</h1>
            </div>
          </div>

          <div class="col-md-6">
            <div class="product-slider">
              <div id="slider" class="flexslider">
                <ul class="slides">
                  <li>
                    <img src="{{asset($product->image)}}" />
                  </li>

                  <!-- items mirrored twice, total of 12 -->
                </ul>
              </div>

              <div id="carousel" class="flexslider">
                @if ($product->gallery == null)

                @else
                @foreach ($product->gallery as $key=> $item)
                <ul class="slides">
                  <li>
                    <img src="{{asset($item)}}" width="50px" height="50px">
                  </li>
                  <!-- items mirrored twice, total of 12 -->
                </ul>
                @endforeach
                @endif
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <h2>{{$product->name}}</h2>
              <p>Shipping time :{{$product->ship}} day</p>
              @if ($product->discount)
              <h6 class="text-muted text-decoration-line-through"> price :{{$product->price}}$</h6>
              <h6> Discount :{{$product->discount}}$</h6>
              @else
              <h6> price :{{$product->price}}$</h6>
              @endif

              <p>{!!Str::limit($product->discription,500) !!}</p>
              <span>7 left on stock</span>


              <form action="/cart/{{$store->id}}" method="POST">
                  @csrf
                <label for="quantity">Quantity:</label>
                <input name="quantity" type="number" max="12" min="1" class="quantity-text" id="quantity" value="1">
                    <input type="hidden" name="id" id="id" value="{{ $product->id }}" >
                    <input type="hidden" name="name" id="name" value="{{ $product->name }}">
                    <input type="hidden" name="image" id="image" value="{{ $product->image }}">
                    @if ($product->discount)
                    <input type="hidden" name="discount" id="discount" value="{{ $product->discount }}">
                    @else
                    <input type="hidden" name="price" id="price" value="{{ $product->price }}" >
                    @endif
                <input type="submit" class="button" value="Add To Cart">
              </form>

              <div class="down-content">
                <div class="categories">
                  <h6>Category: <span><a href="#">{{$product->cat_id}} , </a>
                </div>
                <div class="share">
                  <h6>Share: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></span></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Single Page Ends Here -->
    <div class="featured-items">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <div class="line-dec"></div>
                <h1>Discription</h1>
              </div>
          </div>

          <div class="col-md-12">
              @isset($product->discription_long)
              <h6>{!! $product->discription_long !!}</h6>
              @endisset
            @empty($product->discription_long)

            @endempty
          </div>

    <!-- Similar Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <hr>
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>You May Also Like</h1>
            </div>
        </div>
        @forelse ($products as $item)
        <div class="col-md-4">
            <div class="carousel">
              <a href="/product/{{$store->id}}/{{$item->id}}">
                <div class="featured-item">
                  <img src="{{asset($item->image)}}" alt="Item 1" height="200px" width="200px">
                  <h4>{{$item->name}}</h4>
                  <h6>{{$item->price}}</h6>
                </div>
              </a>
            </div>
          </div>
        @empty

        @endforelse
        </div>
      </div>
    </div>

    <!-- Similar Ends Here -->


            <!-- Footer Starts Here -->

            <div class="footer">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="logo">
                        <img src="{{$store->logo}}" alt="" width="225px" height="150px" style="margin-bottom: 0px; ">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="footer-menu">
                        <ul>
                          <li><a href="#">Home</a></li>
                          <li><a href="#">Help</a></li>
                          <li><a href="#">Privacy Policy</a></li>
                          <li><a href="#">How It Works ?</a></li>
                          <li><a href="#">Contact Us</a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="social-icons">
                        <ul>
                            @isset($store->face)
                            <li><a href="{{$store->face}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            @endisset
                            @empty($store->face)
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            @endempty

                            @isset($store->twite)
                            <li><a href="{{$store->twite}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            @endisset
                            @empty($store->twite)
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            @endempty

                            @isset($store->linkdine)
                            <li><a href="{{$store->linkdine}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            @endisset
                            @empty($store->linkdine)
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            @endempty

                            @isset($store->youtube)
                            <li><a href="{{$store->youtube}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            @endisset
                            @empty($store->youtube)
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            @endempty
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Footer Ends Here -->


              <!-- Sub Footer Starts Here -->
              <div class="sub-footer">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="copyright-text">
                          @isset($store->text_footer)
                          <p>Copyright &copy; 2022 {{$store->text_footer}}

                            - Design With Love: <a rel="nofollow" href="#">Houssine Agha</a></p>
                          @endisset

                          @empty($store->text_footer)
                          <p>Copyright &copy; 2022 Store Name

                            - Design With Love: <a rel="nofollow" href="#">Houssine Agha</a></p>
                          @endempty

                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <script language = "text/Javascript">
                cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
                function clearField(t){                   //declaring the array outside of the
                if(! cleared[t.id]){                      // function makes it static and global
                    cleared[t.id] = 1;  // you could use true and false, but that's more typing
                    t.value='';         // with more chance of typos
                    t.style.color='#fff';
                    }
                }
            </script>
  </body>

  @endsection
