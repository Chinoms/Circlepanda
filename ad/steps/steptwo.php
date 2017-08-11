<form class="step-two steps" action="<?php echo BASE_URL . "module/ad/info" ?>" enctype="multipart/form-data" method="post" accept-charset="UTF-8">
  <div class="ui form">
    <div class="field">
      <label>Ad Url</label>
      <div class="field">
        <div class="field">
          <input type="text" name="url" placeholder="Link path">
        </div>
      </div>

      <div class="two fields">
        <div class="field">
          <select class="ui search dropdown" name="min_age" required="required">
            <optgroup>
              <option value="Null">Min Age</option>
              <?php
      				    for($year = 0; $year <= 100; $year++) {
      				?>
      				<option value="<?php echo $year; ?>"> <?php echo $year ?></option>
      				<?php
      					}
      				?>
            </optgroup>
          </select>
        </div>

        <div class="field">
          <select class="ui search dropdown" name="max_age" required="required">
            <optgroup>
              <option value="Null">Max Age</option>
              <?php
      				    for($year = 0; $year <= 100; $year++) {
      				?>
      				<option value="<?php echo $year; ?>"> <?php echo $year ?></option>
      				<?php
      					}
      				?>
            </optgroup>
          </select>
        </div>
      </div>

      <div class="field">
        <label>Ad Date</label>
        <div class="two fields">
          <div class="field">
            <input type="text" id="datepicker1" name="start_date" placeholder="Ad Start date">
          </div>
          <div class="field">
            <input type="text" id="datepicker2" name="end_date" placeholder="Ad End date">
          </div>
        </div>
      </div>

      <div class="field w3-padding-8">
        <label class="myLabel btn-selector">
          <div typ="file" class="ui blue button" data-tooltip="Image Size (216 x 120)px" data-position="right center">
            <input type="file" name="adphoto" class="hide" accept="image/*" onchange="loadFile(event)">
              <i class="fa fa-camera"></i> &nbsp; Add Ad Image
          </div>
        </label>
      </div>

      <div class="field w3-center w3-padding-8 continue" datastep="2">
        <button class="ui animated button" tabindex="0">
          <div class="visible content">Continue</div>
          <div class="hidden content">
            <i class="right arrow icon"></i>
          </div>
        </button>
      </div>
    </div>
  </div>
</form>
