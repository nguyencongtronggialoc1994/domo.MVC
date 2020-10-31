<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <a href="index.php?page=add" class="btn btn-success">Add</a>
    <table class="table">
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Image</th>
            <th colspan="2">Action</th>
        </tr>
        <?php if (empty($students)): ?>
        <tr>
            <td>No data</td>
        </tr>
        <?php else: ?>
        <?php foreach ($students as $key=>$student): ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $student->getName() ?></td>
            <td><?php echo $student->getAge() ?></td>
            <td><?php echo $student->getAddress() ?></td>
            <td><img style="height: 100px;width: 100px" src="<?php echo $student->getImage() ?>"></td>
            <td><a href="index.php?page=edit&id=<?php echo $student->getId() ?>" class="btn btn-success">Edit</a></td>
            <td><a href="index.php?page=delete&id=<?php echo $student->getId() ?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>