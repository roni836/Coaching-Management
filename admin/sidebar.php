<div class="list-group">
    <a href="index.php" class="list-group-item list-group-items-action ">Dashboard</a>
    <a href="manage_students.php" class="list-group-item list-group-items-action">Manage Students <span class="float-end">(<?= countRecords('students',"status='1'");?>)</span></a>
    <a href="manage_admissions.php" class="list-group-item list-group-items-action">Manage Admissions<span class="float-end">(<?= countRecords('students',"status='0'");?>)</span></a>
    <a href="manage_course.php" class="list-group-item list-group-items-action">Manage Courses<span class="float-end">(<?= countRecords('courses');?>)</span></a>
    <a href="manage_category.php" class="list-group-item list-group-items-action">Manage Categories<span class="float-end">(<?= countRecords('categories');?>)</span></a>
</div>