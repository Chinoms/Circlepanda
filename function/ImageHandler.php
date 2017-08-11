<?php
  include_once '__autoload.php';
  class Image Extends HttpError
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
      }
    }
  }
  $image = new Image;
?>
