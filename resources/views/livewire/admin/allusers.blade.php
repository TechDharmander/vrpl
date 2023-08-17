<div>
	<div class="card card-post">
		<div class="card-header">
			<h5 class="card-title">All Users </h5>

			<!--<a href="#addUserModal" class="btn btn-primary btn-sm" data-bs-toggle="modal"><i class="ri-menu-add-fill"></i> Add Song Category</a>-->
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead class="flex-fill bg-gray-300">
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Mobile Number</th>
							<th scope="col">Country,State,City</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
					
						@foreach($alluser as $use)
						
						<tr>
							<th scope="row">{{ $use->id }}</th>
							<td>{{ $use->name }} ({{$use->username}})</td>
							<td>{{ $use->email }}</td>
							<td>{{ $use->phone_number }}</td>
							
							<td>{{ $use->Country[0]->name}}, {{ $use->State[0]->name}}, {{ $use->City[0]->name}}</td>
					
							<td>
								<button type='button' class="text-primary border-0" data-bs-toggle='modal'
									data-bs-target='#addModal' wire:click="edit({{ $use->id }})">
									<i class="ri-edit-2-line"></i> Edit</button>

								<a href="javascript:void(0)" class="text-danger" wire:click="delete({{ $use->id }})"
									onclick="confirm('Are you sure you want to remove the user from this group?') || event.stopImmediatePropagation()"><i
										class="ri-delete-bin-fill"></i> Delete</a>
							</td>
						</tr>
						
						@endforeach
						
					</tbody>
				</table>
			</div>
		
			{!! $alluser->links('pagination::bootstrap-5') !!}
		</div>
	</div>

	<div wire:ignore.self class="modal fade" id="addModal" data-bs-backdrop="static" aria-labelledy='addModallabel'
		data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id='addModallabel'> Update User Information</h5>
					<button type="button" class="btn-close" wire:click="resetModalForm" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<label for="" class="fw-bold mb-2">User Name</label>
					<div class="form-group">

						<input type="text" class="form-control" wire:model="username" placeholder="Enter User Name"
							disabled='disabled' readonly>
						@error('username') <span class="text-danger">{{ $message }}</span> @enderror

					</div>

					<label for="" class="fw-bold mb-2">Name</label>
					<div class="form-group">
						<input type="text" class="form-control" wire:model="name" placeholder="Enter User Name">
						@error('name') <span class="text-danger">{{ $message }}</span> @enderror
					</div>

					<label for="" class="fw-bold mb-2">Email</label>
					<div class="form-group">
						<input type="text" class="form-control" wire:model="email" placeholder="Enter User Name">
						@error('email') <span class="text-danger">{{ $message }}</span> @enderror
					</div>

					<label for="" class="fw-bold mb-2">Phone Number</label>
					<div class="form-group">
						<input type="text" class="form-control" wire:model="phone_number" placeholder="Enter User Name">
						@error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
					</div>

					<div class="row g-3">
						<!-- col -->
						<label for="" class="fw-bold mb-1">Country, State, City</label>
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

					<div class="modal-footer m-2">

						<button wire:click='updateUser' class="btn btn-primary">Update</button>
					</div>

				</div>

			</div>
		</div>
	</div>

	<div wire:ignore.self class="modal fade" id="addUserModal" data-bs-backdrop="static" aria-labelledy='addModallabel'
		data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id='addModallabel'> Update User Information</h5>
					<button type="button" class="btn-close" wire:click="resetModalForm" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<label for="" class="fw-bold mb-2">User Name</label>
					<div class="form-group">

						<input type="text" class="form-control" wire:model="username" placeholder="Enter User Name">
						@error('username') <span class="text-danger">{{ $message }}</span> @enderror

					</div>

					<label for="" class="fw-bold mb-2">Name</label>
					<div class="form-group">
						<input type="text" class="form-control" wire:model="name" placeholder="Enter  Name">
						@error('name') <span class="text-danger">{{ $message }}</span> @enderror
					</div>

					<label for="" class="fw-bold mb-2">Email</label>
					<div class="form-group">
						<input type="email" class="form-control" wire:model="email" placeholder="Enter User Email">
						@error('email') <span class="text-danger">{{ $message }}</span> @enderror
					</div>
					<label for="" class="fw-bold mb-2">Password</label>
					<div class="form-group">
						<input type="password" class="form-control" wire:model="password"
							placeholder="Enter User Password">
						@error('password') <span class="text-danger">{{ $message }}</span> @enderror
					</div>

					<label for="" class="fw-bold mb-2">Phone Number</label>
					<div class="form-group">
						<input type="text" class="form-control" wire:model="phone_number"
							placeholder="Enter Phone Number">
						@error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
					</div>

					<div class="row g-3">
						<!-- col -->
						<label for="" class="fw-bold mb-1">Country, State, City</label>
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
								<option value="">--Select State--</option>
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
								<option value="">--Select City--</option>

								@foreach($cities as $cts)
								<option value="{{ $cts->id }}">{{ $cts->name }}</option>
								@endforeach

							</select>
							@error('city')
							<div class="text-danger">{{$message}}</div>
							@enderror
						</div>
					</div>

					<div class="modal-footer m-2">

						<button wire:click='addnewUser' class="btn btn-primary">Save</button>
					</div>

				</div>

			</div>
		</div>
	</div>

</div>