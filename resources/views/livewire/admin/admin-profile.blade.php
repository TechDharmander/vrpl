<div>
    <div class="card card-post">
 <br>

        <div class="media-profile mb-5">
            <div class="media-img mb-3 mb-sm-0">
              <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" class="img-fluid" alt="...">
            </div><!-- media-img -->
            <div class="media-body">
              <h5 class="media-name">{{$userinfo->name}}</h5>
              <p class="d-flex gap-2 mb-4"><i class="ri-map-pin-line"></i>   {{$userinfo->role}}</p>
              <p class="mb-0"> {{$userinfo->myself}} Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                </p>
            </div><!-- media-body -->
          </div>
<hr>

<div class="card card-settings col-md-8 offset-2">
        <div class="card-header">
          <h5 class="card-title">My Information</h5>
         
        </div><!-- card-header -->

 <form  method="post" class="mb-5" wire:submit.prevent='updatePropertySubmit()' enctype="multipart/form-data" >
        <div class="card-body p-0">


          <div class="setting-item">
            <div class="row g-2 align-items-center">
              <div class="col-md-5">
                <h6>User Name</h6>

              </div><!-- col -->
              <div class="col-md">
                <input type="text" class="form-control"  wire:model="username" placeholder="Enter User Name" disabled='disabled' readonly>
              </div><!-- col -->
            </div><!-- row -->
          </div>


          <div class="setting-item">
            <div class="row g-2 align-items-center">
              <div class="col-md-5">
                <h6>Name</h6>

              </div><!-- col -->
              <div class="col-md">
                <input type="text" class="form-control"  wire:model="name" placeholder="Enter name">
              </div><!-- col -->
            </div><!-- row -->
          </div>



          <div class="setting-item">
            <div class="row g-2 align-items-center">
              <div class="col-md-5">
                <h6>email</h6>

              </div><!-- col -->
              <div class="col-md">
                <input type="email" class="form-control" wire:model="email" placeholder="Enter email">
                
                @error('email')
                  <div class="text-danger">{{$message}}</div>
                @enderror
              </div><!-- col -->
            </div><!-- row -->
          </div>


          <div class="setting-item">
            <div class="row g-2 align-items-center">
              <div class="col-md-5">
                <h6>Phone Number</h6>

              </div><!-- col -->
              <div class="col-md">
                <input type="text" class="form-control"  wire:model="phone_number"  placeholder="Enter phone number">
              </div><!-- col -->
            </div><!-- row -->
          </div>



          <div class="setting-item">
            <div class="row g-2 align-items-center">
              <div class="col-md-5">
                <h6>Select Country, State, City</h6>

              </div><!-- col -->
              <div class="col-md">


              <div class="row g-3">
              <!-- col -->
              <!-- col -->
              <div class="col-sm-4 col-md-4">
                
                <select class="form-select"  wire:model="country">

              
                  @foreach($countries as $cnt)
                    <option value="{{ $cnt->id }}">{{ $cnt->name }}</option>
                  @endforeach
                </select>
                @error('country')
                  <div class="text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-sm-4 col-md-4 ">
                <select class="form-select"  wire:model="state">
             
                    @foreach($states as $sta)
                      <option value="{{ $sta->id }}">{{ $sta->name }}</option>
                    @endforeach
                  
                </select>
                @error('state')
                  <div class="text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="col-sm-4 col-md-4">
                <select class="form-select"  wire:model="city">
            
                    @foreach($cities as $cts)
                      <option value="{{ $cts->id }}">{{ $cts->name }}</option>
                    @endforeach
                    
                </select>
                @error('city')
                  <div class="text-danger">{{$message}}</div>
                @enderror
              </div>
            </div>


              </div><!-- col -->
            </div><!-- row -->
          </div>
          <hr>
          <div class="setting-item">
            <div class="row g-2">
              <div class="col-md">
                <div class="form-check mt-1">
                <button type="submit" class="btn btn-lg btn-success"><i class="ri-save-line"></i> Save</button>
                </div>
              </div><!-- col -->
            </div><!-- row -->
          </div><!-- setting-item -->
        </div><!-- card-body -->
</form>
      </div><!-- card -->
	</div>
  
</div>

