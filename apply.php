<?php
include_once "config.php";
?>
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

<div class="container mt-4">
    <div class="row">
        <div class="col-4 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Apply For New Admission</h3>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example3">Enter Your Name</label>
                            <input type="text" name="name" id="form3Example3" class="form-control" />
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example3">Contact Number</label>
                            <input type="tel" name="contact" id="form3Example3" class="form-control" />
                            </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example3">Email address</label>
                            <input type="email" name="email" id="form3Example3" class="form-control" />
                            </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example3">Gender</label>
                            <select name="gender" id="" class="form-select">
                                <option value="">Select</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">Other</option>
                            </select>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example4">Password</label>
                            <input type="password" name="password" id="form3Example4" class="form-control" />
                            
                        </div>
                        <div class="form-outline mb-2">
                            <label class="form-label" for="form3Example4">Address</label>
                            <textarea type="text" name="address" id="form3Example4" class="form-control"></textarea>                            
                        </div>

                        <!-- Submit button -->
                        <input type="submit" name="create" value="Create New Account" class="btn btn-primary btn-block w-100">

                        <!-- Register buttons -->
                        <div class="text-center">
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
                <?php
                    if(isset($_POST['create'])){
                        $data = [
                            'name' => $_POST['name'],
                            'contact' => $_POST['contact'],
                            'email' => $_POST['email'],
                            'gender' => $_POST['gender'],
                            'address' => $_POST['address'],
                            'password' => md5($_POST['password'])
                        ];
                        $run = insertData("students",$data); 
                        ($run)? redirect("index.php") : alert("Fail To Create");
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>