<?php

function delete_img_emty()
{

	// Delete file images empty
	// get link
 	$path_file = FCPATH . 'api/users/avatar/';
 	// get name images in folder
 	$files1 = array_slice(scandir('api/users/avatar'),2);
 	// get link images in database
 	$datas = $this->Users_Model->get_img_all();
 	$img_name = [];

 	foreach ($datas as $data) {
 		// get name images in database
 		$img_name[] = str_replace('users/avatar/',"", $data->avatar);
 	}

 	for($i = 0; $i < count($files1); $i++)
 	{
 		// check 
 		if(!in_array($files1[$i], $img_name))
 		{
 			$file = $path_file.$files1[$i];
 			if(file_exists($file)) {
 				// remove images in folder
	 			unlink($file);
	 		}
 		}
 	}

}


