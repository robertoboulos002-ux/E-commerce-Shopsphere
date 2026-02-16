<h3 class="text-center text-success">All brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center"> <!-- Corrected class name -->

    <?php
     $get_brands="Select * from `brands`";
     $result=mysqli_query($con,$get_brands);
     $row_count=mysqli_num_rows($result);
    

if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No Brands</h2>";
}else{
      echo"  <tr>
            <th>SNO</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'> "; //<!-- Corrected class name -->
}
    ?>
    </thead>
    <tbody class="bg-secondary text-light"> <!-- Corrected class name -->
    <?php
    $number=0;
    while($row_cat=mysqli_fetch_assoc($result)){
        $category_id=$row_cat['brand_id'];
        $category_title=$row_cat['brand_title'];
        $number++;
    
    ?>
        <tr class="text-center">
            <td><?php echo $number; ?></td>
            <td><?php echo $category_title; ?></td>
            <td><a href='index.php?edit_brand=<?php echo $category_id ?>' class='text-success'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_brand=<?php echo $category_id ?>' class='text-success' type="button" class="text-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $category_id; ?>"><i class='fa-solid fa-trash'></i></a></td>
       
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?php echo $category_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $category_id; ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
               <h4>Are you sure you want to delete this?</h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="./index.php?view_categories" class="text-light text-decoration-none">No</a></button>
                <button type="button" class="btn btn-primary"> <a href='index.php?delete_brand=<?php echo $category_id ?>' type="button" class="text-light text-decoration-none">Yes</a>  </button>
              </div>
            </div>
          </div>
        </div>

    <?php
    }
    ?>
    </tbody>
</table>
