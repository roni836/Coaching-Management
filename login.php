<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E - Coach | Application For Coaching</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<?php
include_once "include/header.php";
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-4 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Login Here</h3>
                </div>
                <div class="card-body">
            <form>
                <!-- Email input -->
                <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Email address</label>
                    <input type="email" id="form2Example1" class="form-control" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                    <input type="password" id="form2Example2" class="form-control" />
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">

                    <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <a type="submit" class="btn btn-primary btn-block mb-4 w-100">Sign in</a>

                <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="#!">Register</a></p>
                        <p>or sign up with:</p>
                        <button type="button" class="btn btn-secondary btn-floating mx-1">
                        <i class="bi bi-facebook"></i>
                        </button>

                        <button type="button" class="btn btn-secondary btn-floating mx-1">
                        <i class="bi bi-google"></i>
                        </button>

                        <button type="button" class="btn btn-secondary btn-floating mx-1">
                        <i class="bi bi-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-secondary btn-floating mx-1">
                        <i class="bi bi-github"></i>
                        </button>
                    </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>