<?php
  include_once 'Error.php';
  class Image extends HttpError
  {
    function get_web_path($file_system_path)
    {
    	return str_replace($_SERVER['DOCUMENT_ROOT'], '', $file_system_path);
    }
    function uploadImage($conn, $image_fieldname, $upload_dir)
    {
        if ($_FILES[$image_fieldname]['size'] !== 0) {
        # Potential PHP upload errors
        $php_errors = array(1 => 'Maximum file size in php.ini exceeded',
        2 => 'Maximum file size in HTML form exceeded',
        3 => 'Only part of the file was uploaded',
        4 => 'No file was selected to upload.');

        # Make sure we didn't have an error uploading the image
        ($_FILES[$image_fieldname]['error'] == 0)
        or $this->handle_error("the server couldn't upload the image you selected.",
        $php_errors[$_FILES[$image_fieldname]['error']]);

        # Is this file the result of a valid upload?
        @is_uploaded_file($_FILES[$image_fieldname]['tmp_name'])
        or $this->handle_error("you were trying to do something naughty. Shame on you!",
        "Uploaded request: file named " .
        "'{$_FILES[$image_fieldname]['tmp_name']}'");

        # Is this actually an image?
        @getimagesize($_FILES[$image_fieldname]['tmp_name'])
        or $this->handle_error("you selected a file for your picture " .
        "that isn't an image.",
        "{$_FILES[$image_fieldname]['tmp_name']} " .
        "isn't a valid image file.");

        # Name the file uniquely
        $now = time();
        while (file_exists($upload_filename = $upload_dir . $now .
        '-' .
        $_FILES[$image_fieldname]['name'])) {
        	$now++;
        }

        # Finally, move the file to its permanent location
        @move_uploaded_file($_FILES[$image_fieldname]['tmp_name'], $upload_filename)
         or $this->handle_error("we had a problem saving your image to " .
         "its permanent location.",
         "permissions or related error moving " .
         "file to {$upload_filename}");

         return $upload_filename;
       } else {
         return NULL;
       }
    }

    public function showImage($conn, $tbname)
    {
      try{
      	if(!isset($_REQUEST['image_id'])) {
      	  $this->handle_error("No image to load was specified.");
      	}

        $image_id = $_REQUEST['image_id'];

        // Build the SELECT statement
        $select_query = sprintf("SELECT * FROM $tbname WHERE image_id = %d",
        $image_id);

        // Run the query
        $result = mysqli_query($conn, $select_query);

        // Get the result and handle errors from getting no result
        if (mysqli_num_rows($result) == 0) {
        $this->handle_error("we couldn't find the requested image.",
        "No image found with an id of " . $image_id . ".");
        }

        $image = mysqli_fetch_array($result);

        // Tell the browser what's coming with headers
        header('Content-type: ' . $image['mime_type']);
        header('Content-length: ' . $image['file_size']);

        return $image['image_data'];
    	} catch (Exception $exc) {
    		$this->handle_error("something went wrong loading your image.",
        "Error loading image: " . $exc->getMessage());
      }
    }
  }
  $image = new Image;
?>
