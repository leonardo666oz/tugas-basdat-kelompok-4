<?php include('include/Connection.php');

if(isset($_POST['submit'])){
   extract($_POST);

    $sql = "SELECT * from user_registration where  User_Name='".$usrname."' and Contact_No='".$Contact_No."' ";
      $info = $db->query($sql);
          if($info->num_rows>0) 
          { 
            $valid = 'Allready'; 
          }else{
            $insert = "insert into user_registration(User_Name,,Password,Address,Contact_No) 
             VALUES('".$usrname."','".$fname."','".$Contact_No."','".$address."','".$Contact_No."')";
              $query1 = $db->query($insert);

              $insert1 = "insert into user_login(User_Name,Password) 
             VALUES('".$usrname."','".$Contact_No."')";
             $query = $db->query($insert1);
             if($query1){
              $valid = 'true';
             }else{
              $valid = 'false';
             }
          }
    
}

?>




<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
  .modal-header, h4, .close {
      background-color: #0033FF;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>
</head>
<body>
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4><span class="glyphicon glyphicon-user"></span> Registration</h4>
        </div>
        <?php if(isset($valid) && $valid == 'false') { ?>
        <div class="alert alert-danger">
          Invalid Username or Password
                </div>
                <?php };
                if(isset($valid) && $valid == 'true') { ?>
        <div class="alert alert-danger">
         Registration Sucessfully
                </div>
                <?php };
                if(isset($valid) && $valid == 'Allready') { ?>
        <div class="alert alert-danger">
         This User Allready Register
                </div>
                <?php } ?>       
        <div class="modal-body" style="padding:40px 50px;">
          <form  role="form" method="post" action=""> 
            <div class="form-group">
             <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control"
               id="usrname" required="" name="usrname" placeholder="Enter User Name">
            </div>

             <div class="form-group">
             <label for="psw"><span class="glyphicon glyphicon-envelope"></span> Email</label>
              <input type="text" class="form-control" name="fname" required="" placeholder="Enter Email">
            </div>

             <div class="form-group">
             <label for="psw"><span class="glyphicon glyphicon-phone"></span>Phone no</label>
              <input type="Number" class="form-control" name="Contact_No" required="" placeholder="Enter Phone No">
            </div>

             <div class="form-group">
             <label for="psw"><span class="glyphicon glyphicon-home"></span> Address</label>
              <input type="text" class="form-control" name="address" required="" placeholder="Enter Address">
            </div>

            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
            <input type="submit" name="submit" class="form-control btn btn-success btn-block"  placeholder="Submit">
             <!--  <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Submit</button> -->
          </form>
        </div>
        <div class="modal-footer">
          <p><a href="index.php">Main website</a></p>
          <p>Allready Register <a href="Login.php ">Login</a></p>
        </div>
      </div>
      
    </div>
  </div> 
</div>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });

    $('#myModal').modal({
    backdrop: 'static',   // This disable for click outside event
    keyboard: true        // This for keyboard event
})
</script>
</body>
</html>
