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
							<th scope="col">song_duration</th>
							<th scope="col">category</th>
							<th scope="col">Country,State,City</th>
							<th scope="col">subcategory</th>
						</tr>
					</thead>
					<tbody>

						@foreach($songs_data as $song)
						<tr>
							<th scope="row">#{{ $song->id }}</th>
							<td>{{ $song->song_name }} </td>
							<td>{{ $song->song_duration }}</td>
							<td>{{ $song->category }}</td>
							<td>{{ $song->subcategory}}</td>
							<td>
								<button type='button' class="text-primary border-0" data-bs-toggle='modal'
									data-bs-target='#viewgonginfoModal' wire:click="viewSongInfo({{ $song->id }})">
									<i class="ri-eye-line"></i> View </button>

							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

		</div>
	</div>

	<div wire:ignore.self class="modal fade" id="viewgonginfoModal" data-bs-backdrop="static" data-bs-keyboard="false"
		tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered  modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">{{$s_name}}</h5>
					<button type="button" class="btn-close" wire:click="resetModalForm" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class='row'>
						<div class='col-md-5 px-3'>
							<a href="{{asset('storage/'.$s_thumbnail)}}" target="_blank"><img
									src="{{asset('storage/'.$s_thumbnail)}}" class='w-100' /></a>
							<br>
							<audio id="audio" src="{{asset('storage/'.$s_audio)}}" class='w-100' controls></audio>
						</div>
						<div class='col-md-7 px-3"' style='border-left: 1px solid #dbdbdb;'>
							<div class='row'>
								<div class='col-md-3 py-2'>Song Name</div>
								<div class='col-md-9'>{{$s_name}}</div>
								<div class='col-md-3 py-2'>Album Name</div>
								<div class='col-md-9'>{{$s_label_name}}</div>
								<div class='col-md-3 py-2'>Featured Artist</div>
								<div class='col-md-9'>{{$s_featured_artist}}</div>
								<div class='col-md-3 py-2'>Caller Tune Timing</div>
								<div class='col-md-9'>{{$s_caller_tune_timing}}</div>
								<div class='col-md-3 py-2'>Artist</div>
								<div class='col-md-9'>{{$s_artist}}</div>
								<div class='col-md-3 py-2'>Composer</div>
								<div class='col-md-9'>{{$s_composer}}</div>
								<div class='col-md-3 py-2'>Lyricist</div>
								<div class='col-md-9'>{{$s_lyricist}}</div>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
					<button class="btn btn-success me-auto"><i class="ri-check-double-fill"></i> Approved</button>
					<button class="btn btn-danger" id="draft_res" wire:click="showRemark('unapprove')" @if($remart_status == 'unapprove') disabled @endif><i class="ri-delete-bin-2-fill"></i> Unapproved</button>
					<button class="btn btn-primary" wire:click="showRemark('onhold')" @if($remart_status == 'onhold') disabled @endif><i class="ri-stop-circle-fill"></i> Onhold</button>
				</div>


				@if($remarkView)
					<div class='row'>
						<hr>
						<div class='col-md-6 offset-md-3 border'>
							<span class='p-1 d-block'> By Draft, Remark</span>
							<hr class='m-1'>
							<select class="form-control my-1" wire:model="reasonlist">
								<option>--Select Reason--</option>
								@foreach($allreasonlist as $reas)
									<option value='{{$reas->id}}'> {{$reas->title}}</option>
								@endforeach

							</select>
							@error('reasonlist') <span class="text-danger">{{ $message }}</span> @enderror
							<textarea class="form-control" wire:model="remarkbox" rows='5'></textarea>
							<div class="modal-footer">
							<button class="btn btn-info me-auto" wire:click="hideRemark()"> <i class="ri-check-double-fill"></i> Close</button>
								<button class="btn btn-success" 
								
								wire:click="saveRemark('{{$remart_status}}','{{$s_id}}')"
								
								> <i class="ri-check-double-fill"></i> Submit</button>
								
							</div>
						</div>
					</div>
				@endif


			</div>
		</div>
	</div>

</div>