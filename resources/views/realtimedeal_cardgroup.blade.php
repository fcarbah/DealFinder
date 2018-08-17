<div class="row ">
  <div class="col-12">
    <div class="card-group">
      @foreach($deals as $deal)
      <div class="card">
        <div class="card-content">
          @if($deal->image != null)<img class="card-img-top img-fluid" src="{{$deal->image}}"
          alt="Card image cap" />@endif
          <div class="card-body">
            <h4 class="card-title">{{$deal->title}}</h4>
            <p class="card-text">{{partialStr($deal->description)}}</p>
            <p class="card-text">
              <small class="text-muted">Expire On: {{formatDate(2,$deal->expireDate)}}</small>
              <a href="{{$deal->link}}"  class="float-right card-link">Read More <i class="fa fa-angle-right"></i></a>
            </p>
            <p class="card-text">
              <span class="btn btn-info text-bold-700">Price ${{currencyFormat($deal->price)}}</span>
              @if($deal->savings != null)
              <span class="btn btn-danger text-bold-600">You Save ${{currencyFormat($deal->savings)}}</span>
              @endif
              
            </p>
          </div>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>
</div>