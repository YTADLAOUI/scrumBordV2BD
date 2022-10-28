<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    

    function getTasks($Var)
    {
        include('database.php');
        //CODE HERE
        $QUERY="SELECT * FROM  `tasks` WHERE tasks.status_id =$Var" ;
        $res = mysqli_query($conn,$QUERY);

        while($row =mysqli_fetch_assoc($res)){
            echo  "
            <button 
            
             class='w-100 border-0 d-flex bg-white border-bottom '>
            <div class='col-1 mt-1'>
                <i class='bi bi-check-circle h4 text-green '></i> 
            </div>
                <div class='text-start  mt-1'>
                <div class='fw-bold'>".$row['title']."</div>
                <div class=''>
                    <div class=''>{i+1} created in ".$row['']."</div>
                    <div class='' >{tasks[i].description} </div>
                </div>
                     <div class='h5'>
                         <span class='btn btn-sm btn-primary p-0 px-1 '>{tasks[i].priority}</span>
                         <span class='btn btn-sm btn-light text-black p-0 px-1 '>{tasks[i].type}</span>
                        
                    </div>
               </div>
            </button>
            ";
                             
        }

        //SQL SELECT
        //echo "Fetch all tasks";
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
        mysqli_query($conn,$sqlconn);
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