<header>
    <nav class="navbar navbar-expand-lg navbar-light pt-3 pb-2 pb-md-4">
        <ul class="navbar-nav">
            <a class="navbar-brand" href=<?php echo base_url()?>>
                <h3 class="display-6 text-primary pl-md-5 pl-2"><i class='text-primary fas fa-user-plus'></i> Ilkom Connect</h3>
            </a>
        </ul>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <i class='text-primary fas fa-angle-down' style="font-size: 35px"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="nav navbar-nav pl-3 pl-md-5">
                <li class="nav-item mr-lg-5 align-self-start align-self-lg-center">
                    <a class="nav-link text-primary" href="<?php echo site_url("Student_list")?>">Student List</a>
                </li>
                <li class="nav-item mr-lg-5 align-self-start align-self-lg-center">
                    <a class="nav-link text-primary" href="#about">About</a>
                </li>
                <?php if (!isset($loggedin)) {?>
                <li class="nav-item mr-lg-5 align-self-start align-self-lg-center">
                    <a class="nav-link btn btn-primary text-white px-3" href=<?php echo site_url("Login")?>>Sign in</a>
                </li>
                <?php } else {?>
                <li class="nav-item mr-lg-5 align-self-start align-self-lg-center">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-primary" data-toggle="dropdown" href="#">
                            <span class="text-primary font-weight-bolder" style="line-height: 40px">
                                <?php echo $username?>
                            </span>
                            <img class="rounded-circle ml-1" style="width: 40px" src=<?php echo base_url($imgUrl)?>>
                        </a>
                        <div class="dropdown-menu shadow border-0 rounded">
                            <a class="dropdown-item text-primary" href="<?php echo site_url("Profile")?>">View profile</a>
                            <a class="dropdown-item text-primary" href="<?php echo site_url("Logout")?>">Sign out</a>
                        </div>
                    </div>
                </li>
                <?php }?>
            </ul>
        </div>
    </nav>
</header>
