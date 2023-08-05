<?php 

include "config.php";

    if (isset($_POST['update'])) {

        $firstname = $_POST['firstname'];

        $user_id = $_POST['user_id'];

        $lastname = $_POST['lastname'];

        $email = $_POST['email'];

        $password = $_POST['password'];

        $gender = $_POST['gender']; 

        $sql = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$password',`gender`='$gender' WHERE `id`='$user_id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $first_name = $row['firstname'];

            $lastname = $row['lastname'];

            $email = $row['email'];

            $password  = $row['password'];

            $gender = $row['gender'];

            $id = $row['id'];

        } 

    ?>
<?php include 'nav.php';?>
 
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">User Update Form</p>

                <form class="mx-1 mx-md-4"  action="" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Update Your Name</label>
                      <input type="text" id="form3Example1c" class="form-control" name="firstname"  value="<?php echo $first_name; ?>"/>
                      <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">  
                      <label class="form-label" for="form3Example1c">Update Your Last Name</label>
                      <input type="text" id="form3Example1c" class="form-control" name="lastname" value="<?php echo $lastname; ?>"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example3c"> Update Your Email</label>  
                    <input type="email" id="form3Example3c" class="form-control" name="email" value="<?php echo $email; ?>" />                     
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="form3Example4c"> Update Your Password</label>
                    <input type="password" id="form3Example4c" class="form-control" name="password" value="<?php echo $password; ?>"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="radio" id="form3Example4cd"  name="gender" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?>/>
                      <label class="form-label" for="form3Example4cd">Male</label>
                    </div>
                    <div class="form-outline flex-fill mb-0">
                      <input type="radio" id="form3Example4cd"  name="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?> />
                      <label class="form-label" for="form3Example4cd">Female</label>
                    </div>
                  </div>


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" name="update" value="update">Update</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?> 