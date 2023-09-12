<?php
include('../includes/connect.php');
if(isset($_POST['insert-cat'])){
    $category_title=$_POST['cat-title'];

//select data from database (to avoid redundant category)
    $select_query="Select * from `categories` where category_title='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);

    if($number>0){
        echo"<script>alert('This category has already been added')</script>";
    }else{


//adding categories to database
    $insert_query="insert into `categories` (category_title) values ('$category_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo"<script>alert('Category has been inserted successfully')</script>";
    }
}}

?>

<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="cat-title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">

    </div>

    <div class="input-group w-10 mb-2 m-auto">
    
        <div class="form-floating">
            <input type="submit" class="bg-info border-0 p-2 my-3" name="insert-cat" value="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
        <!-- <button class="bg-info p-2 my-3 border-0">Insert Categories</button> -->
        </div>
</form>