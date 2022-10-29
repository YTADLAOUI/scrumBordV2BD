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
            
             class='w-100 border-0 d-flex bg-white border-bottom '>
            <div class='col-1 mt-1'>
                <i class='bi bi-check-circle h4 text-green '></i> 
            </div>
                <div class='text-start  mt-1'>
                <div class='fw-bold'>".$row[1]."</div>
                <div class=''>
                    <div class=''> #$i created in ".$row[2]."</div>
                    <div class='' >".$row[3]."</div>
                </div>
                     <div class='h5'>
                         <span class='btn btn-sm btn-primary p-0 px-1 '>".$row[8]."</span>
                         <span class='btn btn-sm btn-light text-black p-0 px-1 '>".$row[9]."</span>
                        
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