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
