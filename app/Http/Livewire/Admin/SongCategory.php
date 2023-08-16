<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\SongCategory as SongCategoryModel;
use App\Traits\Toastr;

class SongCategory extends Component
{
	use Toastr;

	public $title;
	public $selected_id;
	public $updateCategoryMode = false;
    protected $listener = [
        'resetModalForm'
    ];

    public function resetModalForm()
    {
        $this->resetErrorBag();
        $this->title = '';
        $this->selected_id = '';
    }

	public function addCategory()
	{
		$this->validate([
			'title' => 'required|unique:song_categories,title',
		]);
        
        $songCat = new SongCategoryModel();
        $songCat->title = $this->title;
        $saved = $songCat->save();
        $this->resetModalForm();
        $this->dispatchBrowserEvent('hideModel');		
	}
	public function updateCategory()
	{
		$this->validate([
			'title' => 'required|unique:song_categories,title,'.$this->selected_id,
		]);
        
        $songCat = SongCategoryModel::find($this->selected_id);
        $songCat->title = $this->title;
        $saved = $songCat->save();
        $this->showToastr('This song category update successfully.', 'success');
        $this->resetModalForm();
        $this->dispatchBrowserEvent('hideModel');		
	}
	public function edit($id)
	{
		try {
            $category = SongCategoryModel::findorfail($id);
            $this->title = $category->title;
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
            $category = SongCategoryModel::findorfail($id);
            $delete = $category->delete();
            $this->showToastr('This song category deleted successfully.', 'success');
        } catch (Exception $e) {
            $message = $e->getMessage();
            $this->showToastr($message, 'error');
        }
	}

   	public function render()
	{
    	$song_categories = SongCategoryModel::paginate(20);
		return view('livewire.admin.song-category', compact('song_categories'))->layout('layouts.master');
	}
}
