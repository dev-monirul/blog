<?php
 include 'inc/config.php';
 include 'inc/header.php';
  ?>

<?php
    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $role = $_POST['role'];

        $user_check = "SELECT username, email FROM users WHERE username = '$username' or email = '$email'";
        $user_query = mysqli_query($con, $user_check);
        $user_count = mysqli_num_rows($user_query);

        if($user_count > 0){
            echo 'Username or Email already exists';
        } else{
            $user_insert = "INSERT INTO users (fullname, username, email, password, role) VALUES ('$fullname', '$username', '$email', '$password', '$role')";
            $user_result = mysqli_query($con, $user_insert);
            if($user_result){
                header('location: index.php');
            }
        }
    }
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
    <?php if(isset($error)) {echo $error;}?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="fullname">
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label class="form-label">Role</label>
            <select class="form-control" name="role">
                <option value="0">Admin</option>
                <option value="1">Moderator</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Add User</button>
    </form>
    
</div>
</div>


<?php include 'inc/footer.php'; ?>