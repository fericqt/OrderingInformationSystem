    <div class="topbar">
        <div><!-- Empty div for left alignment --></div>
        <div class="user-profile" onclick="toggleLogoutMenu()">
            <span>Welcome, !</span>
            <img src="../images/user-icon.png" alt="User Avatar"> <!-- Replace with user icon -->
            <div class="logout-menu" id="logoutMenu">
                <a type="button" id="btnProfile" data-toggle="modal" data-target="#viewProfileModal">Profile</a>
                <a href="../inc/logout.php">Logout</a>
            </div>
        </div>
    </div>

    <!-- View Profile Modal -->
    <div class="modal fade" id="viewProfileModal" tabindex="-1" role="dialog" aria-labelledby="viewProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewProfileModalLabel">Profile Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="viewProfileForm">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input disabled type="text" class="form-control" id="username" name="username" required>
                            <input hidden type="text" class="form-control" id="userid" name="userid" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>