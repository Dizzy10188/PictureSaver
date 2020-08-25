<?php

// Path: \app\Http\Controllers

namespace App\Http\Controllers;

class myController 
{
	public function page($value){
	echo "My value = " . $value;
	// OR
	// return view('blaw'); // Use the same format as in the route page sample for data.  
	}
}
