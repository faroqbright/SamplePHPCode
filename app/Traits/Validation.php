<?php

namespace App\Traits;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

trait Validation{

	public function validateUpdateProfile($request)
    {
    	return $request->validate([
            	'username' => 'required',
                'title' => 'nullable|string',
                'link' => 'nullable|string',
                'address' => 'nullable|string',
	        ],
		    [
			   'username.required' => 'Username is required.'
			]
		);
    }

}
