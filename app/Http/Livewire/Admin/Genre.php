<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Traits\Toastr;
use App\Models\Genre as GenreModel;

class Genre extends Component
{
	use Toastr;
	public $title;
	public $selected_id;
	public $updateMode = false;
	protected $listener = ['resetForm'];

	public function resetForm()
	{
		$this->resetErrorBag();
		$this->title = '';
		$this->selected_id = '';
		$this->updateMode = false;
	}
	public function addGenre()
	{
		$this->validate([
			'title' => 'required|unique:genres,title',
		]);
        
        $genreCat = new GenreModel();
        $genreCat->title = $this->title;
        $saved = $genreCat->save();
        $this->resetForm();
        $this->dispatchBrowserEvent('hideModel');		
	}
	public function updateGenre()
	{
		$this->validate([
			'title' => 'required|unique:genres,title,'.$this->selected_id,
		]);
        $genreCat = GenreModel::find($this->selected_id);
        $genreCat->title = $this->title;
        $saved = $genreCat->save();
        $this->showToastr('This song Genre update successfully.', 'success');
        $this->resetForm();
        $this->dispatchBrowserEvent('hideModel');		
	}
	public function edit($id)
	{
		try {
            $genre = GenreModel::findorfail($id);
            $this->title = $genre->title;
            $this->selected_id = $genre->id;
            $this->updateMode = true;
            $this->dispatchBrowserEvent('showModel');
        } catch (Exception $e) {
            $message = $e->getMessage();
            $this->showToastr($message, 'error');
        }
	}
	public function delete($id)
	{
		try {
            $genre = GenreModel::findorfail($id);
            $delete = $genre->delete();
            $this->showToastr('This song Genre deleted successfully.', 'success');
        } catch (Exception $e) {
            $message = $e->getMessage();
            $this->showToastr($message, 'error');
        }
	}
    public function render()
    {
    	$genres = GenreModel::orderBy('id','DESC')->paginate(20);
        return view('livewire.admin.genre', compact('genres'))->layout('layouts.master');
    }
}
