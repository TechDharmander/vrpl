<div>
    <form  method="post" class="mb-5" wire:submit.prevent='addRelease()' enctype="multipart/form-data" >
       
        {{-- Category :: Step 1 --}}
        @if ($currentStep == 1)
        <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 1/3 - Basic Details</div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                        	<label class="mb-1">Audio File to upload (200 MB max)<span class="text-danger">*</span></label>
                        	<input type="file" wire:model="audio" id="fileinput" class="form-control">
                        	<div wire:loading wire:target="audio">Uploading Audio...</div>
                        	@if($audio)
                        		<div><audio controls volume preload='none' src='{{ $audio->temporaryUrl(); }}'></audio></div>
                        	@endif
                        	@error('audio')
	                            <div class="text-danger">{{ $message }}</div>
	                        @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                        	<label class="mb-1">Select Poster/Artwork file to Upload<span class="text-danger">*</span></label>
                        	<input type="file" wire:model="thumbnail" accept="image/*"  class="form-control" placeholder="Song Poster">
                        	<div wire:loading wire:target="thumbnail">Uploading Artwork...</div>
                        	@error('thumbnail')
	                            <div class="text-danger">{{ $message }}</div>
	                        @enderror
                        	@if($thumbnail)
                        		<div><img src="{{ $thumbnail->temporaryUrl(); }}" width="100" class="img-thumbnail" /></div>
                        	@endif
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-6">
	                        <div class="form-group mb-3">
	                        	<label class="mb-1">
	                        		<input type="checkbox" wire:model="terms1" > I consent to Vusic Records storing and using the uploaded file(s) for distribution and monetization
	                        	</label>
	                        	@error('terms1')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
	                        </div>
	                        <div class="form-group mb-3">
	                        	<label class="">
	                        		<input type="checkbox" wire:model="terms2" > I have complete rights to upload the files for distribution. The files are original work and not a cover song or modification of the original work (slowed, stretched etc). I am liable for no payments or takedown of my song if the tune or the lyrics or any part of my song is claimed to be someone else's original work, Vusic Records is not liable for any refunds in such case
	                        	</label>
	                        	@error('terms2')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
	                        </div>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{-- Song Features :: Step 2 --}}
        @if ($currentStep == 2)
        <div class="step-two">
            <div class="card">
                <div class="card-header bg-secondary">STEP 2/3 - Song Details</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3 px-5">
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">Song Name<span class="text-danger">*</span></label>
	                        	<input type="text" wire:model="song_name" class="form-control" placeholder="Song Title">
	                        	@error('song_name')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        	<!-- <div class="form-group mb-3">
	                        	<label class="mb-1">Film Name/Album Name (for single song album name = song name) <span class="text-danger">*</span></label>
	                        	<input type="text" wire:model="album_name" class="form-control" placeholder="Album Name">
	                        	@error('album_name')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div> -->
                        	<div class="form-group mb-3">
	                        	<label class="mb-1"> Is your track Adult 18+ *</label>
                        		<input type="radio" value="0" wire:model="adult" > No 
                        		<input type="radio" value="1" wire:model="adult" > Yes 
	                        	
	                        	@error('adult')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">Song length/duration (hh:mm:ss) <span class="text-danger">*</span></label>
	                        	<input type="text" wire:model="song_duration" class="form-control" placeholder="hh:mm:ss">
	                        	@error('song_duration')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">Category (select most suitable category, this will help in playlisting) <span class="text-danger">*</span></label>
	                        	<select wire:model="category" class="form-control">
	                        		<option value="">-- Category --</option>
	                        		@if(!empty($categories))
	                        			@foreach($categories as $cat)
	                        				<option value="{{ $cat->id }}">{{ $cat->title }}</option>
	                        			@endforeach
	                        		@endif
	                        	</select>
	                        	@error('category')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">Sub-Category (avlb. optns. Genre,religion,Diety,occasion,dance forms etc) <span class="text-danger">*</span></label>
	                        	<select wire:model="subcategory" class="form-control">
	                        		<option value="">-- Sub-Category --</option>
	                        		<!-- @if(!is_null($subcategories)) -->
	                        			@foreach($subcategories as $subcat)
	                        				<option value="{{ $subcat->id }}">{{ $subcat->title }}</option>
	                        			@endforeach
	                        		<!-- @endif -->
	                        	</select>
	                        	@error('subcategory')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">Mood/Feel/Genre <span class="text-danger">*</span> 
	                        		<!-- <a href="#addGenre" class="badge bg-primary float-end" data-bs-toggle="modal"><i class="ri-menu-add-fill"></i> Add Genre</a> --> </label>
	                        	<select wire:model="genre" class="form-control">
	                        		<option value="">-- Genre --</option>
	                        		@php $genresList = DB::table('genres')->orderBy('id','DESC')->get(); @endphp
	                        		@if(!empty($genresList))
	                        			@foreach($genresList as $gnr)
	                        				<option value="{{ $gnr->title }}">{{ $gnr->title }}</option>
	                        			@endforeach
	                        		@endif
	                        	</select>
	                        	@error('genre')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">Language of the song <span class="text-danger">*</span></label>
	                        	<select wire:model="language" class="form-control">
	                        		<option value="">-- Language --</option>
	                        		@php $languagesList = DB::table('languages')->orderBy('id','DESC')->get(); @endphp
	                        		@if(!empty($languagesList))
	                        			@foreach($languagesList as $lng)
	                        				<option value="{{ $lng->lang }}">{{ $lng->lang }}</option>
	                        			@endforeach
	                        		@endif
	                        	</select>
	                        	@error('language')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
		                    <!-- <div class="form-group mb-3">
					            <select id="select2F" class="form-select" multiple>
									<option value="Firefox">Firefox</option>
									<option value="Chrome">Chrome</option>
									<option value="Safari">Safari</option>
									<option value="Opera">Opera</option>
									<option value="Internet Explorer">Internet Explorer</option>
					            </select>
				            </div> -->	

                        	<div class="form-group mb-3">
                        		<label class="mb-1">Singers/Artists name(s) <span class="text-danger">*</span>  <a href="#addArtist" class="badge bg-primary float-end" data-bs-toggle="modal"><i class="ri-menu-add-fill"></i> Add Artist/Featured Artist</a> </label>
                        		
	                        	<select wire:model="artist" class="form-control" id="artist_tags" multiple>
	                        		<option value="">-- Artist --</option>
	                        		@php $artistList = DB::table('artists')->orderBy('id','DESC')->get(); @endphp
	                        		@if(!empty($artistList))
	                        			@foreach($artistList as $art)
	                        				<option value="{{ $art->name }}">{{ $art->name }}</option>
	                        			@endforeach
	                        		@endif
	                        	</select>
	                        	@error('artist')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">Feature Singers/Artists name(s) <span class="text-danger">*</span></label>
	                        	<select wire:model="featured_artist" class="form-control" id="featured_tags" multiple>
	                        		<option value="">-- Featured Artist --</option>
	                        		@if(!empty($artistList))
	                        			@foreach($artistList as $fart)
	                        				<option value="{{ $fart->name }}">{{ $fart->name }}</option>
	                        			@endforeach
	                        		@endif
	                        	</select>
	                        	@error('featured_artist')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">Composer/Music <span class="text-danger">*</span>  <a href="#addComposer" class="badge bg-primary float-end" data-bs-toggle="modal"><i class="ri-menu-add-fill"></i> Add Composer</a></label>
	                        	<select wire:model="composer" class="form-control">
	                        		<option value="">-- Composer/Music --</option>
	                        		@php $composerList = DB::table('composers')->orderBy('id','DESC')->get(); @endphp
	                        		@if(!empty($composerList))
	                        			@foreach($composerList as $comp)
	                        				<option value="{{ $comp->name }}">{{ $comp->name }}</option>
	                        			@endforeach
	                        		@endif
	                        	</select>
	                        	@error('composer')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">Lyricist  <span class="text-danger">*</span>  <a href="#addLyricist" class="badge bg-primary float-end" data-bs-toggle="modal"><i class="ri-menu-add-fill"></i> Add Lyricist</a></label>
	                        	<select wire:model="lyricist" class="form-control">
	                        		<option value="">-- Lyricist --</option>
	                        		@php $lyricistList = DB::table('lyricists')->orderBy('id','DESC')->get(); @endphp
	                        		@if(!empty($lyricistList))
	                        			@foreach($lyricistList as $lyrc)
	                        				<option value="{{ $lyrc->name }}">{{ $lyrc->name }}</option>
	                        			@endforeach
	                        		@endif
	                        	</select>
	                        	@error('lyricist')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">Music Producer (optional) </label>
	                        	<input type="text" wire.model='producer' class="form-control" placeholder="Producer">
	                        	@error('producer')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">One-Line description about your song <span class="text-danger">*</span></label>
	                        	<textarea wire:model="description" class="form-control" rows="5"></textarea>
	                        	@error('description')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>

		                    <p class="mb-3">Provide CallerTune (CT) Information below if confused, call 9315903706</p>
                        	
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">CallerTune Name(it can be same as song name) <span class="text-danger">*</span></label>
	                        	<input type="text" wire:model="caller_tune_name" class="form-control" placeholder="CallerTune Name*">
	                        	@error('caller_tune_name')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">Callertune start timing in min:sec | Maximum 45 sec | make sure it remains under the full song length <span class="text-danger">*</span></label>
	                        	<input type="text" wire:model="caller_tune_timing" class="form-control" placeholder="min:sec">
	                        	@error('caller_tune_timing')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">Date you want your song to be LIVE on <span class="text-danger">*</span></label>
	                        	<input type="date" wire:model="date_for_live" class="form-control" placeholder="your song will be live on this date in apps and stores">
	                        	@error('date_for_live')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">ISRC Code</label>
	                        	<input type="text" wire:model="isrc_code" class="form-control" placeholder="Leave blank if you don't have">
	                        	@error('isrc_code')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        	<div class="form-group mb-3">
	                        	<label class="mb-1">Registered Label <span class="text-danger">*</span></label>
	                        	<select wire:model="label" class="form-control">
	                        		<option value="">-- Label --</option>
	                        		<option value="1">Label 1</option>
	                        		<option value="2">Label 2</option>
	                        		<option value="3">Label 3</option>
	                        		<option value="4">Label 4</option>
	                        		<option value="5">Label 5</option>
	                        		<option value="6">Label 6</option>
	                        	</select>
	                        	@error('label')
		                            <div class="text-danger">{{ $message }}</div>
		                        @enderror
		                    </div>
                        </div>
                        <div class="col-md-6 mb-3">
                        	<h6>Instructions </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{--Song Dimension :: Step 3 --}}
        @if ($currentStep == 3)
        <div class="step-three">
            <div class="card">
                <div class="card-header bg-secondary">STEP 3/4 - Song Plateforms</div>
                <div class="card-body">
                    <div class="row">
                    	<div class="col-sm-6">
                    		<label class="mb-1 fw-bolder"> Uploaded on which plateforms</label>
                        	<div class="form-group mb-3">
                        		<label class="fw-bold"><input type="checkbox" value="indian_dsps" wire:model="plateforms" > Indian DSP's </label>
		                    </div>
                        	<div class="form-group mb-3">
                        		<label class="fw-bold"><input type="checkbox" value="international_dsps" wire:model="plateforms" > International DSP's  </label>
		                    </div>
                        	<div class="form-group mb-3">
                        		<label class="fw-bold"><input type="checkbox" value="youtube_content_id_copywrite" wire:model="plateforms" > YouTube Content ID Copywrite  </label>
		                    </div>
                        	<div class="form-group mb-3">
                        		<label class="fw-bold"><input type="checkbox" value="facebook_music" wire:model="plateforms" > Facebook Music </label> 
	                        </div>
                        	@error('plateforms')
	                            <div class="text-danger">{{ $message }}</div>
	                        @enderror
                    	</div>
                    	<div class="col-sm-6">

                    	</div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{--Song Dimension :: Step 4 --}}
        @if ($currentStep == 4)
        <div class="step-three">
            <div class="card">
                <div class="card-header bg-secondary">STEP 4/4 - Song Preview</div>
                <div class="card-body">
                    <div class="row">
                    	<div class="col-sm-5">
                    		<h4>{{ $song_name }}</h4>
                    		<div><img src="{{ $thumbnail->temporaryUrl(); }}" class="img-thumbnail" /></div>
                    		<div><audio controls volume preload='none' src='{{ $audio->temporaryUrl(); }}'></audio></div>
                    	</div>
                    	<div class="col-sm-7">
                    		<table class="table table-bordered table-strioed">
                    			<tr>
                    				<th>Album Name</th>
                    				<td>{{ $album_name }}</td>
                    			</tr>
                    			<tr>
                    				<th>Song Duration</th>
                    				<td>{{ $song_duration }}</td>
                    			</tr>
                    			<tr>
                    				<th>Song Category</th>
                    				<td>{{ $category }}</td>
                    			</tr>
                    			<tr>
                    				<th>Song Sub-Category</th>
                    				<td>{{ $subcategory }}</td>
                    			</tr>
                    			<tr>
                    				<th>Genre</th>
                    				<td>{{ $genre }}</td>
                    			</tr>
                    			<tr>
                    				<th>Language</th>
                    				<td>{{ $language }}</td>
                    			</tr>
                    			<tr>
                    				<th>Artists</th>
                    				<td>@php echo implode(',', $artist ) @endphp</td>
                    			</tr>
                    			<tr>
                    				<th>Featured Artists</th>
                    				<td>@php echo implode(',', $featured_artist ) @endphp</td>
                    			</tr>
                    			<tr>
                    				<th>Song Composers</th>
                    				<td>{{ $composer }}</td>
                    			</tr>
                    			<tr>
                    				<th>Lyricists</th>
                    				<td>{{ $lyricist }}</td>
                    			</tr>
                    			<tr>
                    				<th>Producers</th>
                    				<td>{{ $producer }}</td>
                    			</tr>
                    			<tr>
                    				<th>Description</th>
                    				<td>{{ $description }}</td>
                    			</tr>
                    			<tr>
                    				<th>Caller Tune Name</th>
                    				<td>{{ $caller_tune_name }}</td>
                    			</tr>
                    			<tr>
                    				<th>Caller Tune Timing</th>
                    				<td>{{ $caller_tune_timing }}</td>
                    			</tr>
                    			<tr>
                    				<th>Date For Live</th>
                    				<td>{{ $date_for_live }}</td>
                    			</tr>
                    			<tr>
                    				<th>ISRC Code</th>
                    				<td>{{ $isrc_code }}</td>
                    			</tr>
                    			<tr>
                    				<th>Label</th>
                    				<td>{{ $label }}</td>
                    			</tr>
                    			<tr>
                    				<th>Plateforms</th>
                    				<td>{{ implode(',',$plateforms) }}</td>
                    			</tr>
                    		</table>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="action-buttons d-flex justify-content-between bg-white p-2">
            @if ($currentStep == 1)
                <div></div>    
            @endif
            @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                <button type="button" class="btn btn-lg btn-info" wire:click='decreaseStep()'>Back</button>
            @endif
            @if ($currentStep == 3 || $currentStep == 2 || $currentStep == 1)
                <button type="button" class="btn btn-lg btn-info" wire:click='increaseStep()'>Next</button>
            @endif
            @if ($currentStep == 4)
                <button type="submit" class="btn btn-lg btn-success"> Add Song </button> 
            @endif
        </div>
    </form>

    <div wire:ignore.self class="modal fade" id="addGenre" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content" >
	            <div class="modal-header">
	                <h5 class="modal-title">Add Genre</h5>
	                <button type="button" class="btn-close" wire:click="resetForm" data-bs-dismiss="modal" aria-label="Close"></button>
	            </div>
	            <div class="modal-body">
	            <label for="" class="fw-bold mb-2">Genre</label>	
	                <div class="form-group">
	                    <input type="text" wire:model="genre_name" class="form-control" placeholder="Genre">
	                    @error('genre_name') <span class="text-danger">{{ $message }}</span> @enderror
	                </div>
	            </div>
	            <div class="modal-footer">
	                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
	                <button  wire:click = 'addGenre' class="btn btn-primary">Save</button>
	            </div>
	        </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="addLanguage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content" >
	            <div class="modal-header">
	                <h5 class="modal-title">Add Language</h5>
	                <button type="button" class="btn-close" wire:click="resetForm" data-bs-dismiss="modal" aria-label="Close"></button>
	            </div>
	            <div class="modal-body">
	            <label for="" class="fw-bold mb-2">Language</label>	
	                <div class="form-group">
	                    <input type="text" wire:model="lang" class="form-control" placeholder="Language">
	                    @error('lang') <span class="text-danger">{{ $message }}</span> @enderror
	                </div>
	            </div>
	            <div class="modal-footer">
	                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
	                <button  wire:click = 'addLanguage' class="btn btn-primary">Save</button>
	            </div>
	        </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="addArtist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content" >
	            <div class="modal-header">
	                <h5 class="modal-title">Add Artist</h5>
	                <button type="button" class="btn-close" wire:click="resetForm" data-bs-dismiss="modal" aria-label="Close"></button>
	            </div>
	            <div class="modal-body">	
	                <div class="form-group mb-3">
	            		<label for="" class="fw-bold mb-2">Language</label>
	                    <input type="text" wire:model="artist_name" class="form-control" placeholder="Artist Name">
	                    @error('artist_name') <span class="text-danger">{{ $message }}</span> @enderror
	                </div>	
	                <div class="form-group mb-3">
	            		<label for="" class="fw-bold mb-2">Spotify ID</label>
	                    <input type="text" wire:model="spotify" class="form-control" placeholder="Spotify ID">
	                    @error('spotify') <span class="text-danger">{{ $message }}</span> @enderror
	                </div>		
	                <div class="form-group mb-3">
	            		<label for="" class="fw-bold mb-2">Apple ID</label>
	                    <input type="text" wire:model="apple" class="form-control" placeholder="apple ID">
	                    @error('apple') <span class="text-danger">{{ $message }}</span> @enderror
	                </div>	
	            </div>
	            <div class="modal-footer">
	                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
	                <button  wire:click = 'addArtist' class="btn btn-primary">Save</button>
	            </div>
	        </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="addComposer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content" >
	            <div class="modal-header">
	                <h5 class="modal-title">Add Composer</h5>
	                <button type="button" class="btn-close" wire:click="resetForm" data-bs-dismiss="modal" aria-label="Close"></button>
	            </div>
	            <div class="modal-body">
	            <label for="" class="fw-bold mb-2">Composer</label>	
	                <div class="form-group">
	                    <input type="text" wire:model="composer_name" class="form-control" placeholder="Composer">
	                    @error('composer_name') <span class="text-danger">{{ $message }}</span> @enderror
	                </div>
	            </div>
	            <div class="modal-footer">
	                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
	                <button  wire:click = 'addComposer' class="btn btn-primary">Save</button>
	            </div>
	        </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="addProducer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content" >
	            <div class="modal-header">
	                <h5 class="modal-title">Add Producer</h5>
	                <button type="button" class="btn-close" wire:click="resetForm" data-bs-dismiss="modal" aria-label="Close"></button>
	            </div>
	            <div class="modal-body">
	            <label for="" class="fw-bold mb-2">Producer</label>	
	                <div class="form-group">
	                    <input type="text" wire:model="producer_name" class="form-control" placeholder="Producer">
	                    @error('producer_name') <span class="text-danger">{{ $message }}</span> @enderror
	                </div>
	            </div>
	            <div class="modal-footer">
	                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
	                <button  wire:click = 'addProducer' class="btn btn-primary">Save</button>
	            </div>
	        </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="addLyricist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content" >
	            <div class="modal-header">
	                <h5 class="modal-title">Add Lyricist</h5>
	                <button type="button" class="btn-close" wire:click="resetForm" data-bs-dismiss="modal" aria-label="Close"></button>
	            </div>
	            <div class="modal-body">
	            <label for="" class="fw-bold mb-2">Lyricist</label>	
	                <div class="form-group">
	                    <input type="text" wire:model="lyricist_name" class="form-control" placeholder="Lyricist">
	                    @error('lyricist_name') <span class="text-danger">{{ $message }}</span> @enderror
	                </div>
	            </div>
	            <div class="modal-footer">
	                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
	                <button  wire:click = 'addLyricist' class="btn btn-primary">Save</button>
	            </div>
	        </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
	$(document).ready(function(){
		var audio = document.createElement('audio');
		// Add a change event listener to the file input
		document.getElementById("fileinput").addEventListener('change', function(event){
		  var target = event.currentTarget;
		  var file = target.files[0];
		  var reader = new FileReader();
		  if (target.files && file) {
		      var reader = new FileReader();
		      reader.onload = function (e) {
		          audio.src = e.target.result;
		          audio.addEventListener('loadedmetadata', function(){
		              // Obtain the duration in seconds of the audio file (with milliseconds as well, a float value)
		              var duration = audio.duration;
		              var min = Math.floor(duration / 60);
		              var sec = Math.floor(duration - min * 60);
		              let song_duration = `${min}:${sec}`;
		              let song_name = file.name;
		              // $('#song_name').attr('value', file.name);
		              // $('#song_duration').attr('value', `${min}:${sec}`);
		              // alert(file.name)
		              window.livewire.emit("updateSongName",song_name);
		              window.livewire.emit("updateSongDuration",song_duration);
		              // alert('hello');
		          },false);
		      };
		      reader.readAsDataURL(file);
		  }
		}, false);
	});
	$(document).ready(function() {
	    $('#artist_tags').select2({
		  placeholder: 'Choose Three Artists',
		  allowClear: true,
		  minimumResultsForSearch: 3,
		  minimumResultsForSearch: Infinity
		});
	    $('#artist_tags').on('change', function(e){
	    	let data = $('#artist_tags').select2('val');
	    	@this.set('artist', data);
	    });
	    $('#feature_artist_tags').select2({
		  placeholder: 'Choose Three Artists',
		  allowClear: true,
		  minimumResultsForSearch: 3,
		  minimumResultsForSearch: Infinity
		});
	    $('#feature_artist_tags').on('change', function(e){
	    	let data = $('#feature_artist_tags').select2('val');
	    	@this.set('featured_artist', data);
	    });
	});
</script>
@endpush
