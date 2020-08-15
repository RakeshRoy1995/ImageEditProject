<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = str_replace(" ","",$_FILES['image']['name']);
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];

      $image_info = getimagesize($_FILES["image"]["tmp_name"]);
      
      if($file_size > 2097152) {
         $errors='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"assest/images/".time()."".$file_name);
         $imgName = "assest/images/".time()."".$file_name;
         $sql = "INSERT INTO image_datas (image , image_width , image_height) VALUES ('$imgName' , $image_info[0] , $image_info[1] )";
        if (mysqli_query($con, $sql))
            $errors = "Succesull";
        else 
            $errors = "Failed to upload";
      }
   }

   if(isset($_POST['selectedImage'])){

      $ext = (explode('.', addslashes($_POST['selectedImage'])  ));

      if ($ext[1] =="png" || $ext[1] =="PNG" ) {
        //customize only for the png image

        //crop image code
        $im = imagecreatefrompng($_POST['selectedImage']);
        $size = min(imagesx($im), imagesy($im));
        $width = (int)$_POST['selectedImage_width'];
        $height = (int)$_POST['selectedImage_height'];
        $x = (int)$_POST['selectedImage_x'];
        $y = (int)$_POST['selectedImage_y'];

        $im2 = imagecrop($im, ['x' => $x, 'y' => $y, 'width' => $width, 'height' => $height ]);
        $imgCpy = "assest/images/copyImg/".time()."example-cropped.png";

        if ($im2 !== FALSE) {
            imagepng($im2, $imgCpy);
            imagedestroy($im2);
        }
        imagedestroy($im);
        //code for image flip and rotate
        if (isset($_POST['selectedImage_rotate']) && !empty($_POST['selectedImage_rotate']) ) {
          if (strpos($_POST['selectedImage_rotate'], "X") || strpos($_POST['selectedImage_rotate'], "Y") ) {
            
             $img_file = $imgCpy;
             header('Content-type: image/png');
             $img = imagecreatefrompng($img_file);
             imageflip($img, IMG_FLIP_HORIZONTAL);
             imagepng($img);
             imagedestroy($img);
             print_r('Image Fliped successfully.');

          }else{

            $fileName = $imgCpy;
            $degrees = preg_replace('/\D/', '', $_POST['selectedImage_rotate']);
            $source = imagecreatefrompng($fileName);
            $rotate = imagerotate($source, $degrees, imageColorAllocateAlpha($source, 0, 0, 0, 127));
            imagepng($rotate, $imgCpy);
            print_r('Image Rotate successfully.');
          }
          
        }

        if ( isset($_POST['selectedImage_filter']) && !empty($_POST['selectedImage_filter']) ) {
           $im = imagecreatefrompng($imgCpy);

            if($im && imagefilter($im, IMG_FILTER_GRAYSCALE ))
            {
                echo 'Image converted to grayscale.';

                imagepng($im, $imgCpy);
            }

            if ($_POST['selectedImage_filter'] == "IMG_FILTER_SEPIA") {
             
                $myImage = imagecreatefrompng($imgCpy);
                imagefilter($myImage,IMG_FILTER_GRAYSCALE);
                imagefilter($myImage,IMG_FILTER_BRIGHTNESS,-30);
                imagefilter($myImage,IMG_FILTER_COLORIZE, 90, 55, 30);
                imagepng($myImage );
                imagepng($myImage,$imgCpy);
                imagedestroy( $myImage );
                echo 'Image converted to Sepia.';
            }

            if ($_POST['selectedImage_filter'] == "IMG_FILTER_INVERT") {
              if($im && imagefilter($im, IMG_FILTER_NEGATE ))
                {
                    echo 'Image converted to Invert.';

                    imagepng($im, $imgCpy);
                }
             }

        }

         if ( isset($_POST['selectedImage_brightness']) && !empty($_POST['selectedImage_brightness']) ) {

          $im = imagecreatefrompng($imgCpy);

          if($im && imagefilter($im, IMG_FILTER_BRIGHTNESS, (int)$_POST['selectedImage_brightness']  ))
          {
              echo 'Image brightness changed.';

              imagepng($im, $imgCpy);
              imagedestroy($im);
          }

        }




      }else{

        //customize only for the JPG/JPEG image

        //crop image code
        $im = imagecreatefromjpeg($_POST['selectedImage']);
        $size = min(imagesx($im), imagesy($im));
        $width = (int)$_POST['selectedImage_width'];
        $height = (int)$_POST['selectedImage_height'];
        $x = (int)$_POST['selectedImage_x'];
        $y = (int)$_POST['selectedImage_y'];

        $im2 = imagecrop($im, ['x' => $x, 'y' => $y, 'width' => $width, 'height' => $height ]);
        $imgCpy = "assest/images/copyImg/".time()."example-cropped.jpg";

        if ($im2 !== FALSE) {
            imagejpeg($im2, $imgCpy);
            imagedestroy($im2);
        }
        imagedestroy($im);

        //code for image flip and rotate

        if (isset($_POST['selectedImage_rotate']) && !empty($_POST['selectedImage_rotate']) ) {
          if (strpos($_POST['selectedImage_rotate'], "X") || strpos($_POST['selectedImage_rotate'], "Y") ) {

          }else{
            $fileName = $imgCpy;
            $degrees = preg_replace('/\D/', '', $_POST['selectedImage_rotate']); // Rotation angle
            $source = imagecreatefromjpeg($fileName);
            $rotate = imagerotate($source, $degrees, 0);
            imagejpeg($rotate, $imgCpy);
          }
          
        }

        if ( isset($_POST['selectedImage_filter']) && !empty($_POST['selectedImage_filter']) ) {
           $im = imagecreatefromjpeg($imgCpy);

           if ($_POST['selectedImage_filter'] == "IMG_FILTER_GRAYSCALE") {
             if($im && imagefilter($im, IMG_FILTER_GRAYSCALE ))
              {
                  echo 'Image converted to grayscale.';

                  imagejpeg($im, $imgCpy);
              }
           }

           if ($_POST['selectedImage_filter'] == "IMG_FILTER_SEPIA") {
             
            $myImage = imagecreatefromjpeg($imgCpy);
            imagefilter($myImage,IMG_FILTER_GRAYSCALE);
            imagefilter($myImage,IMG_FILTER_BRIGHTNESS,-30);
            imagefilter($myImage,IMG_FILTER_COLORIZE, 90, 55, 30);
            imagejpeg($myImage );
            imagejpeg($myImage,$imgCpy);
            imagedestroy( $myImage );

            echo 'Image converted to Sepia.';

           }

           if ($_POST['selectedImage_filter'] == "IMG_FILTER_INVERT") {
            if($im && imagefilter($im, IMG_FILTER_NEGATE ))
              {
                  echo 'Image converted to Invert.';

                  imagejpeg($im, $imgCpy);
              }
           }
        }

        if ( isset($_POST['selectedImage_brightness']) && !empty($_POST['selectedImage_brightness']) ) {

          $im = imagecreatefromjpeg($imgCpy);

          if($im && imagefilter($im, IMG_FILTER_BRIGHTNESS, $_POST['selectedImage_brightness']  ))
          {
              echo 'Image brightness changed.';

              imagejpeg($im, $imgCpy);
              imagedestroy($im);
          }

        }

      }

      
      $sql = "UPDATE image_datas SET new_image= '$imgCpy' , new_width= $width , new_height= $height  WHERE id = ".$_POST['img_id']. " ";
     if (mysqli_query($con, $sql))
         $errors = "Succesull";
     else 
         $errors = "Failed to upload";
   }
?>