<div>
    <div class="card card-post">
        <div class="card-header">
          <h5 class="card-title">Song Composers</h5>
          {{-- <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"><i class="ri-menu-add-fill"></i> Add Song Composers</a> --}}
        </div>

        <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-bordered table-hover">
	            <thead class="flex-fill bg-gray-300">
	              <tr>
	                <th scope="col">ID</th>
	                <th scope="col">Name</th>
	                <th scope="col">Action</th>
	              </tr>
	            </thead>
	            <tbody>
	                @foreach($composerlist as $cat)
	              <tr>
	                <th scope="row">{{ $loop->iteration }}</th>
	                <td>{{ $cat->name }}</td>
	                <td>

	                    <a href="javascript:void(0)" class="text-primary"><i class="ri-edit-2-line"></i> Edit</a>
	                    <a href="javascript:void(0)" class="text-danger" onclick="confirm('Are you sure you want to remove the user from this group?') || event.stopImmediatePropagation()"><i class="ri-delete-bin-fill"></i> Delete</a>

	                </td>
	              </tr>
	                @endforeach
	            </tbody>
	        </table>
	      </div>
	      {!! $composerlist->links('pagination::bootstrap-5') !!}
	    </div>


	</div>
</div>

