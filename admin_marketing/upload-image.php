<?php

//function to upload files (especially images)
function upload_apartment_image($post_image, $post_image_temp, $fileError, $fileSize)
{
    $image_directory = "images/apartment_images";
    $fileArray = explode('.', $post_image); //explode() - creates an array
    //remove '.' dot extension from file. doing so, we get 2 parts: - name of file and extension

    $fileExt  = strtolower(end($fileArray)); //end() - get last data, and convert it to lowercase
    $allowedExt = array('jpg', 'jpeg', 'png'); //file extensions to be allowed

    if (in_array($fileExt, $allowedExt)) { //check if file is allowed to be uploaded
        if ($fileError === 0) { //check for errors

            //upload the file - specify destination
            $fileDestination = "$image_directory/$post_image"; //imp

            //move from temporary location to destination - upload file function
            move_uploaded_file($post_image_temp, $fileDestination);
            return $fileDestination;
        }
    }
}
