// test = document.getElementById('test');
// test.addEventListener('click', affiche);





// function affiche() {


    
// }
let Title=document.getElementById('task_title');
let priority=document.getElementById('task_priority');
let statu= document.getElementById('task_status');
let date = document.getElementById('task_date');
let description =document.getElementById('task_description');

function editTask(id) { 
    document.getElementById("task-id").value = id;
    console.log(id)
    Title.value = document.getElementById(id+"title").getAttribute("data-title");
    date.value = document.getElementById(id+"date").getAttribute("data-date");
    description.value = document.getElementById(id+"description").getAttribute("data-description");
    if (document.getElementById(id+"type").getAttribute("data-type")== 1){
        document.querySelector('#task-type-feature').checked = true;
}else{
   document.querySelector('#task-type-bug').checked = true;
}

   priority.value= document.getElementById(id+'priority').getAttribute("data-priority");
   statu.value= document.getElementById(id+'priority').getAttribute('data-status');
    
}


