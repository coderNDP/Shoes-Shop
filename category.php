<?php
  include_once "sidebar.php";
  require_once "config.php";
  $query = "SELECT * FROM category WHERE id_cha IS NULL";
  $result = mysqli_query($conn, $query);
  $categoryID = isset($_GET['id_category']) ? $_GET['id_category'] : 0;

  if ($categoryID == 0) {
      // Trường hợp hiển thị tất cả sản phẩm
      $sql = "SELECT * FROM product as p 
      INNER JOIN brand as b on b.id = p.id_brand 
      INNER JOIN category as c ON c.id_category = p.id_category
      INNER JOIN product_detail as pd ON pd.id_product = p.id_product
      INNER JOIN color as cl ON cl.id_color = pd.id_color ";
  } else {
      $sql = "SELECT * FROM product as p
      INNER JOIN brand as b on b.id = p.id_brand
      INNER JOIN category as c ON c.id_category = p.id_category
      INNER JOIN product_detail as pd ON pd.id_product = p.id_product
      INNER JOIN color as cl ON cl.id_color = pd.id_color 
      
      WHERE c.id_category = $categoryID";
  }
  $result0 = mysqli_query($conn, $sql);
?>



 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 </head>
 <style>
    .card{
      position: relative;
      margin-left: 100px;
      box-sizing: border-box;
      width: 374px;
      height: 559px;
      box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.5);
      border-radius: 5px;

    }
    .shoe{
      box-sizing: border-box;
      width: 374px;
      height: 374px;
    }
    .name{
      font-family: 'Times New Roman', Times, serif;
      padding-left: 10px;
      font-size: 25px;
      
    }
    .des{
      padding-left: 10px;
      color: gray;
      font-family: 'Times New Roman', Times, serif;
      font-size: 20px;
    }
    .price{
      font-weight: bolder;
      padding-left: 10px;
      font-size: 30px;
      font-family: 'Times New Roman', Times, serif;
    }
    .cartBtn {
      float: right;
      margin-right: 30px;
      margin-top: 15px;
    width: 155px;
    height: 50px;
    border: none;
    border-radius: 0px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    color: white;
    font-weight: 500;
    position: relative;
    background-color: rgb(29, 29, 29);
    box-shadow: 0 20px 30px -7px rgba(27, 27, 27, 0.219);
    transition: all 0.3s ease-in-out;
    cursor: pointer;
    overflow: hidden;
  }
  
  .cart {
    z-index: 2;
  }
  
  .cartBtn:active {
    transform: scale(0.96);
  }
  
  .product {
    position: absolute;
    width: 12px;
    border-radius: 3px;
    content: "";
    left: 23px;
    bottom: 23px;
    opacity: 0;
    z-index: 1;
    fill: rgb(211, 211, 211);
  }
  
  .cartBtn:hover .product {
    animation: slide-in-top 1.2s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
  }
  
  @keyframes slide-in-top {
    0% {
      transform: translateY(-30px);
      opacity: 1;
    }
  
    100% {
      transform: translateY(0) rotate(-90deg);
      opacity: 1;
    }
  }
  
  .cartBtn:hover .cart {
    animation: slide-in-left 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
  }
  
  @keyframes slide-in-left {
    0% {
      transform: translateX(-10px);
      opacity: 0;
    }
  
    100% {
      transform: translateX(0);
      opacity: 1;
    }
  }
  .btn {
    margin-top: 15px;
    margin-left: 40px;
  outline: none;
  display: inline-block;
  border: 1px solid #fff;
  padding: .8rem 2rem;
  border-radius: 5px;
  background: black;
  color: #fff;
  font-size: 1rem;
  transition: .3s;
  cursor: pointer;
  position: relative;
}

.btn::before {
  content: '';
  position: absolute;
  left: 5px;
  top: 5px;
  border-top: 2px solid #fff;
  border-left: 2px solid #fff;
  width: 0px;
  height: 0px;
  opacity: 0;
  transition: .3s;
}

.btn::after {
  content: '';
  position: absolute;
  right: 5px;
  bottom: 5px;
  border-bottom: 2px solid #fff;
  border-right: 2px solid #fff;
  width: 0px;
  height: 0px;
  opacity: 0;
  transition: .3s;
}

.btn:hover {
  box-shadow: 4px 4px 10px rgb(184, 184, 184);
  transform: translateY(-5px);
}

.btn:hover::after, .btn:hover::before {
  height: 20px;
  width: 20px;
  opacity: 1;
}
a{
    text-decoration: none;
    color: black;
    font-family: 'Times New Roman', Times, serif;
    
  }
 </style>
 <body>
  
 <script src="js/cart.js"></script>
 
 <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Menu</span>
      <div style="margin-left:500px; font-size: 60px; font-family:'Brush Script MT', Times, serif; font-weight:bold;">Shop </div>
    </div>
    <br>
    <table cellspacing="5" cellpadding="50">
   
    <?php  $count = 0;
        $count = 0;
        while ($row = mysqli_fetch_assoc($result0)):
          if ($count % 3 == 0) {
            echo "<tr>";
        }
       ?>
       <?php echo "<td>"; ?>
      <div class="card responsive">
        <div class="shoe"> <a href="product-detail.php?id=<?php echo $row['id_product'] ?>"> <img src="img/<?php echo $row['img']; ?>"  alt="" width= "374px;" height= "374px;"> </a></div>
        <br>
        <div class="name" name="name"> <a href="product-detail.php?id=<?php echo $row['id_product'] ?>"> <?php echo $row['name']; ?> </a> </div>
        <div class="des" name="description"><?php echo $row['Des']; ?></div>
        <div class="price" name="price">$<?php
        if($row['sale_price'] == 0){
        echo $row['price'];}
        else{
          echo $row['sale_price']."<s style='
          color: red;
          font-size: 25px;
          padding-left: 10px;
          '>$".$row['price']."</s>";
        } ?></div>
        
        <div>
        <a href="product-detail.php?id=<?php echo $row['id_product'] ?>">
        <button class="btn">
              DETAILS
        </button>
        </a>
         
        <button class="cartBtn" onclick="addToCart(<?php echo $row['id_product']?>)">
          <svg class="cart" fill="white" viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path></svg>
            ADD TO CART
          <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512" class="product"><path d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z"></path></svg>
        </button>
        
        </div>
     </div>
  </div>
  
  <?php echo "</td>" ?>
  <?php $count++;
        if ($count % 3 == 0) {
            echo "</tr>";
        }
      endwhile;
    ?>
      
  </table>
  </section>
  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });



  </script>
  <script src="js/category.js"></script>


 </body>
 </html>