@extends('front customer.customer store.layout.app')

@section('title','Contact us')

@section('style')

    <style>
        #navbarResponsive{
            top:175px;
        }
        .navbar{
            height: 170px;
        }
    </style>
@endsection

@section('content3')

  <body>
    <!-- Pre Header -->
    <div id="pre-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                @isset($store->text_top)
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M8 16a2 2 0 001.985-1.75c.017-.137-.097-.25-.235-.25h-3.5c-.138 0-.252.113-.235.25A2 2 0 008 16z"></path><path fill-rule="evenodd" d="M8 1.5A3.5 3.5 0 004.5 5v2.947c0 .346-.102.683-.294.97l-1.703 2.556a.018.018 0 00-.003.01l.001.006c0 .002.002.004.004.006a.017.017 0 00.006.004l.007.001h10.964l.007-.001a.016.016 0 00.006-.004.016.016 0 00.004-.006l.001-.007a.017.017 0 00-.003-.01l-1.703-2.554a1.75 1.75 0 01-.294-.97V5A3.5 3.5 0 008 1.5zM3 5a5 5 0 0110 0v2.947c0 .05.015.098.042.139l1.703 2.555A1.518 1.518 0 0113.482 13H2.518a1.518 1.518 0 01-1.263-2.36l1.703-2.554A.25.25 0 003 7.947V5z"></path></svg>
                <span>{!! Str::limit($store->text_top , 75) !!}</span>
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

                  <div class="status-store" id="status">
                    <!--- لمعرفة اذا المتجر اون لاين ام لا -->
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Banner Ends Here -->
    <div class="container">
<div class="row">
    <div class="col-6">
        <form method="POST" action="{{route('contact.send',$store->id)}}">
            @csrf
            @include('flash::message')
        <div class="mb-3">
            <label for="store_id" class="form-label"></label>
            <input name="store_id" type="hidden" class="form-control" id="store_id" value="{{$store->id}}" >
        </div>

        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Full Name" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" required>
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input name="phone" type="Number" class="form-control" id="phone" placeholder="96005" required>
          </div>

          <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input name="country" type="text" class="form-control" id="country" placeholder="USA" required>
          </div>

          <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required>
          </div>

          <div class="mb-3">
            <label for="messages" class="form-label">Message</label>
            <textarea name="messages" class="form-control" id="messages" rows="5" required></textarea>
          </div>

          <button type="submit" class="btn btn-dark">Send Message</button>
          @include('flash::message')
    </div>
</form>

        <div class="col-3">
            <div id="map" style="padding-top: 70px;">
                <!-- How to change your own map point
                       1. Go to Google Maps
                       2. Click on your location point
                       3. Click "Share" and choose "Embed map" tab
                       4. Copy only URL and paste it within the src="" field below
                -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1197183.8373802372!2d-1.9415093691103689!3d6.781986417238027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb96f349e85efd%3A0xb8d1e0b88af1f0f5!2sKumasi+Central+Market!5e0!3m2!1sen!2sth!4v1532967884907" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        </div>
        <div class="col-3" style="padding-top:70px;">
            <div class="info" style="background-color: rgb(0, 0, 0); border-radius: 5px; padding:15px; width:min-content; color:white;">
            <h4 style="padding-top: 40px;">Contact Information : </h4>
            <hr>
            <div class="email" style="display: inline-flex;">
                <i class="fa-solid fa-square-envelope" style="font-size:24px;"></i>
                <h5 style="padding-left: 10px; padding-top:3px;">{{$store->email}}</h5>
              </div>

              <div class="email" style="display: inline-flex; padding-top:50px;">
                <i class="fa-solid fa-phone" style="font-size:24px;"></i>
                <h5 style="padding-left: 10px; padding-top:3px;">{{$store->phone}}</h5>
              </div>
              <hr>
              <div class="share">
                <h6>You can also keep in touch on:<br> <span><br><a href="#" class="sharee"><i class="fa fa-facebook"></i></a><a href="#"class="sharee"><i class="fa fa-linkedin" class="sharee"></i></a><a href="#" class="sharee"><i class="fa fa-twitter"></i><a href="#" class="sharee"><i class="fa fa-instagram"></i></a></span></h6>
              </div>
            </div>
        </div>
    </div>
</div>

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
@section('script')

@endsection
  </body>

@endsection
