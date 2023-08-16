<div>
    <div class="card card-post">
        <div class="card-header">
          <h5 class="card-title">Song composers</h5>
         
        </div>

        <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-bordered table-hover">
	            <thead class="flex-fill bg-gray-300">
	              <tr>
	                <th scope="col">ID</th>
	                <th scope="col">Name</th>
                    <th scope="col">Spotify ID</th>
                    <th scope="col">Youtube ID</th>
                    <th scope="col">Apple ID</th>
	                <th scope="col">Action</th>
	              </tr>
	            </thead>
	            <tbody>
	                @foreach($artistslist as $cat)
	              <tr>
	                <th scope="row">{{ $loop->iteration }}</th>
	                <td>{{ $cat->name }}</td>
                    <td>{{ $cat->spotify }}</td>
                    <td>{{ $cat->youtube }}</td>
                    <td>{{ $cat->apple }}</td>
	                <td>
	                   <a href="javascript:void(0)" class="text-primary" wire:click="edit({{ $cat->id }})"><i class="ri-edit-2-line"></i> Edit</a>
	                  <a href="javascript:void(0)" class="text-danger"  wire:click="delete({{ $cat->id }})" onclick="confirm('Are you sure you want to remove the user from this group?') || event.stopImmediatePropagation()"><i class="ri-delete-bin-fill"></i> Delete</a>
	                </td>
	              </tr>
	                @endforeach
	            </tbody>
	        </table>
	      </div>
	      {!! $artistslist->links('pagination::bootstrap-5') !!}
	    </div>


        
	    <div wire:ignore.self class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
	        <div class="modal-dialog modal-dialog-centered">
		        <div class="modal-content" >
		            <div class="modal-header">
		                <h5 class="modal-title">{{ $updateCategoryMode ? 'Update Artists' : 'Add Artists' }}</h5>
		                <button type="button" class="btn-close" wire:click="resetModalForm" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>

		            <div class="modal-body">
		                <label for="" class="fw-bold mb-2">Artists Name</label>	
		                <div class="form-group">
		                    <input type="text" wire:model="name" class="form-control" placeholder="Artists Name">
		                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
		                </div>
                        
		                <label for="" class="fw-bold mb-2">Spotify Id</label>	
		                <div class="form-group">
		                    <input type="text" wire:model="spotify" class="form-control" placeholder="Spotify Id">
		                    @error('spotify') <span class="text-danger">{{ $message }}</span> @enderror
		                </div>

                        
		                <label for="" class="fw-bold mb-2">Youtube ID</label>	
		                <div class="form-group">
		                    <input type="text" wire:model="youtube" class="form-control" placeholder="Youtube ID">
		                    @error('youtube') <span class="text-danger">{{ $message }}</span> @enderror
		                </div>
                        
		                <label for="" class="fw-bold mb-2">Apple ID</label>	
		                <div class="form-group">
		                    <input type="text" wire:model="apple" class="form-control" placeholder="Apple ID">
		                    @error('apple') <span class="text-danger">{{ $message }}</span> @enderror
		                </div>
		            </div>




		            <div class="modal-footer">
		                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
		                <button 
			                @if($updateCategoryMode) 
					            wire:click = 'updateArtists'
					        @else
					            wire:click = 'addArtists'
					        @endif 
				        class="btn btn-primary">{{ $updateCategoryMode ? 'Update' : 'Save' }}</button>
		            </div>
		        </div>
	        </div>
	    </div>


	</div>

</div>


