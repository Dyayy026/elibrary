

<div class="sidebar close">
    <div class="logo-details">
        <i class='bx bxs-book'></i>
        <span class="logo_name"><img src="../../img/logowhite.png" alt=""></span>
    </div>

    <!-- search -->
    <div class="input-group md-3 " id="book-search">
        <form class="input-group md-3 " action="book_results.php" method="post">
            <input type="text" class="form-control" placeholder="Search Books" aria-describedby="button-addon2" name="item">
            <button name="search" class="btn btn-outline-secondary" id="button-addon2"><i class='bx bx-search'></i></button>
        </form>
    </div>


    <ul class="nav-links">
        <li>
            <a href="view_profile.php">
                <i class='bx bx-user'></i>
                <span class="link_name">Profile</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Home</a></li>
            </ul>
        </li>


        <li>
            <a href="AAannouncement.php">
                <i class='bx bxs-megaphone'></i>
                <span class="link_name">Announcements</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="AAannouncement.php">Announcements</a></li>
            </ul>
        </li>

        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-book-add'></i>
                    <span class="link_name">Borrowed</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Borrowed Books</a></li>
                <li><a href="current.php">Borrowed</a></li>
                <li><a href="returned.php">Returned</a></li>
            </ul>
        </li>

        <li>
            <a href="view_book.php">
                <i class='bx bx-book-alt'></i>
                <span class="link_name">Books</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">View Books</a></li>
            </ul>
        </li>

        <!-- <li>
            <a href="message.php">
            <i class='bx bx-chat'></i>
                <span class="link_name">Messages</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="message.php">Messages</a></li>
            </ul>
        </li> -->



        <!-- Profile -->
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <!-- <img src="../../img/user.png" alt="profileImg"> -->
                </div>
                <div class="user-type">
                    <div class="profile_name">Logout</div>
                    <!-- <div class="job">Student</div> -->
                </div>
                    <a href="logout.php"><i class='bx bx-log-out bx-tada-hover'></i></a>
            </div>
        </li>
    </ul>
</div>