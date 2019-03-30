<?php
include("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // REGISTER USER DETAILS
  if (isset($_POST['register'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  //$password = mysqli_real_escape_string($conn, $_POST['password']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $age = mysqli_real_escape_string($conn, $_POST['age']);
  $height = mysqli_real_escape_string($conn, $_POST['height']);
  $weight = mysqli_real_escape_string($conn, $_POST['weight']);
  $daily_activity = mysqli_real_escape_string($conn, $_POST['daily_activity']);
  $medical = mysqli_real_escape_string($conn, $_POST['medical']);
  $location = mysqli_real_escape_string($conn, $_POST['location']);

  $user_check_query = "SELECT * FROM login WHERE email='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $username) {
      echo "Username already exists";
    }
  }

  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO user (name, gender, age, height) VALUES('$username', '$password')";
    $result = mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    //header('location: index.php');
  }
  
  function GetImageExtension($imagetype)
      {
         if(empty($imagetype)) return false;
         switch($imagetype)
         {
             case 'image/bmp': return '.bmp';
             case 'image/gif': return '.gif';
             case 'image/jpeg': return '.jpg';
             case 'image/png': return '.png';
             default: return false;
         }
       }

    if (!empty($_FILES["action"]["name"])) {
      $file_name=$_FILES["action"]["name"];
      $temp_name=$_FILES["action"]["tmp_name"];
      $imgtype=$_FILES["action"]["type"];
      $ext= GetImageExtension($imgtype);
      $imagename=date("d-m-Y")."-".time().$ext;
      $target_path = "img/".$imagename;
      $time_now=mktime(date('h')+4,date('i')+30,date('s'));

      if(move_uploaded_file($temp_name, $target_path)) {
      $query_upload="INSERT into user (img_name,img_path,img_date,img_time) VALUES ('".$imagename."','".$target_path."','".date("Y-m-d")."','".date('H:i:s', $time_now)."')";
    
      
      mysqli_query($conn,$query_upload) or die("error in $query_upload == ----> ".mysql_error()); 
    }
    else
    {
      exit("Error While uploading image on the server");
    }
   }
  }
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>FoodPal</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'>
  <link rel='stylesheet' href='https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'>
  <link rel='stylesheet' href='https://unpkg.com/filepond/dist/filepond.min.css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <style type="text/css">
    .caret
    {
      display: none;
    }
    .select .input-field .prefix ~ input, .input-field .prefix ~ textarea , .input-field .prefix ~ div.select-wrapper 
    {
      margin-left: 3rem !important;
      width: 92% !important;
      width: calc(100% - 3rem) !important; 
    }
    .filepond--drop-label {
      color: #4c4e53;
    }

    .filepond--label-action {
      text-decoration-color: #babdc0;
    }

    .filepond--panel-root {
      background-color: #edf0f4;
    }


/**
 * Page Styles
 */
 html {
  padding: 20vh 0 0;
 }

 .filepond--root {
  width:170px;
  margin: 0 auto;
 }
  </style>
</head>
<body>
  <nav style="background-color: WHITE;">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><img src="img/logo.png" height="60" width="180" style="padding: 10px;"></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul>
    </div>
  </nav>
  <div class="row center-align" style="height: 50px;width: 100%;background-color: #e62739;padding: 15px;color: white;">REGISTER PROFILE</div>
  <div class="container">
    <div id="register-profile" class="col s12 l3 m3">
      <form action = "" method = "post" class="col s12 l3 m3">
        <div class="form-container">
          <div class="row">
            <div class="col s12">
              <input type="file" class="filepond" name="filepond" accept="image/png, image/jpeg, image/gif"/>
            </div>            
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">person_outline</i>
              <input id="name" type="text" class="validate" name = "name">
              <label for="name">Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">wc</i>
              <input id="gender" type="text" class="validate" name = "gender">
              <label for="gender">Gender</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">accessible_forward</i>
              <input id="age" type="text" class="validate" name = "age">
              <label for="age">Age</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">vertical_split</i>
              <input id="height" type="text" class="validate" name = "height">
              <label for="height">Height</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">accessibility</i>
              <input id="weight" type="text" class="validate" name="weight">
              <label for="weight">Weight</label>
            </div>
          </div>
          
          <div class="input-field col s12 select">
            <i class="material-icons prefix">directions_run</i>
            <select>
              <option value="" disabled selected>Choose your option</option>
              <option value="1">Option 1</option>
              <option value="2">Option 2</option>
              <option value="3">Option 3</option>
            </select>
            <label>Daily Activity</label>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">local_hospital</i>
              <input id="medical" type="text" class="validate" name = "medical">
              <label for="medical">Medical Conditions</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">location_on</i>
              <input id="location" type="text" class="validate" name = "location">
              <label for="location">Location</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">transfer_within_a_station</i>
              <input id="bmi" type="text" class="validate" name = "bmi">
              <label for="bmi">BMI</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">done_all</i>
              <input id="goal" type="text" class="validate" name="goal">
              <label for="goal">Goal</label>
            </div>
          </div>
          <br>
          <center>
            <button class="btn waves-effect waves-light" style="background-color: #e62739;" type="submit" name="action">Register</button>
            <br>
            <br>
            
          </center>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('select').formSelect();
  });
/*
We need to register the required plugins to do image manipulation and previewing.
*/
FilePond.registerPlugin(
  // encodes the file as base64 data
  FilePondPluginFileEncode,
  
  // validates files based on input type
  FilePondPluginFileValidateType,
  
  // corrects mobile image orientation
  FilePondPluginImageExifOrientation,
  
  // previews the image
  FilePondPluginImagePreview,
  
  // crops the image to a certain aspect ratio
  FilePondPluginImageCrop,
  
  // resizes the image to fit a certain size
  FilePondPluginImageResize,
  
  // applies crop and resize information on the client
  FilePondPluginImageTransform
);

// Select the file input and use create() to turn it into a pond
// in this example we pass properties along with the create method
// we could have also put these on the file input element itself
FilePond.create(
  document.querySelector('input'),
  {
    labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
    imagePreviewHeight: 170,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 200,
    imageResizeTargetHeight: 200,
    stylePanelLayout: 'compact circle',
    styleLoadIndicatorPosition: 'center bottom',
    styleButtonRemoveItemPosition: 'center bottom'
  }
);
</script>

</body>
</html>