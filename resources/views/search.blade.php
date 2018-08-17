<form action="{{url('/deals')}}">

<fieldset class="form-group position-relative">
  <div class="row">

    <div class="col-md-3 has-icon-left">
      <div class="form-group">
        <input type="text" class="form-control round m-b-1" id="iconLeft4" placeholder="Zip Code" value="{{$response->data->zip}}" name="zip" maxlength="5">
        <div class="form-control-position">
          <i class="ft-unlock warning font-medium-4"></i>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">  
          <select class="select2-placeholder-multiple form-control" name="category"  >
            @foreach($response->data->defaults->categories as $item)
            <option value="{{$item->id}}" @if($item->id==$response->data->category){{'selected'}}@endif>{{$item->name}}</option>
            @endforeach
          </select>
      </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">  
          <select class="select2 form-control" placeholder="Radius" name="radius">
            @foreach($response->data->defaults->radius as $item)
            <option value="{{$item->id}}" @if($item->id==$response->data->radius){{'selected'}}@endif>{{$item->name}}</option>
            @endforeach
            
          </select>
      </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">  
          <select class="select2 form-control"  placeholder="Limit" name="limit">
             @foreach($response->data->defaults->limits as $item)
            <option value="{{$item->id}}" @if($item->id==$response->data->limit){{'selected'}}@endif>{{$item->name}}</option>
            @endforeach
          </select>
      </div>
    </div>


  </div>


<div class="row skin skin-flat">

  <fieldset>
    <div class="d-inline-block custom-control custom-radio mr-1">
      <input type="radio" name="dealType" value="all" @if($response->data->dealType=='all'){{'checked'}}@endif>
      <label for="input-radio-15">All Other Deals</label>
    </div>

    <div class="d-inline-block custom-control custom-radio mr-1">
      <input type="radio" name="dealType" value="product" @if($response->data->dealType=='product'){{'checked'}}@endif>
      <label for="input-radio-15">Products</label>
    </div>

    <div class="d-inline-block custom-control custom-radio mr-1">
      <input type="radio" name="dealType" value="travel" @if($response->data->dealType=='travel'){{'checked'}}@endif>
      <label for="input-radio-15">Travel</label>
    </div>

  </fieldset>
  
</div>

</fieldset>



<div class="row py- justify-content-center">
  <fieldset">
    <button type="submit" class="btn btn-primary btn-md"><i class="ft-search"></i> Search</button>
  </fieldset>
</div>

</form>