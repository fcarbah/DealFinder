@extends('layout')

@section('body')

<div class="app-content content bk">

    <div class="content-wrapper">

      	<div class="content-header row"></div>

    	<div class="content-body">

	        <div class="row full-height-vh-with-nav1">
	        	<div class="col-12 d-flex align-items-center justify-content-center">
            	<div class="col-lg-6 col-10">
              	@include('search')
            </div>
          </div>

	        </div>

	        <div class="row height-match">
	        	@foreach($response->data->deals as $deal)
	        		@include('deal_card')
	        	@endforeach

	        </div>

		</div>

	</div>

</div>


