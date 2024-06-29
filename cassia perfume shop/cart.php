<?php 
session_start();
include 'admin/conn.php';
include 'function.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shopping Cart</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
         <!-- custom css -->
    <link rel="stylesheet" href="css/cartstyle.css">
              <!-- font awsome cdn link -->
              <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

        <style>
          #summary {
            background-color: #f6f6f6;
          }
          .sty{
            text-decoration: none;
          }
          .bd{
            background-color: #ffedf1;
          }
        </style>
      </head>
      <?php include 'header.php' ?>
            <h3 class="ml-5 mt-5 font-semibold text-xl">Welcome
                <span class="showname">
                    <?php
                    if (!empty($_SESSION['user'])) {
                        echo $_SESSION['user'];
                    } else {
                         $_SESSION['user'] = '';
                            echo "no";
                     }
                    ?>
                </span>
            </h3>
            <?php if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0) : ?>
      <body class="bd">
        <div class="container mx-auto mt-10 ">
          <div class="flex shadow-md my-10">
            <div class="w-3/4 bg-white px-10 py-10">
              <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Shopping Cart</h1>
             </div>
             
             <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
              </div>
              <div  class="cart-items">
                <ul>
                <?php
                        $total = 0;
                        $insufficientStock = false;
                      
                        foreach ($_SESSION['cart'] as $id => $qty) {
                            $id = mysqli_real_escape_string($connection, $id);
                            $quantity = $qty;

                            $result = mysqli_query($connection, "SELECT * FROM product WHERE productid='$id'");

                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                $availableStock = $row["qty"];

                                if ($quantity > $availableStock) {
                                    // Insufficient stock available
                                    $insufficientStock = true;
                                    $quantity = $availableStock; // Adjust quantity to available stock
                                    $_SESSION['cart'][$id] = $quantity;  // Update the quantity in the session
                                  }
                              
                                
                               
                                // $_SESSION['cart'][$id] = $quantity;

                                $total += $row['price'] * $quantity;
                                ?>
                      <?php  if ($insufficientStock) {
                           echo "<script>window.alert('Stock is insufficient. Please review your cart.'); window.location.href='show_product.php';</script>";
                           
                               // Remove items with quantity zero from the cart
                            $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($qty) {
                              return $qty > 0 ;
                            });
                        } else{?>
             <li class="cart-row">
              <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                <div class="flex w-2/5"> <!-- product -->               
                     
                 
                  <div class="w-20">             
                    <img class="h-24 w-24" src="Photo/<?php echo $row['photo'] ?>" alt="">
                  </div>
                 
                  <div class="flex flex-col justify-between ml-4 flex-grow ">
                    <span class="font-bold text-sm"><b><?php echo $row['productname'] ?></span></b>
                    <a href="remove.php?id=<?php echo $id ?>" class="font-semibold hover:text-red-600 text-gray-600 text-xs no-underline">Remove</a>
                  </div>
                </div>
                
                <form method="post" class="flex justify-center items-center w-1/5">
                  <a href="change-qty.php?id=<?php echo $id; ?>&action=decrease">
                  <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                  </svg>
                  </a>
      
                  <input name="quantity" class="mx-2 border text-center w-8" value=" <?php echo $qty ?>">
      
                  <a href="change-qty.php?id=<?php echo $id; ?>&action=increase">
                  <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512">
                    <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                  </svg>
                  </a>
                  </form>
                
                <span class="text-center w-1/5 font-semibold text-sm">$<?php echo $row['price'] ?></span>
                <span class="text-center w-1/5 font-semibold text-sm">$<?php echo $row['price'] * $qty ?></span>
                <?php } ?>
                <?php
                            } else {
                                echo "Error in query: " . mysqli_error($connection);
                            }
                        }

                        // Insufficient stock available, restrict the purchase
                       

                        if (isset($_POST['checkout'])) {
                          // Deduct the quantity after checking out
                          foreach ($_SESSION['cart'] as $id => $qty) {
                            $id = mysqli_real_escape_string($connection, $id);
                            $quantity = $qty;
                    
                            $result = mysqli_query($connection, "SELECT * FROM product WHERE productid='$id'");
                    
                            if ($result) {
                              $row = mysqli_fetch_assoc($result);
                              $availableStock = $row["qty"];
                    
                              if ($quantity > $availableStock) {
                                // Insufficient stock available
                                echo "<script>window.alert('Stock is insufficient for some items. Please review your cart.')</script>";
                                exit;
                              }
                    
                              // Deduct the quantity
                              $newStock = $availableStock - $quantity;
                              mysqli_query($connection, "UPDATE product SET qty='$newStock' WHERE productid='$id'");
                    
                              // Update the quantity in the session
                              $_SESSION['cart'][$id] = $quantity;
                            } else {
                              echo "Error in query: " . mysqli_error($connection);
                            }
                          }
                    
                          // Clear the cart after successful checkout
                          $_SESSION['cart'] = array();
                    
                          // Redirect to a success page or perform other actions
                          // header("Location: success.php");
                          // exit;
                        }
                        ?>
              </div>
              </li>
              </ul>
                </div>
                 
              <div class="flex justify-start gap-4 sty">
                <a href="show_product.php" class="flex  font-semibold text-indigo-600 text-sm mt-10  no-underline">
                    <svg class="fill-current mr-2 text-indigo-600 w-4 " viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
                    Continue Shopping
                </a>

              <a href="clear.php" class="flex font-semibold text-red-600 text-sm mt-10 sty">        
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="fill-current mr-2 text-red-600 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
               Clear Cart
               </a>
               </div>
            </div>
      
            <div id="summary" class="w-1/4 px-8 py-10">
              <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>  
             
              <div class="border-t mt-8">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                  <span>Total cost</span>
                  <span>$<?php echo $total ?></span>
                </div>
                <form action="order_submit.php" method="post">   
                  <button type="submit" name="checkout" class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Checkout</button>                  
                  </form>
                  
              </div>
            </div>
      
          </div>
          <?php else:  ?>
            <div class="col-12 text-center " >
                <h3 >Your Cart is <span>Empty!</span></h3>
                <p class="cart-text-sm">Looks like you haven't selected any product yet</p>
                <p class="text-center"><a href="show_product.php" class="btn btn-danger">Shop Now</a></p>
            </div>
            <?php endif; ?>
            
            
        </div>
        
      </body>
      
</html>