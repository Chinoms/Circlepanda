<!-- Creat Modal Start -->
    <span class="tint-bottomlayer"></span>
    <span class="tint-toplayer">
    <form action="<?php echo $data['url'] ?>" class="ui form" method="post" target="_self" enctype="multipart/form-data">
      <section class="first-create-wrap">
        <div class="w3-container">
          <h3>Create a <?php echo $data['name'] ?></h3>
          <input type="text" name="<?php echo $name['c_name'] ?>" placeholder="<?php echo $data['name'] ?> Name" class="input-c">

          <div class="field">
            <select class="ui search dropdown" name="<?php echo $name['c_view'] ?>">
              <optgroup>
                <option value="Public"><?php echo $data['name'] ?> Visibility</option>
                <option value="Public">Public</option>
                <option value="Private">Private</option>
              </optgroup>
            </select>
          </div>

          <textarea type="text" name="<?php echo $name['c_about'] ?>" onkeyup="countChar(this)" maxlength="500" placeholder="About <?php echo $data['name'] ?>" class="input-t"></textarea>
          <div class="w3-container">
            <span class="text-counter">500</span>
          </div>
            <input type="button" name="name" value="Next" class="btn-cont next-btn">
            <input type="button" name="name" value="Cancel" class="btn-cont cncl cancel-btn">
        </div>
      </section>

      <section class="last-create-wrap">
        <div class="c-cover-photo">
          <img src="" alt="Kindly Choose Cover Display" id="output" class="c-cover-photo">
          <label class="myLabel choose-cover">
            <input type="file" class="hide" name="<?php echo $name['c_cover'] ?>" accept="image/*" onchange="loadFile(event)" required/>
            <span><i class="fa fa-camera"></i></span>
          </label>
        </div>

        <div class="w3-container">
          <label for="channel_type"><h3><?php echo $data['name'] ?> type</h3></label>
          <select class="slect-type" name="<?php echo $name['c_type'] ?>">
            <optgroup>
              <option><?php echo $data['type_tag'] ?></option>
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

          <h3><?php echo $data['name']; ?> Color</h3>
          <div class="w3-col s12">
            <span class="collorballs" style="background-color: Grey" title="Grey"></span>
            <span class="collorballs" style="background-color: Indigo" title="Indigo"></span>
            <span class="collorballs" style="background-color: Orange" title="Orange"></span>
            <span class="collorballs" style="background-color: Teal" title="Teal"></span>
            <span class="collorballs" style="background-color: Mediumaquamarine" title="Mediumaquamarine"></span>
            <span class="collorballs" style="background-color: Purple" title="Purple"></span>
            <span class="collorballs" style="background-color: CornflowerBlue" title="CornflowerBlue"></span>
            <span class="collorballs" style="background-color: IndianRed" title="IndianRed"></span>
            <span class="collorballs" style="background-color: PaleVioletred" title="PaleVioletred"></span>
            <span class="collorballs" style="background-color: Lightskyblue" title="Lightskyblue"></span>
            <span class="collorballs" style="background-color: Crimson" title="Crimson"></span>
            <span class="collorballs" style="background-color: Orchid" title="Orchid"></span>
            <span class="collorballs" style="background-color: Cyan" title="Cyan"></span>
            <span class="collorballs" style="background-color: Seagreen" title="Seagreen"></span>
            <span class="collorballs" style="background-color: DeepPink" title="DeepPink"></span>
            <span class="collorballs" style="background-color: LightSeaGreen" title="LightSeaGreen"></span>
            <span class="collorballs" style="background-color: Tomato" title="Tomato"></span>
            <span class="collorballs" style="background-color: HotPink" title="HotPink"></span>
          </div>
        </div>
        <input type="hidden" name="<?php echo $name['c_color'] ?>" class="color-channel">
        <div class="w3-container">
          <input type="submit" name="send" value="Create" class="btn-cont next-btn sub">
          <input type="button" name="name" value="Back" class="btn-cont cancel-btn bck">
        </div>
      </section>
    </form>
      <!-- Creat Modal End -->
    </span>
