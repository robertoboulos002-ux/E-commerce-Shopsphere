<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
    <?php
    $get_users = "SELECT * FROM `user_table`";
    $result = mysqli_query($con, $get_users);
    $row_count = mysqli_num_rows($result);

    if ($row_count == 0) {
        echo "<h2 class='text-danger text-center mt-5'>No Users yet</h2>";
    } else {
        echo "<tr>
                <th>SNO</th>
                <th>User name</th>
                <th>Email</th>
                <th>User Image</th>
                <th>User Address</th>
                <th>User Mobile</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody class='bg-secondary text-center'>";
    }
    $number = 0;
    while ($row_data = mysqli_fetch_assoc($result)) {
        $user_id = $row_data['user_id'];
        $username = $row_data['username'];
        $user_email = $row_data['user_email'];
        $user_image = $row_data['user_image'];
        $user_address = $row_data['user_address'];
        $user_mobile = $row_data['user_mobile'];
        $number++;
        echo "<tr>
                <td>$number</td>
                <td>$username</td>
                <td>$user_email</td>
                <td><img src='../user_area/user_images/$user_image' alt='$username' class='product_image'></td>
                <td>$user_address</td>
                <td>$user_mobile</td>
                <td>
                    <a href='index.php?delete_users=$user_id' class='text-success' type='button' data-bs-toggle='modal' data-bs-target='#exampleModal$user_id'>
                        <i class='fa-solid fa-trash'></i>
                    </a>
                </td>
              </tr>";
        ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?php echo $user_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4>Are you sure you want to delete this?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <a href="./index.php?list_users" class="text-light text-decoration-none">No</a>
                        </button>
                        <a href="index.php?delete_users=<?php echo $user_id ?>" class="btn btn-primary text-light text-decoration-none">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </tbody>
</table>
