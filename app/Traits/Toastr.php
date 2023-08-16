<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait Toastr{

	public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }
	

}