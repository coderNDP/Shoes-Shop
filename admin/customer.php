<?php
 include_once "head.php";

 include_once "../config.php";
 $sql = "SELECT * FROM customer ";
 $result = mysqli_query($conn,$sql);
?>

<style>
  h2{
    margin-left: 100px;
    font-family: 'Times New Roman', Times, serif;
  }
  .menu{
    background-image: url(../img/staff_bg.jpg);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    width: 100%;
    height: 100%;
  }
</style>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/button.css">
    <script src="../js/bootstrap.min.js"></script>
    <script defer src="../js/bootstrap.bundle.min.js"></script>
  <div class="menu">
  <h2 style="color: white;">Customer's List</h2>
  
  <div style="margin-left: 100px; margin-top:100px;">
  <table class="table table-hover table-dark">
  <tr>
  <th scope="col">ID</th>
      <th scope="col">Fullname</th>
      
      <th scope="col">Email</th>
      
      <th scope="col">Status</th>
      <th></th>
  </tr>
  <?php 
     foreach ($result as $customer) :
   ?>
  <tr>
      <td><?php echo $customer["id"]; ?></td>
       <td><?php echo $customer["username"]; ?></td>
       <td><?php echo $customer["email"]; ?></td>
       <td><?php
        if($customer["status"] == 1){
          echo "Active";
        }else{
          echo "Deactive";
        } ?></td>
        
        
        <td>

        <div style="margin-left: 100px;"><a href='delete-customer.php?id_customer=<?php echo $customer['id_customer'] ?>'>
                    <button type="button" class="button_3" onclick="return confirm('Are you sure to delete?')">
                    <span class="button__icon"><img src="../icon/trash.png" alt="">  </span>
                    </button>
                    </a>
                    </div>
                    <div style="margin-left: 100px; margin-top:10px;"><a href='edit-customer.php?id_customer=<?php echo $customer['id_customer'] ?>'>
                    <button class="edit-button">
                    <svg class="edit-svgIcon" viewBox="0 0 512 512">
                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                  </svg>
                  </button></a>
      </div>
                
        </td>
  </tr>
  <?php endforeach; ?>
</table>
</div>
</div>

 </body>
 </html>
   
</body>
</html> 
