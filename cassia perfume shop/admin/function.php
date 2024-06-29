<?php
function insert_category()
{
    global $connection;
    // global $msg;
    $cat_name=$_POST['category'];
    $cat_photo=$_FILES['catphoto']['name'];
    if($cat_name=="")
    {
        echo "<script>window.alert('enter name')</script>";
    }
    else if($cat_name!="")
    {
        $query="SELECT * from category where catname='$cat_name'";
        $ch_query=mysqli_query($connection,$query);
        $count=mysqli_num_rows($ch_query);
            if($count>0){
                echo "<script>window.alert('already exists')</script>";
            }
            else
            {
                $query="INSERT into category(catname,catphoto)values('$cat_name','$cat_photo')";
                $go_query=mysqli_query($connection,$query);
                if(!$go_query){
                    die("QUERY FAILED".mysqli_error($connection));
                }
                 else {
                        move_uploaded_file($_FILES['catphoto']['tmp_name'], '../Photo/' . $cat_photo);
                        header("location: category.php");
                    }
                }
            }
    }


function delCategory()
{
    global $connection;
    $catid=$_GET['cid'];
    $query="Delete from category where catid='$catid'";
    $go_query=mysqli_query($connection,$query);
    header("location:category.php");
}


function updateCategory()
{
    global $connection;
    $catname=$_POST['catname'];
    $catid=$_GET['cid'];
    $catphoto=$_FILES['catphoto']['name'];
    // $query="update category set catname='$catname' where catid='$catid'";
    // $go_query=mysqli_query($connection,$query);

    if(!$catphoto)
    {
        $query="UPDATE category set catname='$catname' where catid='$catid'";
    }
    else
    {
        $query="UPDATE category set catname='$catname',catphoto='$catphoto' where catid='$catid'";
    }
    $go_query=mysqli_query($connection,$query);
    if(!$go_query)
    {
        die("QUEYR FAILED".mysqli_error($connection));
    }
    else
    {
        move_uploaded_file($_FILES['catphoto']['tmp_name'],'../Photo/'.$catphoto);
    }
    header("location:category.php");
}

