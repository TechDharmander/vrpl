<div>
    <div class="card card-post">
        <div class="card-header">
          <h5 class="card-title">Song Genre/Mood</h5>
          <a href="#addModal" class="btn btn-primary btn-sm" data-bs-toggle="modal"><i class="ri-menu-add-fill"></i> Add Song Genre</a>
        </div>

        <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-bordered table-hover">
	            <thead class="flex-fill bg-gray-300">
	              <tr>
	                <th scope="col">ID</th>
	                <th scope="col">Genre</th>
	                <th scope="col">Action</th>
	              </tr>
	            </thead>
	            <tbody>
	                @foreach($genres as $gen)
	              <tr>
	                <th scope="row">{{ $loop->iteration }}</th>
	                <td>{{ $gen->title }}</td>
	                <td>
	                    <a href="javascript:void(0)" class="text-primary" wire:click="edit({{ $gen->id }})"><i class="ri-edit-2-line"></i> Edit</a>
	                    <a href="javascript:void(0)" class="text-danger"  wire:click="delete({{ $gen->id }})" onclick="confirm('Are you sure you want to remove the user from this group?') || event.stopImmediatePropagation()"><i class="ri-delete-bin-fill"></i> Delete</a>
	                </td>
	              </tr>
	                @endforeach
	            </tbody>
	        </table>
	      </div>
	      {!! $genres->links('pagination::bootstrap-5') !!}
	    </div>

        
	    <div wire:ignore.self class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
	        <div class="modal-dialog modal-dialog-centered">
		        <div class="modal-content" >
		            <div class="modal-header">
		                <h5 class="modal-title">{{ $updateMode ? 'Update Genre' : 'Add Genre' }}</h5>
		                <button type="button" class="btn-close" wire:click="resetForm" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		            <label for="" class="fw-bold mb-2">Genre Title</label>	
		                <div class="form-group">
		                    <input type="text" wire:model="title" class="form-control" placeholder="Genre Title">
		                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
		                </div>
		            </div>
		            <div class="modal-footer">
		                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
		                <button 
			                @if($updateMode) 
					            wire:click = 'updateGenre'
					        @else
					            wire:click = 'addGenre'
					        @endif 
				        class="btn btn-primary">{{ $updateMode ? 'Update' : 'Save' }}</button>
		            </div>
		        </div>
	        </div>
	    </div>


	</div>
</div>

