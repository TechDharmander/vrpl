<div>
  <div class="card card-post">
    <hr>
    <div class='row'>
      <div class="col-md-3">
        <div class="media-img mb-3 mb-sm-0  w-50 m-auto">
          <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" class="img-fluid" alt="...">
          <h5 class="media-name text-center">{{$userinfo->name}} </h5>
        </div><!-- media-img -->

      </div>

      <div class="card card-settings col-md-8" >
        <div class="card-header">
          <h5 class="card-title"></h5>

        </div><!-- card-header -->

        <ul wire:ignore class="nav nav-pills mb-3" id="pills-tab" role="tablist" style='border-bottom: 1px solid #506fd9;'>
          <li class="nav-item" role="presentation" wire:ignore >
            <button class="nav-link active rounded-0" id="pills-home-tab" data-bs-toggle="pill"
              data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">My
              Information</button>
          </li>
          <li class="nav-item" role="presentation" wire:ignore >
            <button class="nav-link rounded-0" id="pills-profile-tab" data-bs-toggle="pill"
              data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
              aria-selected="false">Chang Password</button>
          </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" wire:ignore.self>

            <form method="post" class="mb-5" wire:submit.prevent='updatePropertySubmit()' enctype="multipart/form-data">
              <div class="card-body p-0">

                <div class="setting-item">
                  <div class="row g-2 align-items-center">
                    <div class="col-md-5">
                      <h6>Name</h6>

                    </div><!-- col -->
                    <div class="col-md">
                      <input type="text" class="form-control" wire:model="name" placeholder="Enter name">
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
                      <input type="text" class="form-control" wire:model="phone_number"
                        placeholder="Enter phone number">
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

                          <select class="form-select" wire:model="country">

                            @foreach($countries as $cnt)
                            <option value="{{ $cnt->id }}">{{ $cnt->name }}</option>
                            @endforeach
                          </select>
                          @error('country')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="col-sm-4 col-md-4 ">
                          <select class="form-select" wire:model="state">

                            @foreach($states as $sta)
                            <option value="{{ $sta->id }}">{{ $sta->name }}</option>
                            @endforeach

                          </select>
                          @error('state')
                          <div class="text-danger">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="col-sm-4 col-md-4">
                          <select class="form-select" wire:model="city">

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

          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" wire:ignore.self>

          
              <div class="card-body p-0">
              @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="setting-item">
                  <div class="row g-2 align-items-center">
                    <div class="col-md-5">
                      <h6>Current Password</h6>

                    </div><!-- col -->
                    <div class="col-md">
                      <input type="password" class="form-control" wire:model="currentpassword"  placeholder="Enter Current Password">
                      @error('currentpassword')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div><!-- col -->
                  </div><!-- row -->
                </div>
                <div class="setting-item">
                  <div class="row g-2 align-items-center">
                    <div class="col-md-5">
                      <h6>New Password</h6>
                    </div><!-- col -->
                    <div class="col-md">
                      <input type="password" class="form-control" wire:model="newpassword" placeholder="Enter New Password">
                      @error('newpassword')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div><!-- col -->
                  </div><!-- row -->
                </div>

                <div class="setting-item">
                  <div class="row g-2 align-items-center">
                    <div class="col-md-5">
                      <h6>Confirm Password</h6>
                    </div><!-- col -->
                    <div class="col-md">
                      <input type="password" class="form-control" wire:model="confirmpassword" placeholder="Confirm Password">
                      @error('confirmpassword')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div><!-- col -->
                  </div><!-- row -->
                </div>

                <hr>
                <div class="setting-item">
                  <div class="row">
                    <div class="col-md">
                      <div class="form-check mt-1">
                        <button type="button" wire:click="changepassword()" class="btn btn-success float-end"><i class="ri-save-line"></i>
                          Change</button>
                      </div>
                    </div><!-- col -->
                  </div><!-- row -->
                </div><!-- setting-item -->
              </div><!-- card-body -->
        

          </div>

        </div>

      </div><!-- card -->

    </div>

  </div>

</div>