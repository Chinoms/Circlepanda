<!-- Edit Personals -->
    <section class="personal_holder hide">
      <!-- Left Pane -->
      <div class="left_ph_pane">
        <span class="col-sm-12">
          <h4 class="w3-bold">Update your Profile</h4>
          <hr>
        </span>
        <span class="col-sm-12">
          <a href="#worknedu" class="menu_span active">Work and Education</a>
          <a href="#contact" class="menu_span">Contact</a>
          <a href="#photo" class="menu_span">Manage Photo</a>
          <a href="#relation" class="menu_span">Relationship</a>
          <a href="#about" class="menu_span">About me</a>
        </span>
      </div>
      <!-- Right Pane -->
      <!-- Work & education Right Pane -->
      <span class="update-report"></span>
      <form action="#ajaxified" method="post" target="_self" class="right_ph_pane w3-container worknedu-switch">
        <span class="col-sm-12">
          <h3>WORK</h3>
        </span>
        <span class="col-sm-12">
          <div class="col-sm-12">
            <label for="workingat">Work at</label>
            <input type="text" name="workat" id="workingat" value="<?php echo $work; ?>" placeholder="Working at" class="input-c wr_at">
          </div>
          <div class="col-sm-6">
            <label for="workfrom">Work from</label>
            <select name="workfrom" class="input-c wr_frm" id="workfrom">
              <?php
                if($work_from) echo '<option value='.$work_from.'>'.$work_from.'</option>'; else echo '<option>started working</option>';
                ?>
                <?php
                	for($year = 1900; $year <= date(Y); $year++) {
                		?>
                <option value="<?php echo $year; ?>"> <?php echo $year ?>
                </option>
                <?php
                	}
                ?>
                <option value="not sure">Not sure</option>
            </select>
          </div>
          <div class="col-sm-6">
            <label for="workto">Work to</label>
            <select name="workto" class="input-c wr_to" id="workfrom">
              <?php
                if($work_to) echo '<option>'.$work_to.'</option>'; else echo '<option>stopped working</option>';
                ?>
                <?php
                	for($year = 1900; $year <= date(Y); $year++) {
                		?>
                <option value="<?php echo $year; ?>"> <?php echo $year ?>
                </option>
                <?php
                	}
                ?>
                <option>Till Date</option>
            </select>
          </div>
          <div class="col-sm-12">
            <label for="workingas">Work as</label>
            <input type="text" name="Workas" id="workingas" value="<?php echo $work_as; ?>" placeholder="Working as" class="input-c wr_as">
          </div>
          <!-- Education space -->
          <h3>Education</h3>
          <div class="col-sm-12">
            <label for="schoolat">School at</label>
            <input type="text" name="schoolat" id="schoolat" value="<?php echo $school; ?>" placeholder="School at" class="input-c sch_at">
          </div>
          <div class="col-sm-6">
            <label for="schoolfrom">Started school</label>
            <select name="schoolfrom" class="input-c sch_frm" id="schoolfrom">
              <?php
                if($school_from) echo '<option value='.$school_from.'>'.$school_from.'</option>'; else echo '<option>started schooling</option>';
                ?>
                <?php
                  for($year = 1900; $year <= date(Y); $year++) {
                    ?>
                <option value="<?php echo $year; ?>"> <?php echo $year ?>
                </option>
                <?php
                  }
                ?>
                <option value="not sure">Not sure</option>
            </select>
          </div>
          <div class="col-sm-6">
            <label for="schoolto">Ended school</label>
            <select name="schoolto" class="input-c sch_to" id="schoolto">
              <?php
                if($school_to) echo '<option>'.$school_to.'</option>'; else echo '<option>finshed school</option>';
                ?>
                <?php
                  for($year = 1900; $year <= date(Y); $year++) {
                    ?>
                <option value="<?php echo $year; ?>"> <?php echo $year ?>
                </option>
                <?php
                  }
                ?>
                <option>Till Date</option>
            </select>
          </div>
        </span>
        <div class="col-sm-9 text-center">
          <input type="submit" name="save" value="Save Changes" class="btn-cont sub">
          <input type="button" value="Cancel" class="btn-cont can">
        </div>
      </form>

      <!-- Contact Right Pane -->
      <form action="#ajaxified" method="post" target="_self" class="right_ph_pane w3-container contact-switch">
        <span class="col-sm-12">
          <h3>Contact</h3>
        </span>
        <span class="col-sm-12">
          <div class="col-sm-12">
            <label for="liveat">House Address</label>
            <input type="text" name="address" id="liveat" value="<?php echo $address; ?>" placeholder="Lives at" class="input-c hm_address">
          </div>
          <div class="col-sm-12">
            <label for="facebook">Facebook Url</label>
            <input type="text" name="facebook_url" id="facebook" value="<?php echo $facebook_url; ?>" placeholder="Facebook" class="input-c fb_url">
          </div>
          <div class="col-sm-12">
            <label for="instagram_url">Instagram</label>
            <input type="text" name="instagram_url" id="instagram_url" value="<?php echo $instagram_url; ?>" placeholder="Instagram" class="input-c instagram_url">
          </div>
          <div class="col-sm-12">
            <label for="twitter_handle">Twitter Handle</label>
            <input type="text" name="twitter_url" id="twitter_handle" value="<?php echo $twitter_url; ?>" placeholder="twitter Handle" class="input-c twitter_url">
          </div>
        </span>
        <div class="col-sm-9 text-center">
          <input type="submit" name="save" value="Save Changes" class="btn-cont sub">
          <input type="button" value="Cancel" class="btn-cont can">
        </div>
      </form>

      <!-- Photo Manager Right Pane -->
      <span class="right_ph_pane w3-container photo-switch">
        <span class="col-sm-12">
          <h3>Photo Manager</h3>
        </span>
        <div class="img_mng">

        </div>
        <?php
          //Select All Photo from regular post
          $photo_grab = sprintf("SELECT * FROM post_img WHERE user_id = %d",
          $user_id);
          $result = mysqli_query($conn, $photo_grab);
          while ($photo = mysqli_fetch_array($result)){
            echo '<img class="img_mng" src="' . get_web_path($photo['image_id']) . '">';
          }
          //create two page on for reduplicating any selected photo for dp
          //second for deleting a selected photo with a post
        ?>
        <div class="col-sm-9 text-center">
          <input type="submit" name="save" value="Save Changes" class="btn-cont sub">
          <input type="button" value="Cancel" class="btn-cont can">
        </div>
      </span>

      <!-- Relationship Right Pane -->
      <form action="#ajaxified" method="post" target="_self" class="right_ph_pane w3-container relationship-switch">
        <span class="col-sm-12">
          <h3>Relationship</h3>
        </span>
        <div class="col-sm-6">
          <label for="currently">I am</label>
          <select name="currently_status" class="input-c relationship" id="currently">
            <option>
              <?php if ($relationship !== null): ?>
                <?php echo $relationship; ?>
              <?php else: ?>
                None
              <?php endif; ?>
            </option>
            <option>Single</option>
            <option>Dating</option>
            <option>Engage</option>
            <option>Flirting</option>
            <option>Married</option>
            <option>Divorced</option>
            <option>Not saying</option>
          </select>
        </div>
        <div class="col-sm-6">
          <label for="currently">Looking for</label>
          <select name="lookingfor_status" class="input-c looking" id="currently">
            <option>
              <?php if ($looking !== null): ?>
                <?php echo $looking; ?>
              <?php else: ?>
                None
              <?php endif; ?>
            </option>
            <option>Frienship</option>
            <option>Bestie</option>
            <option>Date</option>
            <option>Flirt</option>
            <option>Mate</option>
            <option>Not saying</option>
          </select>
        </div>
        <?php
          //Select All Followers and people you're following
          //show all
          //make any either father, mother, sister, brother, relative, niece, nephew, cousin, aunt, uncle, grand daddy, grand mum, and friends.
          //note: by default all should be seen as friends
          //second for deleting a selected photo with a post
        ?>
        <div class="col-sm-9 text-center">
          <input type="submit" name="save" value="Save Changes" class="btn-cont sub">
          <input type="button" value="Cancel" class="btn-cont can">
        </div>
      </form>

      <!-- About Me Right Pane -->
      <form action="#ajaxified" method="post" target="_self" class="right_ph_pane w3-container about-switch">
        <span class="col-sm-12">
          <h3>About Me</h3>
        </span>
        <div class="col-sm-12">
          <label for="website">Website (optional)</label>
          <input type="text" name="website" id="website" value="<?php echo $website; ?>" placeholder="Website" class="input-c url">
        </div>
        <div class="col-sm-12">
          <label for="about">About me</label>
          <input type="text" name="aboutself" id="about" value="<?php echo $about; ?>" placeholder="About you" class="input-c self_bio">
        </div>

        <div class="col-sm-9 text-center">
          <input type="submit" name="save" value="Save Changes" class="btn-cont sub">
          <input type="button" value="Cancel" class="btn-cont can">
        </div>
      </form>
    </section>
    <!-- Edit Personals -->
