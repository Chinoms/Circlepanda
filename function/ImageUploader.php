<?php
class ImageUploader
{

  protected
      $size_limit,
      $allowed_extensions,
      $failed_saves;

  public function __construct(int $limit, array $extensions){
      $this->size_limit = $limit;
      $allowed_extensions = $extensions;
  }

  public function saveImage(array $images){
      foreach($images as $image){
          if($this->meetsSizeLimit($image['size'])){
              if($this->hasValidExtension(end(explode(".", $image["name"])))){
                  $this->storeImage($image, $this->getNextImageIndex());
              } else {
                $failed_saves[$image["name"] = "Invalid file type.";
              }
          } else {
          $failed_saves["name"] = "File is too large.";
        }
      }
      return $failed_saves;
  }

  public function meetsSizeLimit(int $size){
      return $size <= $this->size_limit;
  }

  public function hasValidExtension(string $extention){
      return in_array($extension, $this->allowed_extensions)
  }

  public function storeImage($image, $unique_id){
      move_uploaded_file($image["tmp_name"], "you_relative_file_path" . $image["name"]);
      rename('your_relative_file_path' . $image["name"], 'your_relative_file_path/img' . $unique_id . '.' . $extension);
      //Place your query for storing the image id and path in table 'post_img'
  }

  public function getNextImageIndex(){
      //Code to get the next available image id or MAX(id) from table 'post_img'
  }
}
$imgupload = new ImageUploader;
?>
