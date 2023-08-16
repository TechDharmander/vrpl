<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{SongCategory, SongSubcategory as SubCategoryModel};
use App\Traits\Toastr;

class SongSubcategory extends Component
{
	use Toastr;
	public $title;
	public $category_id;
	public $selected_id;
	public $updateSubcategoryMode = false;
	protected $listeners = [ 'resetForm' ];

	public function resetForm()
	{
		$this->resetErrorBag();
		$this->title = '';
		$this->category_id = '';
		$this->selected_id = '';
	}

	public function addSubCategory()
	{
		$this->validate([
			'title' => 'required|unique:song_categories,title',
			'category_id' => 'required'
		]);

        $songCat = new SubCategoryModel();
        $songCat->title = $this->title;
        $songCat->category_id = $this->category_id;
        $saved = $songCat->save();
        $this->resetForm();
        $this->dispatchBrowserEvent('hideModel');		
	}
	public function updateSubCategory()
	{
		$this->validate([
			'category_id' => 'required',
			'title' => 'required|unique:song_categories,title,'.$this->selected_id,
		]);
        
        $songCat = SubCategoryModel::find($this->selected_id);
        $songCat->title = $this->title;
        $songCat->category_id = $this->category_id;
        $saved = $songCat->save();
        $this->showToastr('This song subcategory update successfully.', 'success');
        $this->resetForm();
        $this->dispatchBrowserEvent('hideModel');		
	}
	public function edit($id)
	{
		try {
            $subcategory = SubCategoryModel::findorfail($id);
            $this->title = $subcategory->title;
            $this->category_id = $subcategory->category_id;
            $this->selected_id = $subcategory->id;
            $this->updateSubcategoryMode = true;
            $this->dispatchBrowserEvent('showModel');
        } catch (Exception $e) {
            $message = $e->getMessage();
            $this->showToastr($message, 'error');
        }
	}
	public function delete($id)
	{
		$item = SubCategoryModel::findorfail($id);
		$deleted = $item->delete();
		if($deleted){
			$this->showToastr('This subcategory deleted successfully.', 'success');
		}else{
			$this->showToastr('Failed delete operation.', 'error');
		}
	}
    public function render()
    {
    	$categories = SongCategory::all();
    	$subcategories = SubCategoryModel::with('category')->paginate(20);
    	// dd($subcategories->toArray());
        return view('livewire.admin.song-subcategory', compact('categories','subcategories'))->layout('layouts.master');
    }
}
