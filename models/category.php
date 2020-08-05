<?php
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "store");

    function get_cats() 
    {
        global $conn;
        $result = mysqli_query($conn, "SELECT * FROM categories");
        $cats = array();
        while($row = mysqli_fetch_assoc($result)) {
        $cats[] = $row;
        }
        return $cats;
    }
    function get_catById($id)
    {
        global $conn;
        $result = mysqli_query($conn,"SELECT * FROM categories WHERE id=$id;");
        $cats = array();
        while($row = mysqli_fetch_assoc($result)) {
        $cats[] = $row;
        }
        return $cats;
    }
    function insert_cat($name) 
    {
        global $conn;
        mysqli_query($conn, "INSERT INTO categories
        (name, created_date, modified_date)
        VALUES ('$name', now(), now())"
        );
        return mysqli_insert_id();
    }
    function del_cat($id) 
    {
        global $conn;
        mysqli_query($conn, "DELETE FROM categories WHERE id = $id");
        return mysqli_affected_rows();
    }
    function update_cat($id,$name,$cdate)
    {
        global $conn;
        mysqli_query($conn,"UPDATE categories SET name='$name',created_date='$cdate',
                            modified_date=now()
                    WHERE id=$id");
        return mysqli_affected_rows();
    }
?>

