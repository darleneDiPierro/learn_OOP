<?php
?>
    <div class="navbar">
        <link rel="stylesheet" href="<?= base_url('assets/css/navbar.css') ?>">
        <ul>
            <li><a href="<?= base_url('index.php') ?>">Home</a></li>
            <li><a href="">List Mahasiswa</a></li>

            <?php if(isset($_SESSION['authenticated'])) : ?>
                
                <li class="dropdown">
                        <button class="dropbtn">
                        <a href="<?= base_url('myprofile.php') ?>">My Profile</a> 

                        <img class="drop_logo" src="<?= base_url('assets/images/down-arrow.png') ?>" alt="">
                        <i class="fa fa-caret-down"></i>
                        </button>
                    <div class="dropdown-content">
                        <a href="" style="color: black;"><?= $_SESSION['auth_user']['user_fname']." ".$_SESSION['auth_user']['user_lname']   ?></a>
                        <form action="" method="POST">
                            <button type="submit" name="logout_btn" class="drop_logout">Logout</button>
                        </form>
                    </div>
                </li> 
                

            <?php else : ?>
                <li><a href="<?= base_url('login.php') ?>">Login</a></li>     
                <li><a href="<?= base_url('register.php') ?>">Register</a></li>
            <?php endif; ?>  

        </ul>
    </div>