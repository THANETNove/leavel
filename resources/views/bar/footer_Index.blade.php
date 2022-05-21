<footer id="footer">

    <div class="container d-lg-flex py-4">

      <div class="me-lg-auto text-center text-lg-start">
        <div class="copyright">
          @foreach($homeTop as $name)
          &copy; Copyright <strong><span>{{$name->webName}}</span></strong>. All Rights Reserved
          @endforeach 
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/ -->
          Designed by TH-Project</a>
        </div>
      </div>
      <div class="social-links text-center text-lg-right pt-3 pt-lg-0">
        @foreach($urls as $url)
        <a href="{!!$url->contactUrl!!}" target ="_blank"  class="twitter">{!!$url->iconContact!!}</a>
        @endforeach 
      </div>
    </div>
  </footer><!-- End Footer -->