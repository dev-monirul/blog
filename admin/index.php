<?php
 include 'inc/config.php';
 include 'inc/header.php';
  ?>
    <div class="row mt-5">
        <div class="col-lg-3">
            <div class="list-group">
                <ul class="list-group">
                    <li class="list-group-item active">Sidebar Menu</li>
                    <li class="list-group-item"><a class="text-dark text-decoration-none" href="">Posts</a></li>
                    <li class="list-group-item"><a class="text-dark text-decoration-none" href="">Catagories</a></li>
                    <li class="list-group-item"><a class="text-dark text-decoration-none" href="">Users</a></li>
                    <li class="list-group-item"><a class="text-dark text-decoration-none" href="">Settings</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9">
            <a href="add-user.php" class="btn btn-primary mb-3">Add New User</a>

            <?php
                if(isset($_SESSION['user-update'])){
                    echo $_SESSION['user-update'];
                    unset($_SESSION['user-update']);
                }

                if(isset($_SESSION['user-delete'])){
                    echo $_SESSION['user-delete'];
                    unset($_SESSION['user-delete']);
                }
            ?>
            <table class=" table table-bordered">
                <tr>
                    <th>SL No.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>

                <?php
                    $users = "SELECT * FROM users";
                    $result = mysqli_query($con, $users);
                    $i = 0;
                    while($row = mysqli_fetch_assoc($result)) {
                        $i++
                        ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $row['fullname']?></td>
                                <td><?php echo $row['username']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php if($row['role'] == 0) {echo 'Admin'; } else {echo 'Moderator';}?></td>
                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-success" type="button"><a class="text-white text-decoration-none" href="edit-user.php?id=<?php echo $row['id']?>">Edit</a></button>
                                        <button class="btn btn-danger" type="button"><a class="text-white text-decoration-none" onclick="return confirm('Are You Sure?')" href="delete-user.php?id<?php echo $row['id']?>">Delete</a></button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</div>
</section>
<?php include 'inc/footer.php'; ?>