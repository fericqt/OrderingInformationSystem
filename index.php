<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - Ordering Information System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/loginstyle.css">
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="https://3.bp.blogspot.com/-FOtYssjD7dQ/WIrHQuREMcI/AAAAAAAAALI/LgNcSUJAgEQAGa6QUqDMzMTDDmam4FezwCPcBGAYYCw/s1600/AB-Order%2BNow.jpg" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">Ordering Information System</h4>
                                    </div>

                                    <form method="post" id="login-form">
                                        <p>Please login to your account</p>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input name="username" type="text" id="username" class="form-control" placeholder="Enter your username here..." />
                                            <label class="form-label" for="form2Example11">Username</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password here..." />
                                            <label class="form-label" for="form2Example22">Password</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log
                                                in</button>
                                            <a class="text-muted" href="#!">Forgot password?</a>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <button onclick="showSignupForm()" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger">Create new</button>
                                        </div>

                                    </form>

                                    <form method="post" id="signup-form">
                                        <p>Please create your account here!</p>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input name="username" type="text" id="username" class="form-control" placeholder="Enter your username here..." />
                                            <label class="form-label" for="form2Example11">Username</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password here..." />
                                            <label class="form-label" for="form2Example22">Password</label>
                                        </div>
                                        <div class="form-group mb-4">
                                            <select id="userType" name="usertype" class="form-control">
                                                <option value="Admin">Admin</option>
                                                <option value="Client">Client</option>
                                                <option value="Chef">Chef</option>
                                            </select>
                                            <label for="userType" class="form-label">User Type</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Sign Up</button>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Already have an account?</p>
                                            <button onclick="showLoginForm()" type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger">login now!</button>
                                        </div>

                                    </form>


                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">We are more than just a Restaurant</h4>
                                    <p class="small mb-0">An Ordering Information System streamlines the process of placing and managing orders in a business environment. It enables users to easily browse and select items, submit orders, and track order status in real-time. By integrating inventory management and automated notifications, this system enhances efficiency, reduces errors, and improves customer satisfaction, ensuring that orders are processed swiftly and accurately.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include "inc/script.php" ?>
<script>
    function showSignupForm() {
        $('#signup-form').show();
        $('#login-form').hide();
    }

    function showLoginForm() {
        $('#signup-form').hide();
        $('#login-form').show();
    }
</script>
<script>
    $(document).ready(function() {
        //login
        $('#login-form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: 'db_function/checkCredentials.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response === '0') {
                        alert('Username or password is incorrect!');
                        $('#password').val('');
                    } else if (response === '1') {
                        window.location.href = 'main/Admin/';
                    } else if (response === '2') {
                        window.location.href = 'main/Client/';
                    } else if (response === '3') {
                        window.location.href = 'main/Chef/';
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                }
            });
        });
        //Signup
        $('#signup-form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: 'db_function/createAccount.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response === '0') {
                        alert('There was error during the creation of data. Please try again later!');
                    } else {
                        alert('Account created successfully! You may now login');
                        window.location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                }
            });
        });

    });
</script>

</html>