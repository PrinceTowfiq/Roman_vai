<?php 

include "config.php";

$sql = "SELECT * FROM users";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>View Page</title>
</head>

<body>
<?php include 'nav.php';?>

<section class="vh-100" style="background-color: #eee;">
  <div class="container ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="">
              <div class="container">
                 <h2>USER LIST</h2>
                 <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <tbody> 

<?php

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

?>
            <tr>

            <td><?php echo $row['id']; ?></td>

            <td><?php echo $row['firstname']; ?></td>

            <td><?php echo $row['lastname']; ?></td>

            <td><?php echo $row['email']; ?></td>

            <td><?php echo $row['gender']; ?></td>

            <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

            </tr>                       

                        <?php       }

                            }

                        ?>                

                    </tbody>
                </table>
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