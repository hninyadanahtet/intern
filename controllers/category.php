<?php
    switch($action) {
        case "":
        case "list":show_list();break;
        case "new": show_new();break;
        case "add": add_cat();break;
        case "del":rm_cat($id);break;
        case "edit":show_cat($id);break;
        case "update":edit_cat();break;
        default:
        exit("Unknown action -> $action");
    }
    function show_list() 
    {
        $cats = get_cats();
        render("list", $cats);
    }
    function show_new() 
    {
        render("new");
    }
    function add_cat() 
    {
        $name = $_POST['name'];
        $result = insert_cat($name);
        header("location: http://localhost/mvc/category/list/");
    }
    function rm_cat($id) 
    {
        $result = del_cat($id);
        header("location: http://localhost/mvc/category/list/");
    }
    function edit_cat()
    {
        $id=$_POST['id'];
        $name = $_POST['name'];
        $cdate = $_POST['cdate'];
        $result=update_cat($id,$name,$cdate);
        header("location: http://localhost/mvc/category/list/");
    }
    function show_cat($id)
    {
        $result = get_catById($id);
        render("edit",$result);
    }
?>