// function adduser()
// {
//     global $connection;
//     $username=$_POST['username'];
//     //check password match (start)
//     $password=$_POST['password'];
//     $confirmpassword=$_POST['cpassword'];
//     if($password!=$confirmpassword)
//     {
//         echo "<script>window.alert('Password and Confirm Password are must be same')</script>";
//     }
//     //check password match(end)
    function adduser()
{
    global $connection;
    $uname=$_POST['username'];
    $password=$_POST['password'];
    $cpass=$_POST['cpassword'];
    $usertype=$_POST['role'];

      if($password!=$cpass)
      {
        echo"<script>window.alert('Password and comfrim password are must be same')</script>";
      }
      else if($password!="" && $uname!="")
       {
           $query="select * from user where username='$uname' and password='$password'";
           $ch_query=mysqli_query($connection,$query);
           $count=mysqli_num_rows($ch_query);
             if($count>0)
             {
                echo"<script>window.alert('This is already exist')</script>";
             }
             else
             {
                $hashvalue=md5($password);            
                $query="insert into user(username,password,role) values('$uname','$hashvalue','$usertype')";
                $go_query=mysqli_query($connection,$query);
                if(!$go_query)
                    {
                        die("QUERY FAILED".mysqli_error($connection));
                    }
                 header("location:userlist.php");
             }
       }
    }
    function deluser()
    {
        global $connection;
        $userid=$_GET['uid'];
        $query="delete from user where userid='$userid'";
        $go_query=mysqli_query($connection,$query);
        header("location:userlist.php");
    }

    function admin_login()
{
    global $connection;
    $useraname=$_POST['username'];//textbox name
    $password=$_POST['password'];//textbox name
    $hpass=md5($password);
    $query="Select * from user";
    $go_query=mysqli_query($connection,$query);
    while($out=mysqli_fetch_array($go_query))
    {
        $dbusername=$out['username'];//fieldname
        $dbuserpassword=$out['password'];
        $dbuserrole=$out['role'];
        if($dbusername==$useraname && $dbuserpassword==$hpass && $dbuserrole=='admin')
        {
            $_SESSION['admin']=$useraname;
            header('location:dashboard.php');
        }
        else
        {
            echo "<script>window.alert('Invalid Admin Name and password')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }
}
// function addproduct()
// {
//     global $connection;
//     $productname=$_POST['productname'];//textbox name
//     $categoryid=$_POST['category'];//select name
//     $price=$_POST['price'];//textbox name
//     $quantity=$_POST['qty'];//textbox name
//     $photo=$_FILES['photo']['name'];//file name
//     if(is_numeric($price)==false)
//     {
//         echo "<script>window.alert('Please Enter Price is numeric value')</script>";
//     }
//     elseif(is_numeric($quantity)==false)
//     {
//         echo "<script>window.alert('Please Enter Product Quantity is numeric value')</script>";
//     }
//     elseif($photo=="")
//     {
//         echo "<script>window.alert('Choose Product Images')</script>";
//     }
//     elseif($productname!="" && $photo!="")
//     {
//         $query="Select * from product where productname='$productname'";
//         $ch_query=mysqli_query($connection,$query);
//         $count=mysqli_num_rows($ch_query);
//         if($count>0)
//         {
//             echo"<script>window.alert('This Product is already exists')</script>";
//         }
//         else
//         {
//             $query="INSERT into product(productname,category,price,qty,photo) values('$productname','$categoryid','$price','$quantity','$photo')";
//             $go_query=mysqli_query($connection,$query);
//             if(!$go_query)
//             {
//                 die("QUERY FAILED".mysqli_error($connection));
//             }
//             else
//             {
//                 move_uploaded_file($_FILES['photo']['tmp_name'],'../Photo/'.$photo);
//                 header("location:productlist.php");
//             }
//         }
//     }
// }

function addproduct()
{
    global $connection;
    $product_name = $_POST['productname'];
    $cat_id = $_POST['category'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $photo = $_FILES['photo']['name'];
    $info=$_POST['info'];
    if (!is_numeric($price)) {
        echo "<script>window.alert('Enter product Price as a numeric value')</script>";
    } elseif (!is_numeric($qty)) {
        echo "<script>window.alert('Enter product qty as a numeric value')</script>";
    } elseif ($photo == "") {
        echo "<script>window.alert('Choose product Image')</script>";
    } elseif ($product_name != "" && $photo != "" && $info != "") {
        $query = "SELECT * FROM product WHERE productname='$product_name'";
        $ch_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($ch_query);
        if ($count > 0) {
            echo "<script>window.alert('This Product already exists')</script>";
        } else {
            $query = "INSERT INTO product (productname, categoryid, price, qty, photo , productinfo) VALUES ('$product_name', '$cat_id', '$price', '$qty', '$photo','$info')";
            $go_query = mysqli_query($connection, $query);
            if (!$go_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            } else {
                move_uploaded_file($_FILES['photo']['tmp_name'], '../Photo/' . $photo);
                header("location: productlist.php");
            }
        }
    }
}


function del_product()
{
    global $connection;
    $p_id=$_GET['p_id'];
    $query="DELETE from product where product_id='$p_id'";
    $go_query=mysqli_query($connection,$query);
    header("location:product.php");
}
function update_product()
{
    global $connection;
    $product_id=$_GET['pid'];
    $product_name=$_POST['productname'];
    $cat_id=$_POST['category'];
    $price=$_POST['price'];
    $qty=$_POST['qty'];
    $photo=$_FILES['photo']['name'];
    $info=$_POST['productinfo'];
    if(!$photo)
    {
        $query="update product set productname='$product_name',categoryid='$cat_id', price='$price',qty='$qty',productinfo='$info' where productid='$product_id'";
    }
    else
    {
        $query="update product set productname='$product_name',categoryid='$cat_id', price='$price',qty='$qty',photo='$photo',productinfo='$info' where productid='$product_id'";
    }
    $go_query=mysqli_query($connection,$query);
    if(!$go_query)
    {
        die("QUEYR FAILED".mysqli_error($connection));
    }
    else
    {
        move_uploaded_file($_FILES['photo']['tmp_name'],'../Photo/'.$photo);
    }
    header("location:productlist.php");
}

function insert_carosel()
{
    global $connection;
    $carname=$_POST['caroname'];
    $carphoto=$_FILES['carophoto']['name'];
    $carolabel=$_POST['carolabel'];
    if ($carphoto == "" ) {
        echo "<script>window.alert('Choose product Image')</script>";
}
 elseif($carname==""){
    echo "<script>window.alert('Write Name')</script>";
 }
 elseif($carolabel==""){
    echo "<script>window.alert('Write Label')</script>";
 }
 elseif ($carname != "" && $carphoto != "" && $carolabel!="") {
    $query = "SELECT * FROM carosel WHERE caroname='$carname'";
    $ch_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($ch_query);
    if ($count > 0) {
        echo "<script>window.alert('This is already existed')</script>";
    } else {
        $query = "INSERT INTO carosel (caroname, carophoto,carolabel) VALUES ('$carname','$carphoto','$carolabel')";
        $go_query = mysqli_query($connection, $query);
        if (!$go_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        } else {
            move_uploaded_file($_FILES['carophoto']['tmp_name'], '../Photo/' . $carphoto);
            header("location: add_c.php");
        }
    }
}
}

function delCarosel()
{
    global $connection;
    $caroid=$_GET['caroid'];
    $query="DELETE from carosel where caroid='$caroid'";
    $go_query=mysqli_query($connection,$query);
    header("location:carosel.php");
}

function updateCarosel()
{
    global $connection;
    $caroname=$_POST['caroname'];
    $caroid=$_GET['caroid'];
    $carolabel=$_POST['carolabel'];
    $carophoto=$_FILES['carophoto']['name'];
    // $query="update category set catname='$catname' where catid='$catid'";
    // $go_query=mysqli_query($connection,$query);

    if(!$carophoto)
    {
        $query="UPDATE carosel set caroname='$caroname',carolabel='$carolabel' where caroid='$caroid'";
    }
    else
    {
        $query="UPDATE carosel set caroname='$caroname',carophoto='$carophoto',carolabel='$carolabel' where caroid='$caroid'";
    }
    $go_query=mysqli_query($connection,$query);
    if(!$go_query)
    {
        die("QUEYR FAILED".mysqli_error($connection));
    }
    else
    {
        move_uploaded_file($_FILES['carophoto']['tmp_name'],'../Photo/'.$carophoto);
    }
    header("location:add_c.php");
}

?>

