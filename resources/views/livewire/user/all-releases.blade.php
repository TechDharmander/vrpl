<div>
	
		<div class="card">
			<div class="card-header bg-dark text-white"><h4 class="m-0">Songs List</h4></div>
			<div class="card-body">
				<div class="row">
					<div class="table-responsive">
					  <table class="table table-bordered table-striped table-hover align-middle">
					    <thead>
					      <tr>
					       	<th>#</th>
					       	<th>Image</th>
					       	<th>Song/Album Name</th>
					       	<th>Artist</th>
					       	<th>Featured Artist</th>
					       	<th>Composer</th>
					       	<th>Lyricist</th>
					       	<th>Producer</th>
					       	<th>Genre</th>
					       	<th>Song Duration</th>
					       	<th>Lang<sup>n</sup></th>
					       	<th>Tune Name</th>
					       	<th>Tune Timing</th>
					       	<th>Live Date</th>
					      </tr>
					    </thead>
					    <tbody>
					      
				        	@forelse($songsList as $k)
				        	<tr>
				        		<td>{{ $loop->iteration }}</td>
						       	<td>@if(!empty($k->thumbnail)) <img src="{{ asset('storage/'.$k->thumbnail);}}" width="50"> @endif</td>
						       	<td>{{ $k->song_name }}<br>{{ $k->album_name }}</td>
						       	<td>{{ $k->artist }}</td>
						       	<td>{{ $k->featured_artist }}</td>
						       	<td>{{ $k->composer }}</td>
						       	<td>{{ $k->lyricist }}</td>
						       	<td>{{ $k->producer }}</td>
						       	<td>{{ $k->genre }}</td>
						       	<td>{{ $k->song_duration }}</td>
						       	<td>{{ $k->language }}</td>
						       	<td>{{ $k->caller_tune_name }}</td>
						       	<td>{{ $k->caller_tune_timing }}</td>
						       	<td>{{ $k->date_for_live }}</td>
					       </tr>
				        	@empty
				        		<td colspan="15">No Data Found!!</td>
				        	@endforelse
					      
					    </tbody>
					  </table>
					</div>
				</div>
			</div>
		</div>
	
</div>
