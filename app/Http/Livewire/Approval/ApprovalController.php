<?php

namespace App\Http\Livewire\Approval;

use App\Helpers\Helper;
use Livewire\Component;
use App\Traits\Toastr;
use Auth;
use App\Enums\SongStatusEnum;
use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\DB;
use App\Models\{User, Country, State, City,Song,Label,SongCategory,SongSubcategory,Remark,Reason};

class ApprovalController extends Component
{
    use Toastr;
    public $isrc_code,$user_id ,$label_id ,$thumbnail,$song_name,$album_name,$adult,$song_duration,$category,$subcategory,$genre,$language;
    public $description,$caller_tune_name,$caller_tune_timing,$date_for_live,$indian_dsps,$artist,$status,$international_dsps,$youtube_content_id_copywrite,$facebook_music;

    public $s_id,$s_name,$s_label_name,$user_name,$s_thumbnail,$s_audio,$s_album_name,$s_adult,$s_duration,$s_category,$s_subcategory,$s_genre,$s_language,$s_description,$s_caller_tune_name,$plateforms;


    public $s_caller_tune_timing,$s_date_for_live,$s_status,$s_date,$s_composer,$s_lyricist,$s_indian_dsps,$s_international_dsps,$s_artist,$s_youtube_content_id_copywrite,$s_facebook_music,$s_featured_artist;
    public $selected_id, $remart_status,$reasonlist,$remarkbox,$allreasonlist;
    public $remarkView = false;

    public function mount(){
         $this->view_song_info = collect();
         $this->allreasonlist = Reason::all();
    }

    protected $listener = [
        'resetModalForm'
    ];

    public function resetModalForm()
    {
        $this->resetErrorBag();
        
    }
    public function showRemark($st)
    {
        $this->remarkView = true;
        $this->remart_status = $st;
    }
    public function hideRemark()
    {
        $this->remarkView = false;
        $this->remart_status = null;        
    }

    public function saveRemark($type,$id)
    {
        $this->validate([
            'reasonlist' => 'required',
          ]);


          if($type=='onhold'){
            $ss_status=SongStatusEnum::ONHOLD->value;
          }else{
            $ss_status=SongStatusEnum::UNAPPROVED->value;
          }

          $save_Song = Song::find($id);
          $save_Song->status = $ss_status;  
          $saved = $save_Song->save();          


        $s_remarks = new Remark();
        $s_remarks->reason_id = $this->reasonlist;
        $s_remarks->song_id = $id;
        $s_remarks->user_id = Auth::id();
        $s_remarks->remark = $this->remarkbox;
        $s_remarks->song_status = $ss_status;
        
        $saved = $s_remarks->save();
        $this->resetModalForm();
        $this->dispatchBrowserEvent('hideModel');

    }
    
    public function actionApproved($id)
    {
        $save_Song = Song::find($id);
        $save_Song->status = SongStatusEnum::APPROVED->value;  
        $save_Song->isrc_code = Helper::isrcCode();
        $saved = $save_Song->save();

        $s_remarks = new Remark();
        $s_remarks->reason_id ='1';
        $s_remarks->song_id = $id;
        $s_remarks->user_id = Auth::id();
        $s_remarks->remark = 'Song APPROVED by Super Admin';
        $s_remarks->song_status = SongStatusEnum::APPROVED->value;
        $saved = $s_remarks->save();
        $this->resetModalForm();
        $this->dispatchBrowserEvent('hideModel');

    }

    public function viewSongInfo($id)
    {

        $songinfo=Song::where('id',$id)->where('status',SongStatusEnum::PENDING->value)->first();
       
        $this->s_id = $songinfo->id;
        $this->user_name = User::where('id',$songinfo->user_id)->value('name');
        $this->s_label_name = Label::where('id',$songinfo->label_id)->value('label');
        
        $this->s_thumbnail = $songinfo->thumbnail;
        $this->s_audio = $songinfo->audio;
        $this->s_name = $songinfo->song_name;
        $this->s_album_name = $songinfo->album_name;
        $this->s_adult =  $songinfo->adult ? 'Yes' : 'No';
        $this->s_duration = $songinfo->song_duration;
        $this->s_category = SongCategory::where('id',$songinfo->category)->value('title'); 
        $this->s_subcategory = SongSubcategory::where('id',$songinfo->subcategory)->value('title'); 
        $this->s_genre = $songinfo->genre;
        $this->s_language = $songinfo->language;
        $this->s_featured_artist= $songinfo->featured_artist;
        $this->s_artist= $songinfo->artist;
        $this->s_composer= $songinfo->composer;
        $this->s_lyricist= $songinfo->lyricist;
        
        $this->s_description = $songinfo->description;
        $this->s_caller_tune_name = $songinfo->caller_tune_name;
        $this->s_caller_tune_timing = $songinfo->caller_tune_timing;
        $this->s_date_for_live = $songinfo->date_for_live;
        $this->s_status = $songinfo->status;

        $this->s_date = $songinfo->created_at;

        $this->s_indian_dsps = $songinfo->indian_dsps ? 'Yes' : 'No';
        $this->s_international_dsps = $songinfo->international_dsps ? 'Yes' : 'No';
        $this->s_youtube_content_id_copywrite = $songinfo->youtube_content_id_copywrite ? 'Yes' : 'No';
        $this->s_facebook_music = $songinfo->facebook_music ? 'Yes' : 'No';


        $this->selected_id = $songinfo->id;
        $this->dispatchBrowserEvent('showModel');
    }

    public function render()
    {
        $songs_data=Song::where('status',SongStatusEnum::PENDING->value)->paginate(20);    

        return view('livewire.approval.approval-controller', compact('songs_data'))->layout('layouts.master');
    }
}