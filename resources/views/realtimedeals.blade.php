<!-- Groups section start -->
        <section id="groups" class="">
          <div class="row">
            <div class="col-12 mt-3 mb-1">
              <h4 class="text-uppercase"><p class="white">{{$title}}</p></h4>
              <a href="{{url($url)}}" class="float-right btn btn-success">View More</a>

            </div>
          </div>
          
            @include('realtimedeal_cardgroup',['deals'=>$deals])

        </section>
        <!-- Groups section end -->
