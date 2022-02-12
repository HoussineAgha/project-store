@extends('front customer.customer store.layout.app')

@section('title',$store->name_store)

@section('style')

    <style>
        .d-flex h5{
            margin-right: 40px;
        }
        .bg-black{
            margin-top: 20px;
            margin-bottom: 0px;
        }
        .col{
            background-color: rgb(255, 255, 255);
            padding-bottom: 25px;
        }
        .border-bottom{
            border-bottom: 3px solid #2e7fcf !important;
        }
        .card{
            min-width: max-content;
            max-width: fit-content;
        }
        .row > *{
            padding-right:0px;
        }
        .border-bottom{
            padding-top: 75px;
        }
        body{
            background-color: rgb(231, 231, 231)
        }
        #navbarResponsive{
            top:175px;
        }
        .navbar{
            height: 170px;
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
          @isset($store->adsimage)
          <a class="navbar-brand" href="{{$store->urlads}}" target="_blank"><img src="{{asset($store->adsimage)}}" alt="" width="720px" height="150px" id="logo-customer"></a>
          @endisset
          @empty($store->adsimage)
          <a class="navbar-brand" href="#" target="_blank"><img src="{{asset('img\ads-store.jpg')}}" alt="" width="720px"  height="150px" id="logo-customer"></a>
          @endempty

            <span class="navbar-toggler-icon"></span>


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
    <!-- Banner Starts Here -->
    <div class="banner">
        @isset($store->Baner)
        <img src="{{asset($store->Baner)}}" width="100%" height="600px"  alt="..." >
        @endisset

        @empty($store->Baner)
        <img src="{{asset(img\store.jpg)}}" width="100%" height="600px"  alt="..." >
        @endempty

      <div class="container">

        <div class="row">
          <div class="col-md-12">
            <div class="caption">
               <h2>Store working hours :</h2>
              <div class="line-dec"></div>

            @isset($store->opening_times)
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.643 3.143L.427 1.927A.25.25 0 000 2.104V5.75c0 .138.112.25.25.25h3.646a.25.25 0 00.177-.427L2.715 4.215a6.5 6.5 0 11-1.18 4.458.75.75 0 10-1.493.154 8.001 8.001 0 101.6-5.684zM7.75 4a.75.75 0 01.75.75v2.992l2.028.812a.75.75 0 01-.557 1.392l-2.5-1A.75.75 0 017 8.25v-3.5A.75.75 0 017.75 4z"></path></svg><h2>{{ $store->opening_times }}</h2><span class="sr-only"></span>
            @endisset
            @empty($store->opening_times)
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.643 3.143L.427 1.927A.25.25 0 000 2.104V5.75c0 .138.112.25.25.25h3.646a.25.25 0 00.177-.427L2.715 4.215a6.5 6.5 0 11-1.18 4.458.75.75 0 10-1.493.154 8.001 8.001 0 101.6-5.684zM7.75 4a.75.75 0 01.75.75v2.992l2.028.812a.75.75 0 01-.557 1.392l-2.5-1A.75.75 0 017 8.25v-3.5A.75.75 0 017.75 4z"></path></svg><h2>In Work Now</h2><span class="sr-only"></span>
            @endempty
              <br>
            @isset($store->close_times)
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.643 3.143L.427 1.927A.25.25 0 000 2.104V5.75c0 .138.112.25.25.25h3.646a.25.25 0 00.177-.427L2.715 4.215a6.5 6.5 0 11-1.18 4.458.75.75 0 10-1.493.154 8.001 8.001 0 101.6-5.684zM7.75 4a.75.75 0 01.75.75v2.992l2.028.812a.75.75 0 01-.557 1.392l-2.5-1A.75.75 0 017 8.25v-3.5A.75.75 0 017.75 4z"></path></svg><h2>{{ $store->close_times }}</h2><span class="sr-only"></span>
            @endisset
            @empty($store->close_times)
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.643 3.143L.427 1.927A.25.25 0 000 2.104V5.75c0 .138.112.25.25.25h3.646a.25.25 0 00.177-.427L2.715 4.215a6.5 6.5 0 11-1.18 4.458.75.75 0 10-1.493.154 8.001 8.001 0 101.6-5.684zM7.75 4a.75.75 0 01.75.75v2.992l2.028.812a.75.75 0 01-.557 1.392l-2.5-1A.75.75 0 017 8.25v-3.5A.75.75 0 017.75 4z"></path></svg><h2>In Work Now</h2><span class="sr-only"></span>
            @endempty
            <br><br>
            <h2>What does the store offer?</h2>
            <div class="line-dec"></div>
              <p> {!! Str::limit($store->discription , 250) !!} </p>

              <div class="main-button">
                <a href="#">Order Now!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <!-- Featured Starts Here -->

    <div class="featured container no-gutter">
        <span class="border-bottom border-primary border-width-8 pb-3 d-inline-block"><h3>Featured product</h3></span>
        <div class="row">
            <hr>
                @foreach ($feature as $item)
                    <div class="col">
                    <div class="card text-white bg-black" style="width: 18rem;">
                        <img src="{{$item->image}}" class="card-img-top" alt="..." width="100%" height="150px">
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
                        <a href="#" class="btn btn-primary">Add To cart</a>

                </div>

        </div>
</div>
@endforeach
        </div>
    <!-- Featred Ends Here -->

    <!-- latest product start Here -->


    <div class="featured container no-gutter">
      <span class="border-bottom border-primary border-width-8 pb-3 d-inline-block"><h3>Latest product</h3></span>
      <div class="row">
          <hr>
              @foreach ($latest as $item)
                  <div class="col">
                  <div class="card text-white bg-black" style="width: 18rem;">
                      <img src="{{$item->image}}" class="card-img-top" alt="..." width="100%" height="150px">
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
                      <a href="#" class="btn btn-primary">Add To cart</a>

              </div>

      </div>
</div>
@endforeach
      </div>

<!-- latest product end Here -->

        <!-- Footer Starts Here -->
        <div class="footer">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="logo">
                    <img src="assets/images/header-logo.png" alt="">
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



@section('script')



@endsection
  </body>

</html>

@endsection


