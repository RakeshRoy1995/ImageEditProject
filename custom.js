var imagesData;
var w_;
var h_;
var orginal_image_;
var clickedFuctionality = false;
var clickedFlip = false;
function selectPicture(w , h , data , orginal_image , img_id) {
	orginal_image_ =orginal_image;
	w_ = w;
	h_ = h;
	document.getElementById('img_id').value= img_id;
  document.getElementById('sourceX').value= 0;
  document.getElementById('sourceY').value= 0;
  document.getElementById('sourceWidth').value= w;
  document.getElementById('sourceHeight').value= h;


  document.getElementById('selectedImage_x').value= 0;
  document.getElementById('selectedImage_y').value= 0;
  document.getElementById('selectedImage_width').value= w;
  document.getElementById('selectedImage_height').value= h;
  document.getElementById('selectedImage').value= data;

  
  document.getElementById("imageFuctionality").style.display = "block";
  document.getElementById("button_operation").style.display = "block";
  document.getElementById("image_show").innerHTML =  
            "<img src = "+data+" height="+h+" width="+w+" />";
  imagesData = data;
}

function ratio_button(w , h) {
     result_w = Math.round( (w / (w+h)) * w_ ) ;
     result_h = Math.round( (h / (w+h) ) * h_) ;

     document.getElementById('selectedImage_width').value= result_w;
     document.getElementById('selectedImage_height').value= result_h;
     document.getElementById('sourceWidth').value= result_w;
     document.getElementById('sourceHeight').value= result_h;
     document.getElementById('myCanvas').width= result_w;
     document.getElementById('myCanvas').height= result_h;

      var sourceX_      = document.getElementById("sourceX").value;
      var sourceY_      = document.getElementById("sourceY").value;
      var sourceWidth_  = document.getElementById("sourceWidth").value;
      var sourceHeight_ = document.getElementById("sourceHeight").value;

      document.getElementById('selectedImage_x').value= sourceX_;
      document.getElementById('selectedImage_y').value= sourceY_;
      document.getElementById('selectedImage_width').value= sourceWidth_;
      document.getElementById('selectedImage_height').value= sourceHeight_;
      document.getElementById('selectedImage').value= imagesData;

      var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');
      var imageObj = new Image();

      imageObj.onload = function() {
        // draw cropped image
        var sourceX = document.getElementById("sourceX").value;
        var sourceY = document.getElementById("sourceY").value;
        var sourceWidth = document.getElementById("sourceWidth").value;
        var sourceHeight = document.getElementById("sourceHeight").value;
        var destWidth = sourceWidth;
        var destHeight = sourceHeight;
        var destX = canvas.width / 2 - destWidth / 2;
        var destY = canvas.height / 2 - destHeight / 2;

        context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
      };
      imageObj.src = imagesData;


  }

function getOrginal() {
  document.getElementById("image_showOrginal").innerHTML =  
            "<img src = "+orginal_image_+" />";
}

