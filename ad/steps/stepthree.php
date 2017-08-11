<form class="step-three steps" action="<?php echo BASE_URL . "module/ad/target" ?>" method="post" accept-charset="UTF-8">
  <div class="ui form">
    <div class="field">
      <label>Ad</label>
      <div class="two fields">
        <div class="field">
          <input type="text" name="ad_name" placeholder="Ad Name">
        </div>
        <div class="field">
          <select class="ui search multiple dropdown" name="ad_tag" required="required">
            <optgroup>
              <option value="Null">Ad Tag</option>
              <option>Actor</option>
              <option>Album</option>
              <option>App</option>
              <option>Appliance</option>
              <option>Art</option>
              <option>Artist/ Director</option>
              <option>Athlete</option>
              <option>Attractions/ Things To Do</option>
              <option>Author</option>
              <option>Automobiles and Parts</option>
              <option>Baby Goods/ Kids Goods</option>
              <option>Bank</option>
              <option>Bar</option>
              <option>Book</option>
              <option>Book Store</option>
              <option>Business Person</option>
              <option>Car</option>
              <option>Cartoon</option>
              <option>Chef</option>
              <option>Church</option>
              <option>Clothing</option>
              <option>Club</option>
              <option>Coach</option>
              <option>Comedian</option>
              <option>Comedy</option>
              <option>Company</option>
              <option>Computers/ Technology</option>
              <option>Concert Tour</option>
              <option>Concert Venue</option>
              <option>Cause</option>
              <option>Consulting/ Business Services</option>
              <option>Doctor</option>
              <option>Education</option>
              <option>Electronics</option>
              <option>Entertainer</option>
              <option>Fashion</option>
              <option>Food</option>
              <option>Food/ Breverages</option>
              <option>Football</option>
              <option>Furnitures</option>
              <option>Games</option>
              <option>Games/ Toys</option>
              <option>Grocery</option>
              <option>Health/ Beauty</option>
              <option>Health/ Medical/ Pharmacy</option>
              <option>Health/ Medical/ Pharmaceuticals</option>
              <option>Hospital</option>
              <option>Hospital/ Clinic</option>
              <option>Hotel</option>
              <option>Insurance Company</option>
              <option>Internet/ Software</option>
              <option>Jewelry/ Watches</option>
              <option>Journalist</option>
              <option>Kitchen/ Cooking</option>
              <option>Lawyer</option>
              <option>Legal Law</option>
              <option>Library</option>
              <option>Local Business</option>
              <option>Magazine</option>
              <option>Media/ News/ Publishing</option>
              <option>Movie</option>
              <option>Movie Theatre</option>
              <option>Music</option>
              <option>Musician/ Band</option>
              <option>Musuem/ Art Gallery</option>
              <option>Nature</option>
              <option>Non-Profit Organization</option>
              <option>Outdoor Gear/ Sporting Goods</option>
              <option>Pet Supplies</option>
              <option>Politician</option>
              <option>Programming</option>
              <option>Radio Station</option>
              <option>Real Estate</option>
              <option>Record Label</option>
              <option>Religion</option>
              <option>Resturant/ Cafe</option>
              <option>Retail and Consumer Mechandise</option>
              <option>Science</option>
              <option>School</option>
              <option>Shopping/  Retail</option>
              <option>Social Network</option>
              <option>Spas/ Beauty/ Personal Care and </option>
              <option>Sport</option>
              <option>Sport Venue</option>
              <option>Teacher</option>
              <option>Travel/ Leisure</option>
              <option>TV Channel</option>
              <option>TV Show</option>
              <option>Video Games</option>
              <option>Vitamins/ Minerals</option>
              <option>Web Design</option>
              <option>Web Developer</option>
              <option>Web Site</option>
              <option>Writer</option>
            </optgroup>
          </select>
        </div>
      </div>
    </div>

    <div class="field">
    <label>Ad Advance Info</label>
      <div class="two fields">
        <div class="field">
          <select class="ui search dropdown" name="ad_country" id="country" required="required">
            <optgroup>
              <option value="All">Select Country</option>
             </optgroup>
          </select>
        </div>
        <div class="field">
          <select class="ui search dropdown" name="ad_state" id="state" required="required">
            <optgroup>
              <option value="All">Select State</option>
            </optgroup>
          </select>
        </div>
      </div>
    </div>

    <div class="field">
      <div class="two fields">
        <div class="field">
          <select class="ui search dropdown" name="ad_gender" required="required">
            <optgroup>
              <option value="Null">Choose Gender</option>
              <option value="All">All</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Others">Others+</option>
            </optgroup>
          </select>
        </div>
        <div class="field">
          <select class="ui search dropdown" name="ad_language" required="required">
            <optgroup>
              <option value="Null">Language</option>
              <option value="English">English</option>
              <option value="Spanish">Spanish</option>
              <option value="Chineese">Chineese</option>
              <option value="Russian">Russian</option>
              <option value="Portuguese">Portuguese</option>
              <option value="German">German</option>
              <option value="None Prefered">None Prefered</option>
            </optgroup>
          </select>
        </div>
      </div>
    </div>

    <div class="field w3-center w3-padding-8">
      <button class="ui animated button continue" tabindex="0">
        <div class="visible content">Continue</div>
        <div class="hidden content">
          <i class="right arrow icon"></i>
        </div>
      </button>
    </div>

  </div>
</form>
