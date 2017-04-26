<?php include'header.php';?>
<div class="">
      <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
        
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-1"></div>
              <h2><a href="#">Stanford University</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> Stanford, CA</p>
              <p>One of the Greatest University in the world.</p>
              <cite>$ 50,424</cite>
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-2"></div>
              <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
              <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>
              <cite>$ 20,000,000</cite>
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-3"></div>
              <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
              <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>
              <cite>$ 20,000,000</cite>
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-4"></div>
              <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
              <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>
              <cite>$ 20,000,000</cite>
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-5"></div>
              <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
              <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>
              <cite>$ 20,000,000</cite>
              </blockquote>
            </div>
          </div>
        </div><!-- /sl-slider -->



        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>

<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
    <h3>Search for Universiti</h3>
    <div class="searchbar">
    <form action='buysalerent.php' method='POST' enctype='multipart/form-data' >
      <div class="row">
        <div class="col-lg-6 col-sm-12">
          <div class="row">
            
            <div class="col-lg-3 col-sm-4 ">
              <select class="form-control" name="tuition">
              	<option selected value="0">--tuition--</option>
                <option value="1">below $15,000</option>
                <option value="2">$15,001-$20,000</option>
                <option value="3">$20,001-$30,000</option>
                <option value="4">$30,001-$40,000</option>
                <option value="5">above $40,000</option>
              </select>
            </div>

            <div class="col-lg-3 col-sm-4">
              <select class="form-control" name="rank">
                <option selected value="0">--rank--</option>
                <option value="1">top 10</option>
                <option value="2">11-30</option>
                <option value="3">31-50</option>
                <option value="4">51-70</option>
                <option value="5">71-100</option>
              </select>
            </div>

            <div class="col-lg-3 col-sm-4">
              <select class="form-control" name="region">
                <option selected value="0">--region--</option>
                <option value="1">WEST</option>
                <option value="2">MIDWEST</option>
                <option value="3">SOUTH</option>
                <option value="4">NORTHEAST</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
              <button type="submit" class="btn btn-success">Find Now</button>
            </div>
          </div>
        </div>
        </div>
      </form>
    </div>

  </div>
</div>
</body>
</html>