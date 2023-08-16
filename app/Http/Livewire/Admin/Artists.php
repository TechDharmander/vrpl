<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Artist as ArtistsModel;
use App\Traits\Toastr;



class Artists extends Component
{

    use Toastr;

	public $name;
    public $spotify;
    public $youtube;
    public $apple;
	public $selected_id;
	public $updateCategoryMode = false;


    protected $listener = [
        'resetModalForm'
    ];

    public function resetModalForm()
    {
        $this->resetErrorBag();
        $this->name = '';
        $this->spotify = '';
        $this->youtube = '';
        $this->apple = '';
        $this->selected_id = '';
    }
	public function updateArtists()
	{
		$this->validate([
			'name' => 'required'
		]);
        if($this->spotify != ''){
            $this->validate([
                'spotify' => 'required|unique:artists,spotify,'.$this->selected_id
            ]);
        }
        if($this->youtube != ''){
            $this->validate([
                'youtube' => 'required|unique:artists,youtube,'.$this->selected_id
            ]);
        }
        if($this->apple != ''){
            $this->validate([
                'apple' => 'required|unique:artists,apple,'.$this->selected_id
            ]);
        }
        
        $category = ArtistsModel::find($this->selected_id);
        $category->name = $this->name;
        $category->spotify=  $this->spotify;
        $category->youtube=   $this->youtube;
        $category->apple=    $this->apple;
        $saved = $category->save();
        $this->showToastr('This song category update successfully.', 'success');
        $this->resetModalForm();
        $this->dispatchBrowserEvent('hideModel');		
	}

	public function edit($id)
	{
		try {
            $category = ArtistsModel::findorfail($id);
            $this->name = $category->name;
            $this->spotify = $category->spotify;
            $this->youtube = $category->youtube;
            $this->apple = $category->apple;

            $this->selected_id = $category->id;
            $this->updateCategoryMode = true;
            $this->dispatchBrowserEvent('showModel');
        } catch (Exception $e) {
            $message = $e->getMessage();
            $this->showToastr($message, 'error');
        }
	}
	public function delete($id)
	{
		try {
            $category = ArtistsModel::findorfail($id);
            $delete = $category->delete();
            $this->showToastr('This song category deleted successfully.', 'success');
        } catch (Exception $e) {
            $message = $e->getMessage();
            $this->showToastr($message, 'error');
        }
	}



    public function render()
    {

        $artistslist = ArtistsModel::paginate(20);
		return view('livewire.admin.artists', compact('artistslist'))->layout('layouts.master');

    }
}
