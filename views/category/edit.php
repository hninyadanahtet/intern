<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Edit</h2>
    <form action="http://localhost/mvc/category/update/" method="post">
        <?php foreach($data as $cat): ?>
        <input type="hidden" name="id" value="<?php echo $cat['id']; ?>">
        
            <label for="name">Category Name</label>
            <input type="text" name ="name" value="<?php echo $cat['name']; ?>"><br>
            <label for="cdate">Created_date</label>
            <input type="text" name ="cdate" value="<?php echo $cat['created_date']; ?>"><br>
            <label for="mdate">Modified_date</label>
            <input type="text" name ="mdate" value="<?php echo $cat['modified_date']; ?>"><br>
            <input type="submit" value="Update">
            <?php endforeach; ?>
    </form>
    <br>
    <a href="http://localhost/mvc/views/category/list/">Category List</a>
    
    
</body>
</html>