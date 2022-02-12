@extends('front customer.customer store.layout.app')

@section('title','All Products')

@section('style')
    <style>
        .d-flex h5{
            margin-right: 40px;
        }
        .bg-black{
            margin-top: 20px;
        }
        .pagination {
            margin-top: 35px;
            padding-right: 50%;
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
          <img src="{{asset($store->logo)}}" alt="" width="225px" height="75px" id="logo-customer">
          @endisset
          @empty($store->logo)
          <img src="{{asset('img\mr.jpeg')}}" alt="" width="150px" height="75px" id="logo-customer">
          @endempty

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

  <body>

    <!-- Page Content -->
    <!-- Items Starts Here -->
    <div class="featured-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>All Product</h1>
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
            <div id="filters" class="button-group">
              <button class="btn btn-primary" data-filter="*">All Products</button>
              <button class="btn btn-primary" data-filter=".new">Newest</button>
              <button class="btn btn-primary" data-filter=".low">Low Price</button>
              <button class="btn btn-primary" data-filter=".high">Hight Price</button>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="featured container no-gutter">
            <div class="row">
                    @forelse ($product as $item)
                        <div class="col">
                        <div class="card text-white bg-black" style="width: 18rem;">
                            <img src="{{$item->image}}" class="card-img-top" alt="..." width="100%" height="250px">
                            <div class="card-body">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <br>
                            <div class="d-flex">
                            <h5 class="card-text">{{$item->price}} USD</h5>
                            @isset($item->discount)
                            <h5 class="card-text"><small class="text-muted text-decoration-line-through"> {{$item->discount}} USD</small></h5>
                            @endisset

                            @empty($item->discount)
                            <h5 class="card-text"><small class="text-muted text-decoration-line-through"></small></h5>
                            @endempty
                            </div>
                            <br>
                            <p class="card-text text-white">{!! Str::limit($item->discription , 30) !!}</p>
                            <br>
                            <a href="#" class="btn btn-primary">Add To cart</a>
                    </div>

            </div>
    </div>
                @empty
                <div class="empety">
                    <h5 class="text-center">There are no product available 🙂 😔</h5>
                </div>
    @endforelse



<!-- Featred Page Ends Here -->

<!-- pandgation Page start Here -->
        <div class="pagination-product" style="padding: 20px 0">
            {!! $product->links() !!}
        </div>

              <!-- pandgation Page start Here -->
    <!-- Featred Page Ends Here -->


            <!-- Footer Starts Here -->

            <div class="footer">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="logo">
                        <img src="{{$store->logo}}" alt="" width="225px" height="75px">
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
