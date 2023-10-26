<?php
include_once "../config.php";
checkAdmin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories - Admin Panel | E - Coach</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<?php
include_once "admin_header.php";
?>
<div class="bg-success px-3 py-3 d-flex justify-content-between">
    <h2 class="text-white">Admin / Manage Categories</h2>
    <a href="#ron" class="btn btn-light py-2" data-bs-toggle="modal">Insert New Category</a>
    <div class="modal fade" id="ron">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header fw-bold">Insert New Category</div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="cat_title">Title</label>
                            <input type="text" name="cat_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea rows="5" name="cat_description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="insert" value="Insert Category" class="btn btn-primary w-100">
                        </div>
                    </form>

                    <?php
                        if(isset($_POST['insert'])){
                            $data = [
                                'cat_title' => $_POST['cat_title'],
                                'cat_description' => $_POST['cat_description']
                            ];
                            if(insertData("categories",$data)){
                                redirect("manage_category.php");
                            }
                            else{
                                alert('failed');
                                redirect("manage_category.php");
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-3 bg">
            <?php
            include_once "sidebar.php";
            ?>
        </div>
        <div class="col-9">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $callingData = callingData("categories");
                        foreach($callingData as $value):
                    ?>
                        <tr>
                            <td><?=$value['cat_id'];?></td>
                            <td><?=$value['cat_title'];?></td>
                            <td><?=$value['cat_description'];?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="?cat_delete=<?=$value['cat_id'];?>" class="btn btn-danger">Delete</a>
                                    <a href="" class="btn btn-primary">Edit</a>
                                </div>
                            </td>
                        </tr>
                    <?php  endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>

<?php
if(isset($_GET['cat_delete'])){
    $id = $_GET['cat_delete'];

    if(deleteRecord('categories',"cat_id='$id'")){
        redirect("manage_category.php");
    }
    else{
        alert('Failed');
        redirect("manage_category.php");
    }
}
?>

