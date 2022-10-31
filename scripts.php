<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    
    $i =0;
    function getTasks($Var)
    {
        include('database.php');
        //CODE HERE
        // $QUERY="SELECT * FROM  `tasks` WHERE tasks.status_id =$Var" ;
        $QUERY = "SELECT t.*,st.name,tp.name,pt.name FROM tasks t,statues st,types tp,priorities pt WHERE st.id = t.status_id AND tp.id = t.type_id AND pt.id = t.priority_id AND t.status_id = $Var 
         ORDER BY id ASC";
        $res = mysqli_query($conn,$QUERY);      
            global $i;
        while($row =mysqli_fetch_row($res)){
           // var_dump($row);
           $i++;
            echo  "
            <button  
            onclick=editTask({$row[0]})
            data-bs-toggle='modal' data-bs-target='#modal-task'
             class='w-100 border-0 d-flex bg-white border-bottom 'id ='test'>
            <div class='col-1 mt-1'>
                <i class='bi bi-check-circle h4 text-green '></i> 
            </div>                                         
                <div class='text-start  mt-1'>
                <div class='fw-bold' data-title ='".$row[1]."' id ='{$row[0]}title'>{$row[1]}</div>
                <div class=''>
                    <div data-date='".$row[2]."' id ='{$row[0]}date' class=''> #$i created in ".$row[2]."</div>
                    <div class='' data-description='".$row[3]."' id='{$row[0]}description' >".$row[3]."</div>
                </div>
                     <div class='h5'>
                         <span class='btn btn-sm btn-primary p-0 px-1 ' data-type={$row[4]} id ='{$row[0]}type'>".$row[8]."</span>
                         <span class='btn btn-sm btn-light text-black p-0 px-1' data-status='$row[6]' data-priority='$row[5]' id='{$row[0]}priority'>".$row[9]."</span>
                        
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
        include('database.php');
        //CODE HERE
        $hid=$_POST["task_id"] ;
        $Title       = $_POST["task-title"];
        $Type        = $_POST["task-type"];
        $Priority    = $_POST["task-priority"];
        $Status      = $_POST["task-status"];
        $Date        = $_POST["task-date"];
        $description = $_POST["task-description"];
       $upd =" UPDATE `tasks` SET `title`='$Title',`task_datetime`='$Date',`description`='$description',`type_id`='$Type',`priority_id`='$Priority',`status_id`='$Status' WHERE id=$hid";
        //SQL UPDATE
        mysqli_query($conn,$upd);
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
<!-- <script src="scripts.js"></script> -->