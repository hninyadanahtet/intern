<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>List</h2>
    <ul>
    <?php foreach($data as $cat): ?>
    <li>
    [ <a href="http://localhost/mvc/category/del/<?php echo $cat['id']; ?>">del</a> ]
    [ <a href="http://localhost/mvc/category/edit/<?php echo $cat['id']; ?>">edit</a> ]
    <strong><?php echo $cat['name']; ?></strong>
    </li>
    <?php endforeach; ?>
    </ul>
    <br>
    <a href="http://localhost/mvc/category/new/">New Category</a> 
</body>
</html>