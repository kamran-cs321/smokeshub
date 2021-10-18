@include('store.layout.header')


@include('store.layout.navbar')
  <div class="container mt-5">
    <div class="row p-b-148 p-t-60 mt-5">
      <div class="col-md-7 col-lg-8">
        <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md mt-5">
          <h3 class="mtext-111 cl2 p-b-16 ">
            Our Story
          </h3>

          <p class="stext-113 cl6 p-b-26 text-justify mt-3">
            My name is Tanya, and I’m the Founder of Repost. I chose Repost because it allows me the opportunity to combine both, my need to be creative as well as my desire to live a successful life.<br>
            <b class="m-b-10">Who is my inspiration?</b><br>

            My father…

            My father is many things, but before all, he is an artist!

            My dad came to America at a young age with only $50 in his pocket and a drive to become a successful business man.

            With his passion and hard work, he became one of top manufactures in America for the gift industry.<br>

            My dad always taught me to think out of the box, keep a strong work ethic, appreciate family and friends, and enjoy life.

            His gifted achievements and artist touch, motivated me to build a successful brand and make it available to as many people as possible, offering boutique style products that are reasonable in price for all.<br>
            I’m so excited to watch the growth of my business come to life. My team and I can get quite creative! We have many wheels turning on the back end, and we can’t wait to show you what we have in store for the future, so please join our
            email list and watch it all unfold. We look forward to keeping you posted with the latest and greatest!<br>

            Have a beautiful day… and please…<b>REPOST!</b><br>

            Best always,<br>
            Tanya~

          </p>
        </div>
      </div>

      <div class="col-11 col-md-5 col-lg-4 m-lr-auto mt-5">
        <div class="how-bor1 mt-5">
          <div class="hov-img0 mt-5">
            <img  src="{{URL::asset('/storage/images/about-01.jpg')}}" alt="IMG">
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <!-- Back to top -->
  <div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
      <i class="zmdi zmdi-chevron-up"></i>
    </span>
  </div>

  <!-- Modal1 -->
  <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal1"></div>

    <div class="container">
      <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
        <button class="how-pos3 hov3 trans-04 js-hide-modal1">
          <img src="images/icons/icon-close.png" alt="CLOSE">
        </button>

        <div class="row">
          <div class="col-md-6 col-lg-7 p-b-30">
            <div class="p-l-25 p-r-30 p-lr-0-lg">
              <div class="wrap-slick3 flex-sb flex-w">
                <div class="wrap-slick3-dots"></div>
                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                <div class="slick3 gallery-lb">
                  <div class="item-slick3" data-thumb="images/product-detail-01.jpg">
                    <div class="wrap-pic-w pos-relative">
                      <img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

                      <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
                        <i class="fa fa-expand"></i>
                      </a>
                    </div>
                  </div>

                  <div class="item-slick3" data-thumb="images/product-detail-02.jpg">
                    <div class="wrap-pic-w pos-relative">
                      <img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

                      <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
                        <i class="fa fa-expand"></i>
                      </a>
                    </div>
                  </div>

                  <div class="item-slick3" data-thumb="images/product-detail-03.jpg">
                    <div class="wrap-pic-w pos-relative">
                      <img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

                      <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
                        <i class="fa fa-expand"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 p-b-30">
            <div class="p-r-50 p-t-5 p-lr-0-lg">
              <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                Lightweight Jacket
              </h4>

              <span class="mtext-106 cl2">
                $58.79
              </span>

              <p class="stext-102 cl3 p-t-23">
                Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
              </p>

              <!--  -->
              <div class="p-t-33">
                <div class="flex-w flex-r-m p-b-10">
                  <div class="size-203 flex-c-m respon6">
                    Size
                  </div>

                  <div class="size-204 respon6-next">
                    <div class="rs1-select2 bor8 bg0">
                      <select class="js-select2" name="time">
                        <option>Choose an option</option>
                        <option>Size S</option>
                        <option>Size M</option>
                        <option>Size L</option>
                        <option>Size XL</option>
                      </select>
                      <div class="dropDownSelect2"></div>
                    </div>
                  </div>
                </div>

                <div class="flex-w flex-r-m p-b-10">
                  <div class="size-203 flex-c-m respon6">
                    Color
                  </div>

                  <div class="size-204 respon6-next">
                    <div class="rs1-select2 bor8 bg0">
                      <select class="js-select2" name="time">
                        <option>Choose an option</option>
                        <option>Red</option>
                        <option>Blue</option>
                        <option>White</option>
                        <option>Grey</option>
                      </select>
                      <div class="dropDownSelect2"></div>
                    </div>
                  </div>
                </div>

                <div class="flex-w flex-r-m p-b-10">
                  <div class="size-204 flex-w flex-m respon6-next">
                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                      <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-minus"></i>
                      </div>

                      <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

                      <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-plus"></i>
                      </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                      Add to cart
                    </button>
                  </div>
                </div>
              </div>

              <!--  -->
              <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                <div class="flex-m bor9 p-r-10 m-r-11">
                  <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                    <i class="zmdi zmdi-favorite"></i>
                  </a>
                </div>

                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                  <i class="fa fa-facebook"></i>
                </a>

                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                  <i class="fa fa-twitter"></i>
                </a>

                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                  <i class="fa fa-google-plus"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade modal-full-window" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content " data-dismiss="modal" aria-label="Close">

        <div class="modal-body">
          ...
        </div>
      </div>
    </div>
  </div>
  
  
@include('store.layout.footer')
