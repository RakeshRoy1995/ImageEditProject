<?php

// phpinfo();

include('db.php');
include('header.php');
include('imgUpload.php');
?>
<style type="text/css">
  .right {
  transform: rotateY(180deg);
}

.flip_left {
  transform: rotateY(0deg);
}

.IMG_FILTER_GRAYSCALE{
  filter: grayscale(100%);
}

.IMG_FILTER_SEPIA{ 
  filter: sepia(100%);
}

.IMG_FILTER_INVERT{
 filter: invert(1);
}

.IMG_FILTER_WARM{
  filter: sepia(50%) contrast(150%) saturate(200%) brightness(100%) hue-rotate(-15deg);
}

.cool{

}

.Dramatic{

}

</style>
<body>
    <div id="wrapper">
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="jumbotron jumbotron-fluid">
    			  <div class="container">
    			  	<div class="alert alert-primary" role="alert">
    				 <h5>Picture lists </h5> 

             <div class="imageLists">

              <div class="row" style="overflow: auto; height: 214px;">
                  <?php
                   $query="select * from image_datas ";
                   $result=mysqli_query($con,$query);
                   if (mysqli_num_rows($result) > 0) 
                     { 
                      while($rows=mysqli_fetch_array($result))
                        { ?>
                          <div class="col-md-2" style="margin-bottom: 7px;">
                             <img src="<?= !empty($rows['new_image']) ? $rows['new_image'] : $rows['image']; ?>" height="100px" width="100%" onclick="selectPicture( '<?= !empty($rows['new_image']) ? $rows['new_width'] : $rows['image_width']; ?>' , '<?= !empty($rows['new_image']) ? $rows['new_height'] : $rows['image_height']; ?>' , '<?= !empty($rows['new_image']) ? $rows['new_image'] : $rows['image']; ?>' , '<?= $rows['image']; ?>' , '<?= $rows['id']; ?>' )" > <br>
                          </div>
                  <?php } } ?>
              </div>
             </div>

             <form action = "" method = "POST" enctype = "multipart/form-data">
               Image : <input type = "file" name = "image" accept=".png, .jpg, .jpeg" required="" />
               <input type = "submit" value="Upload Image" />
               
            </form>
            <br>

            <div id="button_operation" style="display: none;">
              <button onclick="button_show('crop')" >Crop</button>
              <button onclick="button_show('Filter')" >Filter</button>
              <button onclick="button_show('Adjust')" >Adjust</button>
            </div>

             <div id="imageFuctionality">

              <div id="cropShow" style="display: none;">
                <div class="row" >
                 <div class="col-md-2"> <input type="number" id="sourceX" class="form-control" onchange ="Fuctionality()" > </div>
                 <div class="col-md-2"> <input type="number" id="sourceY" class="form-control" onchange ="Fuctionality()" >  </div>
                 <div class="col-md-2"> <input type="number" id="sourceWidth" class="form-control" onchange ="Fuctionality()" >  </div>
                 <div class="col-md-2"> <input type="number" id="sourceHeight" class="form-control" onchange ="Fuctionality()" >  </div>

                 <br>

                 <button type="button" onclick="flip('rotateY(180deg)')" class="btn" style="margin: 2px;" > Flip Right </button> 
                 <button type="button" onclick="flip('rotateY(0deg)')" class="btn"  style="margin: 2px;" > Flip Left </button> 
                 <button type="button" onclick="flip('rotateX(180deg)')" class="btn"  style="margin: 2px;"> Flip Bottom </button> 
                 <button type="button" onclick="flip('rotateX(0deg)')" class="btn"  style="margin: 2px;" > Flip Top </button> 

                 <br>

                 <button type="button" onclick="flip('rotate(30deg)')" class="btn"  style="margin: 2px;"> Rotate 30 </button> 
                 <button type="button" onclick="flip('rotate(60deg)')" class="btn"   style="margin: 2px;"> Rotate 60 </button> 
                 <button type="button" onclick="flip('rotate(90deg)')" class="btn" style="margin: 2px;" > Rotate 90 </button> 
                 <button type="button" onclick="flip('rotate(180deg)')" class="btn"  style="margin: 2px;" > Rotate 180 </button> 

                 <br>

                 <button type="button" onclick="ratio_button(16 , 9)" class="btn" style="margin: 2px;" > Ratio 16:9 </button> 
                 <button type="button" onclick="ratio_button(10 , 7)" class="btn" style="margin: 2px;"  > Ratio 10 : 7 </button> 
                 <button type="button" onclick="ratio_button(7 , 5)" class="btn" style="margin: 2px;" > Ratio 7:5 </button> 
                 <button type="button" onclick="ratio_button(4 , 3)" class="btn"  style="margin: 2px;" > Ratio 4:3 </button> 
                 <button type="button" onclick="ratio_button(5 , 3)" class="btn" style="margin: 2px;" > Ratio 5:3 </button> 
                 <button type="button" onclick="ratio_button(3 , 2)" class="btn" style="margin: 2px;"  > Ratio 3:2 </button> 

                 <button type="button" onclick="getOrginal()" class="btn" > Orginal Pic</button>

               </div>
              </div>

              <div id="filteredShow" style="display: none;">
                Grayscale : <img src="" style="filter: grayscale(100%);" onclick="imageFiltered('IMG_FILTER_GRAYSCALE')" id="garyscal" height="150px" width="150px">
                Sepia : <img src="" style="filter: sepia(100%);" onclick="imageFiltered('IMG_FILTER_SEPIA')" id="sepia" height="150px" width="150px"> 
                Invert : <img src="" style="filter: invert(100%);" onclick="imageFiltered('IMG_FILTER_INVERT')" id="invert" height="150px" width="150px"> 
                <!-- Warm :<img src="" style="filter: sepia(50%) contrast(150%) saturate(200%) brightness(100%) hue-rotate(-15deg);" onclick="imageFiltered('IMG_FILTER_WARM')" id="warm" height="150px" width="150px">
                Cool : <img src="" style="filter: grayscale(100%);" id="cool" height="150px" width="150px">
                Dramatic : <img src="" style="filter: grayscale(100%);" id="Dramatic" height="150px" width="150px"> -->
              </div>

              <div id="AdjustShow" style="display: none;">
                <div class="row" >

                  <input type="number" min="-100" max="100" name="brightness" onchange="FuctionalityAdjust(this)" id="brightness" >
                 <br>

                 <button type="button" onclick="getOrginal()" class="btn" > Orginal Pic</button>

               </div>
              </div>


             </div>

    				</div>

            Filtered image: <br>
            <canvas id="myCanvas" width="0" height="0"></canvas> 

            <div id="flipShow">
              
            </div>
            
            <span>Selected Image </span> <br>
            <div id="image_show"> </div>

            <span>Orginal uploaded Image </span> <br>
            <div id="image_showOrginal"> </div>

            <form action = "" method = "POST" enctype = "multipart/form-data">
              <input type="hidden" name="img_id" id="img_id">
               <input type="hidden" name="selectedImage" id="selectedImage">
               <input type="hidden" name="selectedImage_x" id="selectedImage_x">
               <input type="hidden" name="selectedImage_y" id="selectedImage_y">
               <input type="hidden" name="selectedImage_width" id="selectedImage_width">
               <input type="hidden" name="selectedImage_height" id="selectedImage_height">
               <input type="hidden" name="selectedImage_rotate" id="selectedImage_rotate">
               <input type="hidden" name="selectedImage_filter" id="selectedImage_filter">

               <input type="number" min="-100" max="100" name="selectedImage_brightness" id="selectedImage_brightness" placeholder="Brightness">
               
               <input type = "submit" value="Update Filtered Picture" />

               <?php if (isset($errors)): ?>
                   <span style="color: blueviolet;" >  <?= $errors; ?>  </span>
               <?php endif ?>
            </form>

			  </div>

          
   
    </div>
<?php
include('footer.php');
?>
