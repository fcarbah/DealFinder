<div class="col-md-3 col-xl-2">

	<div class="card" >

		<div class="card-header">
			<h4 class="card-title">{{$deal->title}}</h4>
		
		</div>
		
		<div class="card-content">
			@if($deal->image != null)
			<img class="img-fluid" src="{{$deal->image}}" alt="Card image cap">
			@endif

			<div class="card-body">
				@if($deal->address != null)
				<p class="blue-grey">{{$deal->address}} || 
					@if($deal->distance != null)
					<span class="purple">{{number_format($deal->distance,2)}} mi away</span>
					@endif
				</p>
				<p class="">{{$deal->phone}}</p>
				@endif

				<p class="card-text font-small-3">{{partialStr($deal->description)}}</p>				
				<span class="btn btn-info text-bold-700">Price ${{currencyFormat($deal->price)}}</span>
				@if($deal->savings != null)
				<span class="btn btn-danger text-bold-600">Savings ${{currencyFormat($deal->savings)}}</span>
				@endif
			</div>


		</div>

		<div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
			<span class="float-left">Expire On: {{formatDate(2,$deal->expireDate)}}</span>
			
			<span class="float-right">
				<a href="{{$deal->link}}" " class="card-link">Read More <i class="fa fa-angle-right"></i></a>
			</span>
		</div>

	</div>

</div>