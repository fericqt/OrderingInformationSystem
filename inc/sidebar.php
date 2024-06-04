    <div class="sidebar gradient-custom-2">
        <footer>
            <img src="https://3.bp.blogspot.com/-FOtYssjD7dQ/WIrHQuREMcI/AAAAAAAAALI/LgNcSUJAgEQAGa6QUqDMzMTDDmam4FezwCPcBGAYYCw/s1600/AB-Order%2BNow.jpg" alt="User Icon" class="user-icon">
        </footer>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" type="button" onclick="gotoDashboard()"><i class='bx bx-home-alt nav_icon'></i> Dashboard</a></li>
            <li id="sideOrders" class="nav-item"><a class="nav-link" type="button" onclick="gotoOrder()"><i class='bx bx-grid-alt nav_icon'></i> Order Management</a></li>
            <li id="sideItems" class="nav-item"><a class="nav-link" type="button" onclick="gotoItem()"><i class='bx bx-user nav_icon'></i> Item Management</a></li>
            <li id="sideUsers" class="nav-item"><a class="nav-link" type="button" onclick="gotoUser()"><i class='bx bx-user nav_icon'></i> User Management</a></li>
            <li class="nav-item"><a class="nav-link" type="button" href="../../inc/logout.php"><i class='bx bx-log-out nav_icon'></i> Logout</a></li>
        </ul>
    </div>
    <span hidden id="userType" data-value="<?php session_start();
                                            echo $_SESSION["userType"]
                                            ?>"></span>
    <script>
        var utype = document.getElementById("userType").getAttribute("data-value");

        function gotoDashboard() {
            if (utype === 'Admin') {
                window.location.href = '../Admin/';
            } else if (utype === 'Client') {
                window.location.href = '../Client/';
            } else if (utype === 'Chef') {
                window.location.href = '../Chef/';
            }

        }

        function gotoOrder() {
            if (utype === 'Admin') {
                window.location.href = '../Admin/order.php';
            } else if (utype === 'Client') {
                window.location.href = '../Client/order.php';
            } else if (utype === 'Chef') {
                window.location.href = '../Chef/order.php';
            }
        }

        function gotoItem() {
            if (utype === 'Admin') {
                window.location.href = '../Admin/items.php';
            } else if (utype === 'Client') {
                window.location.href = '../Client/items.php';
            } else if (utype === 'Chef') {
                window.location.href = '../Chef/items.php';
            }
        }

        function gotoUser() {
            if (utype === 'Admin') {
                window.location.href = '../Admin/users.php';
            } else if (utype === 'Client') {
                window.location.href = '../Client/users.php';
            } else if (utype === 'Chef') {
                window.location.href = '../Chef/users.php';
            }
        }

        if (utype === 'Admin') {
            document.getElementById('sideOrders').style.display = 'none';
        } else if (utype === 'Client') {
            document.getElementById('sideItems').style.display = 'none';
            document.getElementById('sideUsers').style.display = 'none';
        } else if (utype === 'Chef') {
            document.getElementById('sideItems').style.display = 'none';
            document.getElementById('sideUsers').style.display = 'none';
        }
    </script>