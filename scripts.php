<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    

    function getTasks()
    {
        //CODE HERE
        //SQL SELECT
        echo "Fetch all tasks";
    }


    function saveTask()
    {
        include('database.php');
        //CODE HERE
        $Title       = $_POST["task-title"];
        $Type        = $_POST["task-type"];
        $Priority    = $_POST["task-priority"];
        $Status      = $_POST["task-status"];
        $Date        = $_POST["task-date"];
        $description = $_POST["task-description"];
        $sqlconn ="INSERT INTO `tasks` ( `title`, `task_datetime`, `description`, `type_id`, `priority_id`, `status_id`) VALUES ('$Title','$Date','$description','$Type','$Priority','$Status')";
        $res = mysqli_query($conn,$sqlconn);
        //SQL INSERT
        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
    }

    function updateTask()
    {
        //CODE HERE
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

?>