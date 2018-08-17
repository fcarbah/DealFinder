@extends('layout')

@section('body')

  <div class="app-content content bk">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <div class="row full-height-vh-with-nav1">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-6 col-10">
              <div class="mx-auto d-block pb-3 pt-4 width-80-per text-center text-primary ">
                <h1 class="font-large-1">Find Amazing Deals Around You</h1>
              </div>
              
              @include('search')
              

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="transparent-black-bk p-1">
      @include('realtimedeals',['title'=>'Travel Deals', 'deals'=>$response->data->travelDeals, 'url'=>'/deals?dealType=travel'])
      <br/>
      @include('realtimedeals',['title'=>'Product Deals', 'deals'=>$response->data->prodDeals, 'url'=>'/deals?dealType=product'])
    </div>

  </div>
  


@stop



