<div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="flex-fill bg-gray-300">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($song_categories as $cat)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $cat->title }}</td>
                    <td>
                        <a href="" class="text-primary" wire:click="edit({{ $cat->id }})"><i class="ri-edit-2-line"></i> Edit</a>
                        <a href="" class="text-danger" wire:click="delete({{ $cat->id }})"><i class="ri-delete-bin-fill"></i> Delete</a>
                    </td>
                  </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
      </div>

        
          <div wire:ignore.self class="modal fade" id="modal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
              <form class="modal-content" 
              @if($updateCategoryMode) 
                  wire:submit.prevent = 'updateCategory()'
              @else
                  wire:submit.prevent = 'addCategory()'
              @endif
              >
                  <div class="modal-header">
                      <h5 class="modal-title">{{ $updateCategoryMode ? 'Update Category' : 'Add Category' }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div><!-- modal-header -->
                  <div class="modal-body">
                      @if($updateCategoryMode)
                          <input type="hidden" wire:model='selected_id'>
                      @endif
                  <label for="" class="fw-bold mb-2">Category Title</label>	
                      <div class="form-group">
                          <input type="text" wire:model="title" class="form-control" placeholder="Category Title">
                          @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">{{ $updateCategoryMode ? 'Update' : 'Save' }}</button>
                  </div>
              </form>
              </div>
          </div>
</div>
