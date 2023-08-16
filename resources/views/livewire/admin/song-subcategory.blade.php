<div>
    <div class="card card-post">
        <div class="card-header">
          <h5 class="card-title">Song Subcategories</h5>
          <a href="#addModal" class="btn btn-primary btn-sm" data-bs-toggle="modal"><i class="ri-menu-add-fill"></i> Add Song Subcategory</a>
        </div>

        <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-bordered table-hover">
	            <thead class="flex-fill bg-gray-300">
	              <tr>
	                <th scope="col">ID</th>
	                <th scope="col">Category</th>
	                <th scope="col">Subcategory</th>
	                <th scope="col">Action</th>
	              </tr>
	            </thead>
	            <tbody>
	                @foreach($subcategories as $subcat)
	              <tr>
	                <th scope="row">{{ $loop->iteration }}</th>
	                <td>@isset($subcat->category) {{ $subcat->category->title }} @endif</td>
	                <td>{{ $subcat->title }}</td>
	                <td>
	                    <a href="javascript:void(0)" class="text-primary" wire:click="edit({{ $subcat->id }})"><i class="ri-edit-2-line"></i> Edit</a>
	                    <a href="javascript:void(0)" class="text-danger"  wire:click="delete({{ $subcat->id }})" onclick="confirm('Are you sure you want to remove this subcategory?') || event.stopImmediatePropagation()"><i class="ri-delete-bin-fill"></i> Delete</a>
	                </td>
	              </tr>
	                @endforeach
	            </tbody>
	        </table>
	      </div>
	      {!! $subcategories->links('pagination::bootstrap-5') !!}
	    </div>

        
	    <div wire:ignore.self class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
	        <div class="modal-dialog modal-dialog-centered">
		        <div class="modal-content" >
		            <div class="modal-header">
		                <h5 class="modal-title">{{ $updateSubcategoryMode ? 'Update Subcategory' : 'Add Subcategory' }}</h5>
		                <button type="button" class="btn-close" wire:click="resetForm" data-bs-dismiss="modal" aria-label="Close"></button>
		            </div>
		            <div class="modal-body">
		            	<label for="" class="fw-bold mb-2">Category</label>	
		                <div class="form-group mb-3">
		                    <select wire:model = 'category_id' class="form-control">
		                    	<option value="">--Choose Category--</option>
		                    	@foreach($categories as $cat)
		                    		<option value="{{ $cat->id }}">{{ $cat->title }}</option>
		                    	@endforeach
		                    </select>
		                    @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
		                </div>
		            	<label for="" class="fw-bold mb-2">Subcategory Title</label>	
		                <div class="form-group">
		                    <input type="text" wire:model="title" class="form-control" placeholder="Subcategory Title">
		                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
		                </div>
		            </div>
		            <div class="modal-footer">
		                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
		                <button 
			                @if($updateSubcategoryMode) 
					            wire:click = 'updateSubCategory'
					        @else
					            wire:click = 'addSubCategory'
					        @endif 
				        class="btn btn-primary">{{ $updateSubcategoryMode ? 'Update' : 'Save' }}</button>
		            </div>
		        </div>
	        </div>
	    </div>


	</div>
</div>

