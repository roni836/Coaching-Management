<?php
include_once "../config.php";
checkAdmin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses - Admin Panel | E - Coach</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<?php
include_once "admin_header.php";
?>
<div class="bg-success px-3 py-3 d-flex justify-content-between">
    <h2 class="text-white">Admin / Manage Courses</h2>
    <a href="#ron" class="btn btn-light py-2" data-bs-toggle="modal">Insert New Course</a>
    <div class="modal fade" id="ron">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header fw-bold">Insert New Course</div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart form-data">
                        <div class="row">
                        <div class="mb-3 col">
                            <label for="title">Course Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="mb-3 col">
                            <label for="language">Language</label>
                            <input type="text" name="language" class="form-control">
                        </div>
                        </div>
                        <div class="row">
                        <div class="mb-3 col">
                            <label for="price">Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <div class="mb-3 col">
                            <label for="discount_price">Discount Price</label>
                            <input type="text" name="discount_price" class="form-control">
                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="instructor">Instructor</label>
                            <input type="text" name="instructor" class="form-control">
                        </div>
                        <div class="row">
                        <div class="mb-3 col">
                            <label for="image">Cover Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3 col">
                            <label for="category_id">category_id</label>
                            <select name="category_id" class="form-select">
                                <option value="">Select Category</option>
                                <?php
                                $callingCat = callingData("categories");
                                foreach ($callingCat as $cat):
                                    $id = $cat['cat_id'];
                                    $title = $cat['cat_title'];
                                    echo "<option value='$id'>$title</option>";
                                endforeach;
                                ?>
                            </select>
                        </div>
                        </div>

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea rows="3" name="description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="insert_course" value="Insert Course" class="btn btn-primary w-100">
                        </div>
                    </form>

                    <?php
                        if(isset($_POST['insert_course'])){
                            // image
                            $image = $_FILES['image']['name'];
                            $tmp_image = $_FILES['image']['tmp_name'];

                            move_uploaded_file($tmp_image,"images/$image");

                            $data = [
                                'title' => $_POST['title'],
                                'language' => $_POST['language'],
                                'price' => $_POST['price'],
                                'discount_price' => $_POST['discount_price'],
                                'instructor' => $_POST['instructor'],
                                'category_id' => $_POST['category_id'],
                                // 'image' => $image,
                                'description' => $_POST['description']
                            ];
                            if(insertData("courses",$data)){
                                redirect("manage_course.php");
                            }
                            else{
                                alert('failed');
                                redirect("manage_course.php");
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
                        <th>Id</th>
                        <th>Title</th>
                        <th>Language</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Instructor</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $callingData = callingData("courses JOIN categories on courses.category_id= categories.cat_id");
                        foreach($callingData as $value):
                    ?>
                        <tr>
                            <td><?=$value['course_id'];?></td>
                            <td><?=$value['title'];?></td>
                            <td><?=$value['language'];?></td>
                            <td><?=$value['category_id'];?></td>
                            <td>Rs.<?=$value['discount_price'];?> <del><?=$value['price'];?></del></td>
                            <td><?=$value['instructor'];?></td>
                            <td>
                                <!-- <img width="50" height="auto" src="images/<?=$value['image'];?>"> -->
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="?course_delete=<?=$value['course_id'];?>" class="btn btn-danger">Delete</a>
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
if(isset($_GET['course_delete'])){
    $id = $_GET['course_delete'];

    if(deleteRecord('courses',"course_id='$id'")){
        redirect("manage_course.php");
    }
    else{
        alert('Failed');
        redirect("manage_course.php");
    }
}
?>