function flip(argument) {

  clickedFlip = true;
  if (clickedFuctionality == false) {
    document.getElementById("flipShow").innerHTML =  
            "<img id='flipImage' src = "+imagesData+" height="+h_+" width="+w_+"  />";
    document.getElementById("flipImage").style.transform = argument;        
  }

  document.getElementById('selectedImage_rotate').value = argument;   
  document.getElementById("myCanvas").style.transform = argument;

}

  var sourceX_     
  var sourceY_     
  var sourceWidth_ 
  var sourceHeight_

  function Fuctionality() {
    clickedFuctionality = true;

    if (clickedFlip) {
      document.getElementById("flipImage").style.display = "none";
    }

      document.getElementById('myCanvas').width= w_;
      document.getElementById('myCanvas').height= h_;

      var sourceX_      = document.getElementById("sourceX").value;
      var sourceY_      = document.getElementById("sourceY").value;
      var sourceWidth_  = document.getElementById("sourceWidth").value;
      var sourceHeight_ = document.getElementById("sourceHeight").value;

      document.getElementById('selectedImage_x').value= sourceX_;
      document.getElementById('selectedImage_y').value= sourceY_;
      document.getElementById('selectedImage_width').value= sourceWidth_;
      document.getElementById('selectedImage_height').value= sourceHeight_;
      document.getElementById('selectedImage').value= imagesData;

      var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');
      var imageObj = new Image();

      imageObj.onload = function() {
        // draw cropped image
        var sourceX = document.getElementById("sourceX").value;
        var sourceY = document.getElementById("sourceY").value;
        var sourceWidth = document.getElementById("sourceWidth").value;
        var sourceHeight = document.getElementById("sourceHeight").value;
        var destWidth = sourceWidth;
        var destHeight = sourceHeight;
        var destX = canvas.width / 2 - destWidth / 2;
        var destY = canvas.height / 2 - destHeight / 2;

        context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
      };
      imageObj.src = imagesData;

  }

  

  function button_show(argument) {
    if (argument == "crop") {
      document.getElementById("filteredShow").style.display = "none";
      document.getElementById("cropShow").style.display = "block";
      document.getElementById("AdjustShow").style.display = "none";
    }
    if (argument == "Adjust") {
      document.getElementById("filteredShow").style.display = "none";
      document.getElementById("cropShow").style.display = "none";
      document.getElementById("AdjustShow").style.display = "block";
    }

    if (argument == "Filter") {
      document.getElementById("filteredShow").style.display = "block";
      document.getElementById("cropShow").style.display = "none";
      document.getElementById("AdjustShow").style.display = "none";

      document.getElementById("garyscal").src = imagesData;
      document.getElementById("sepia").src = imagesData;
      document.getElementById("invert").src = imagesData;
    }
  }

  function imageFiltered(argument) {

    document.getElementById("flipShow").innerHTML =  
            "<img id='flipImage' src = "+imagesData+" height="+h_+" width="+w_+"  />";

     document.getElementById('myCanvas').width= w_;
      document.getElementById('myCanvas').height= h_;

      var sourceX_      = document.getElementById("sourceX").value;
      var sourceY_      = document.getElementById("sourceY").value;
      var sourceWidth_  = document.getElementById("sourceWidth").value;
      var sourceHeight_ = document.getElementById("sourceHeight").value;

      document.getElementById('selectedImage_x').value= sourceX_;
      document.getElementById('selectedImage_y').value= sourceY_;
      document.getElementById('selectedImage_width').value= sourceWidth_;
      document.getElementById('selectedImage_height').value= sourceHeight_;
      document.getElementById('selectedImage').value= imagesData;

      var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');
      var imageObj = new Image();

      imageObj.onload = function() {
        // draw cropped image
        var sourceX = document.getElementById("sourceX").value;
        var sourceY = document.getElementById("sourceY").value;
        var sourceWidth = document.getElementById("sourceWidth").value;
        var sourceHeight = document.getElementById("sourceHeight").value;
        var destWidth = sourceWidth;
        var destHeight = sourceHeight;
        var destX = canvas.width / 2 - destWidth / 2;
        var destY = canvas.height / 2 - destHeight / 2;

        context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
      };
      imageObj.src = imagesData;

      var element = document.getElementById("myCanvas");

      if (argument == "IMG_FILTER_INVERT") {
        element.classList.remove("IMG_FILTER_GRAYSCALE");
        element.classList.remove("IMG_FILTER_SEPIA");
      }

      if (argument == "IMG_FILTER_GRAYSCALE") {
        element.classList.remove("IMG_FILTER_INVERT");
        element.classList.remove("IMG_FILTER_SEPIA");
      }

      if (argument == "IMG_FILTER_SEPIA") {
        element.classList.remove("IMG_FILTER_GRAYSCALE");
        element.classList.remove("IMG_FILTER_INVERT");
      }

      element.classList.add(argument);

      document.getElementById('selectedImage_filter').value= argument;
  }

  function FuctionalityAdjust(argument) {

    document.getElementById("flipShow").innerHTML =  
            "<img id='flipImage' src = "+imagesData+" height="+h_+" width="+w_+"  />";

    if (argument.id == "brightness") {
      brightnessLevel = argument.value

      document.getElementById("flipImage").style.filter = 'brightness('+brightnessLevel+')';
      document.getElementById("selectedImage_brightness").value = brightnessLevel;

    }

     document.getElementById('myCanvas').width= w_;
      document.getElementById('myCanvas').height= h_;

      var sourceX_      = document.getElementById("sourceX").value;
      var sourceY_      = document.getElementById("sourceY").value;
      var sourceWidth_  = document.getElementById("sourceWidth").value;
      var sourceHeight_ = document.getElementById("sourceHeight").value;

      document.getElementById('selectedImage_x').value= sourceX_;
      document.getElementById('selectedImage_y').value= sourceY_;
      document.getElementById('selectedImage_width').value= sourceWidth_;
      document.getElementById('selectedImage_height').value= sourceHeight_;
      document.getElementById('selectedImage').value= imagesData;

      var canvas = document.getElementById('myCanvas');
      var context = canvas.getContext('2d');
      var imageObj = new Image();

      imageObj.onload = function() {
        // draw cropped image
        var sourceX = document.getElementById("sourceX").value;
        var sourceY = document.getElementById("sourceY").value;
        var sourceWidth = document.getElementById("sourceWidth").value;
        var sourceHeight = document.getElementById("sourceHeight").value;
        var destWidth = sourceWidth;
        var destHeight = sourceHeight;
        var destX = canvas.width / 2 - destWidth / 2;
        var destY = canvas.height / 2 - destHeight / 2;

        context.drawImage(imageObj, sourceX, sourceY, sourceWidth, sourceHeight, destX, destY, destWidth, destHeight);
      };
      imageObj.src = imagesData;
    
  }
