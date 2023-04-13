<?php 

if (! function_exists('getCurrentUser')){
	function getCurrentUser(){
		return session()->get('user');
	}
}