<footer class="text-center text-lg-start bg-white text-muted">
    
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      
        <div class="me-5 d-none d-lg-block">
          <span>Get connected with us on social networks:</span>
        </div>
       
        <div>
          <a href="" class="me-4 link-secondary">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="me-4 link-secondary">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="me-4 link-secondary">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="me-4 link-secondary">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="me-4 link-secondary">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="" class="me-4 link-secondary">
            <i class="fab fa-github"></i>
          </a>
        </div>
  
      </section>
     
      <section class="">
        <div class="container text-center text-md-start mt-5">
      
          <div class="row mt-3">
          
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3 text-secondary"></i>Wolf Watch
              </h6>
              <p>
                Chào mừng đến với bình nguyên vô tận
              </p>
            </div>
        
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
       
              <h6 class="text-uppercase fw-bold mb-4">
                Danh Mục
              </h6>
              <?php
                foreach ($dsdm as $dm) {
                  extract($dm);
                                                  
                  $linkdm = "index.php?act=sanpham&category_id=".$category_id; 
                                                  
                  echo '
                  <li class="text-reset"><a href="'.$linkdm.'" id="item-drop" style="color:#6c757d">'.$category_name.'</a></li>
                  ';
                  }
                  ?>
              <!-- <p>
                <a href="#!" class="text-reset">Angular</a>
              </p>
              <p>
                <a href="#!" class="text-reset">React</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Vue</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Laravel</a>
              </p> -->
            </div>
          
           
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
    
            <h6 class="text-uppercase fw-bold mb-4">Liên Hệ</h6>
            <p><i class="fas fa-home me-3 text-secondary"></i> Trịnh Văn Bô, HN</p>
            <p>
              <i class="fas fa-envelope me-3 text-secondary"></i>
              tungphph27346@fpt.edu.vn
            </p>
            <p><i class="fas fa-phone me-3 text-secondary"></i> + 84 904 080 244</p>
            <p><i class="fas fa-print me-3 text-secondary"></i> + 01 234 567 89</p>
          </div>
        
        </div>
        
      </div>
    </section>

    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
      © 2021 Copyright:
    </div>
    
  </footer>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
  integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="view/js/index1235.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
  integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>