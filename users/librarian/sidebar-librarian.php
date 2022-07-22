<div class="sidebar close">
    <div class="logo-details">
        <i class='bx bxs-book'></i>
        <span class="logo_name"><img src="../../img/logowhite.png" alt=""></span>
    </div>

    <!-- search -->
    <div class="input-group md-3 " id="book-search">
        <form class="input-group md-3 " action="book_results.php" method="post">
            <input type="text" class="form-control" placeholder="Search Books" aria-describedby="button-addon2" name="item">
            <button name="search" class="btn btn-outline-secondary" id="button-addon2" ><i class='bx bx-search'></i></button>
        </form>
    </div>
    <ul class="nav-links">
        <li>
            <a href="dashboard.php">
                <i class='bx bxs-dashboard'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="dashboard.php">Dashboard</a></li>
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
                    <span class="link_name">Returns</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Returns</a></li>
                <li><a href="borrowed.php">Borrow Requests</a></li>
                <li><a href="current.php">Borrowed</a></li>
                <li><a href="return_request.php">Return Requests</a></li>
            </ul>
        </li>

        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-user-pin'></i>
                    <span class="link_name">Users</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Users</a></li>
                <li><a href="viewall-users.php">View All</a></li>
                <li><a href="add-users.php">Add Student</a></li>
                <li><a href="add-faculty.php">Add Faculty</a></li>
                <li><a href="approve-users.php">Approve user</a></li>
                <li><a href="AAdisabled_accounts.php">Disabled Accounts</a></li>
            </ul>
        </li>

        <li>
            <div class="iocn-link">
                <a href="#">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Books</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Books</a></li>
                <li><a href="view_book.php">View All</a></li>
                <li><a href="add_book.php">Add new</a></li>
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

        <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-book-add'></i>
                        <span class="link_name">My Schedule</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">My Schedule</a></li>
                    <li><a href="AAbookavisit1.php">Book a schedule</a></li>
                    <li><a href="AAaproved.php">Approved</a></li>
                    <li><a href="AAdenied.php">Denied</a></li>
                </ul>
            </li>
       
        <li>
            <a href="view_profile.php">
                <i class='bx bx-user'></i>
                <span class="link_name">Profile</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Home</a></li>
            </ul>
        </li>


        <!-- Profile -->
        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <!-- <img src="../../img/user.png" alt="profileImg"> -->
                </div>
                <div class="user-type">
                    <div class="profile_name">Logout</div>
                    <!-- <div class="job">Librarian</div> -->
                </div>
                <div class="cont-logout">
                    <a href="logout.php"><i class='bx bx-log-out bx-tada-hover'></i></a>
                </div>
                
                    
            </div>
        </li>

    </ul>
</div>