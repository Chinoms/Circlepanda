<section class="tint-bottomlayer-post"></section>
<section class="tint-toplayer-post">
  <form action="<?php echo $data['url'] ?>" enctype="multipart/form-data" class="w3-container postmodal" method="post" onsubmit="return checkform(this)" target="_self">
    <div class="status-wrap">
      <span class="post-selector">
        <label class="myLabel btn-selector">
          <span>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
            <input type="file" name="uploadphoto" class="hide" accept="image/*" onchange="loadFile(event)">
              <i class="fa fa-camera"></i> upload photo
          </span>
        </label>
        <button type="button" name="button" class="btn-selector">
          <i class="fa fa-map-marker"></i> check in
        </button>
        <button type="button" name="button" class="btn-selector">
          <i class="fa fa-tag"></i> tag
        </button>
      </span>
      <!-- Status Space -->
      <span class="status-space">
        <textarea class="text-space" placeholder="What's on your mind?" onkeyup="countChar(this)" maxlength="500" name="status"></textarea>
        <span class="text-counter"></span>
      </span>
      <div class="w3-container">
        <span class="uploaded-image">
          <img src="" id="output" alt="Preview uploads" class="img-preview">
        </span>
        <input type="submit" name="post" class="post-btn post" value="Post">
        <button type="button" class="post-btn cancel">Cancel</button>
      </div>
    </div>
  </form>
</section>
