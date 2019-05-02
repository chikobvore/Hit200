  <?php
function assessments($Department)
{
   require '../dbh/dbh.php';
   $sql = "SELECT Assessment_id,Level,Department,Year,Assessment_title FROM assessment_details where Status = 'current' AND Department = '$Department'";

   $result = mysqli_query($Conn,$sql);
   $confirm = mysqli_num_rows($result);
   if ($confirm > 0) {
     if ($confirm < 2) {
       while ($rows = mysqli_fetch_assoc($result)){
        $id = $rows['Assessment_id'];
        $Stage = $rows['Assessment_title'];
        $Level = $rows['Level'];
         $sql = "SELECT Item,Item_mark,Item_id FROM Assessment_items WHERE Assessment_id = $id";
         $result = mysqli_query($Conn,$sql);
         $confirm = mysqli_num_rows($result);

         if ($confirm > 0)
          echo "<div class='row'>".
                      "<div class='col-lg-12'>".
                        "<header class='panel-heading'>".
                        "<label class='control-label'>"."Level: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."</label>"."<p style='display: inline;'>".$Level."</p>"."<br>"
                        ."<label>"."Assessment: "."<input type='text' name='Stage' readonly='' placeholder='$Stage' style='border: none;  background-color: inherit;' value = '$id'>".$Stage."<br>".
                        "<label>"."Department: "."</label>"."<p style='display: inline;'>".$rows['Department']."</p>"."<br>".
                        "<label>"."Period: "."</label>"."<p style='display: inline;'>".$rows['Year']."</p>"."<br>"."<br>".
                      "</header>".
                      "</div>".
                    "</div>".
                    "<hr>";
          project($Level,$Department);
          echo "<table class='table table-hover'>".
                "<tbody>".
                  "<tr class='row'>".
                    "<th class='col-lg-3'>"."Item"."</th>".
                    "<th class='col-lg-3'>"."Mark"."</th>".
                    "<th class='col-lg-3'>"."Out of"."</th>".
                    "<th class='col-lg-3'>"."comment"."</th>".
                  "</tr>";
          {
            $i = 0;
           while ($row = mysqli_fetch_assoc($result)) {
            $name = 'mark'.$i;
            $select = 'option'.$i;
            $number = $row['Item_mark'];
            $Item_id = $row['Item_id'];
            $item = 'item'.$i;
            echo 
                  "<tr class='row'>".
                    "<td class='col-lg-3'>".$row['Item']."</td>".
                    "<td class='col-lg-3'>"."<input type='number' name = $name class='form-control' max = $number required = ''>"."</td>".
                    "<td class='col-lg-3'>"."</label>"."<input type='number' name= '$item' readonly='' placeholder='$number' style='border: none;  background-color: inherit; visibility: Hidden;' value = $Item_id >".$number."</label>"."</td>".

                    //"<label class='control-label' name = 'Item_id'>".$row['Item_mark']."</label>"."</td>".
                    "<td class='col-lg-3'>".
                     "<input type = 'text' name = '$select' class = 'form-control' required = ''>".
                    "</td>".
                  "</tr>";
              $i = $i +1;
           }
           echo "</tbody>".
              "</table>"."<div class='form-group'>".
                        "<hr>".
                        "<label>"."<h3>"."Overall comment"."</h3>"."</label>".
                        "<textarea class='form-control' name='comment' required=''>".
                          
                        "</textarea>".
                        "<br>".
                        "<center>".
                        "<div>".
                          "<button type='reset' class='btn btn-primary'>"."Prev"."</button>".
                          "<button type='submit'class='btn btn-success'>"."Submit"."</button>".
                          "<button type='reset' class='btn btn-default'>"."Next"."</button>".
                        "</div>".
                      "</center>".
                      "</div>";
         }
       }    
     }
   }else
   {
   echo "<div class='row'>".
            "<div class='col-lg-12'>".
              "<center>".
              "<h3 class='page-header'>"."You have no Scheduled Presentation Today"."</h3>".
            "<p>"."You will be automatically redirected to to presentation once set"."</p>".
          "</center>".
            "</div>".
            "</div>";
  }
}
function project($level,$Department)
{
   require '../dbh/dbh.php';
   $sql = "SELECT DISTINCT Project_title,Project_id FROM projects WHERE Level = '$level' AND Department = '$Department'";
   $result = mysqli_query($Conn,$sql);
   $confirm = mysqli_num_rows($result);
   if ($confirm >0 ) {
    echo "<div class='row'>".
                      "<div class='col-lg-12'>".
                        "<section class='panel'>".
                          "<header class='panel-heading'>"."<label class='control-label'>"."Select Project"."</label>".
                           "<form action = 'Assessment.php' method = 'POST'>".
                            "<select class='form-control' name='Project_id' required = ''>";
    while ($row = mysqli_fetch_assoc($result)){
      $id = $row['Project_id'];
    echo "<option value = $id>".
                  "<h3>".$row['Project_title']."</h3>".
                      "</option>";
   }
   echo "</select>".
                  "<br>".
                    "</header>".
                          "<br>";
}
else
{
  echo "<div class='row'>".
                      "<div class='col-lg-12'>".
                        "<section class='panel'>".
                          "<header class='panel-heading'>".
                          "<h4>"."No projects found to assess"."<br>"."Please add projects"."</h4>".
                           "<br>" . $Conn->error.
                           "<br>".
                          "</header>".
                          "<br>";
}
}
function Sidebar($role)
{
	/* This function is responsible for dynamic side bar displaying of all pages. 
	*/

	if ($role == 'co-ordinator') {

    echo "<ul class='app-menu'>".
        "<li>"."<a class='app-menu__item active' href='department.php'>"."<i class='app-menu__icon fa fa-dashboard'>"."</i>"."<span class='app-menu__label'>"."Home"."</span>"."</a>"."</li>".
       "<li class='treeview'>"."<a class='app-menu__item' href='#'' data-toggle='treeview'>"."<i class='app-menu__icon fa fa-edit'>"."</i>"."<span class='app-menu__label'>"."New"."</span>"."<i class='treeview-indicator fa fa-angle-right'>"."</i>"."</a>".

          "<ul class='treeview-menu'>".
            "<li>"."<a class='treeview-item' href='addsupervisor.php' >"."<i class='icon fa fa-users'>"."</i>"."Supervisor"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='weights.php' >"."<i class='icon fa fa-users'>"."</i>"."Assesment weight"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='#myModal5' data-toggle='modal'>"."<i class='icon fa fa-user'>"."</i>"."Assessment"."</a>"."</li>".
          "</ul>".
        "</li>".
       
        "<li>"."<a class='app-menu__item' href='Guest.html'>"."<i class='app-menu__icon fa fa-user'>"."</i>"."<span class='app-menu__label'>"."Guest"."</span>"."</a>"."</li>".
         "<li>"."<a class='app-menu__item' href='Assessment_projects.php''>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."<span class='app-menu__label'>"."Assess projects"."</span>"."</a>"."</li>".
        "<li class='treeview'>"."<a class='app-menu__item' href='#'' data-toggle='treeview'>"."<i class='app-menu__icon fa fa-edit'>"."</i>"."<span class='app-menu__label'>"."Projects"."</span>"."<i class='treeview-indicator fa fa-angle-right'>"."</i>"."</a>".

          "<ul class='treeview-menu'>".
            "<li>"."<a class='treeview-item' href='projects.php''>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."Hit200"."</a>"."</li>"."<li>"."<a class='treeview-item' href='projects.php''>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."Hit400"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='projects.php''>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."Assessment Weights"."</a>"."</li>".
          "</ul>".
        "</li>".
        "<li class='treeview'>"."<a class='app-menu__item' href='#'' data-toggle='treeview'>"."<i class='app-menu__icon fa fa-th-list'>"."</i>"."<span class='app-menu__label'>"."View"."</span>"."<i class='treeview-indicator fa fa-angle-right'>"."</i>"."</a>".
          "<ul class='treeview-menu'>".
            "<li>"."<a class='treeview-item' href='students.php'>"."<i class='icon fa fa-circle-o'>"."</i>"."Students"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='lectures.php''>"."<i class='icon fa fa-circle-o'>"."</i>"."Staff"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='marks.php''>"."<i class='icon fa fa-circle-o'>"."</i>"."Marks"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='view_weights.php''>"."<i class='icon fa fa-circle-o'>"."</i>"."Weights"."</a>"."</li>".
          "</ul>".
        "</li>".
        "<li class='treeview'><a class='app-menu__item' href='#' data-toggle='treeview'>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."<span class='app-menu__label'>"."More"."</span>"."<i class='treeview-indicator fa fa-angle-right'>"."</i>"."</a>".
          "<ul class='treeview-menu'>".
            "<li>"."<a class='treeview-item' href='blank-page.html'>"."<i class='icon fa fa-circle-o'>"."</i>"."Generate Report"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='page-login.html'>"."<i class='icon fa fa-circle-o'>"."</i>"."Login Page"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='page-calendar.html'>"."<i class='icon fa fa-circle-o'>"."</i>"." Calendar Page"."</a>"."</li>".
            ".<li>"."<a class='treeview-item' href='page-mailbox.html'>"."<i class='icon fa fa-circle-o'>"."</i>"." Mailbox"."</a>"."</li>".
            
          "</ul>".
        "</li>".
      "</ul>";
	}
  if ($role == 'student') {
        echo "<ul class='app-menu'>".
        "<li>"."<a class='app-menu__item active' href='student_portal.php'>"."<i class='app-menu__icon fa fa-dashboard'>"."</i>"."<span class='app-menu__label'>"."Home"."</span>"."</a>"."</li>".
       
        "<li class='treeview'>"."<a class='app-menu__item' href='#'' data-toggle='treeview'>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."<span class='app-menu__label'>"."Propose Project"."</span>"."<i class='treeview-indicator fa fa-angle-right'>"."</i>"."</a>".
          "<ul class='treeview-menu'>".
            "<li>"."<a class='treeview-item' data-toggle='modal' href='#mod9'>"."<i class='icon fa fa-circle-o'>"."</i>"."New Project"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='page-login.html'>"."<i class='icon fa fa-circle-o'>"."</i>"."Enter a Group"."</a>"."</li>".
          "</ul>".
        "</li>".
    
         "<li>"."<a class='app-menu__item' href='mysupervisor.php'>"."<i class='app-menu__icon fa fa-user'>"."</i>"."<span class='app-menu__label'>"."Supervisor"."</span>"."</a>"."</li>".
        "<li>"."<a class='app-menu__item' href='projects.php'>"."<i class='app-menu__icon fa fa-edit'>"."</i>"."<span class='app-menu__label'>"."View Projects"."</span>"."</a>"."</li>".
        "<li>"."<a class='app-menu__item' href='#'>"."<i class='app-menu__icon fa fa-calendar'>"."</i>"."<span class='app-menu__label'>"."School calender"."</span>"."</a>"."</li>".
        "<li>"."<a class='app-menu__item' href='#'>"."<i class='app-menu__icon fa fa-edit'>"."</i>"."<span class='app-menu__label'>"."Results Profile"."</span>"."</a>"."</li>".

        "<li class='treeview'><a class='app-menu__item' href='#' data-toggle='treeview'>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."<span class='app-menu__label'>"."More"."</span>"."<i class='treeview-indicator fa fa-angle-right'>"."</i>"."</a>".
          "<ul class='treeview-menu'>".
            "<li>"."<a class='treeview-item' href='blank-page.html'>"."<i class='icon fa fa-circle-o'>"."</i>"."Blank Page"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='page-login.html'>"."<i class='icon fa fa-circle-o'>"."</i>"."Login Page"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='page-calendar.html'>"."<i class='icon fa fa-circle-o'>"."</i>"." Calendar Page"."</a>"."</li>".
            ".<li>"."<a class='treeview-item' href='page-mailbox.html'>"."<i class='icon fa fa-circle-o'>"."</i>"." Mailbox"."</a>"."</li>".
            
          "</ul>".
        "</li>".
      "</ul>";
  }
  if ($role == 'Supervisor') {

    echo "<ul class='app-menu'>".
        "<li>"."<a class='app-menu__item active' href='department.php'>"."<i class='app-menu__icon fa fa-dashboard'>"."</i>"."<span class='app-menu__label'>"."Home"."</span>"."</a>"."</li>".
       "<li class='treeview'>"."<a class='app-menu__item' href='#'' data-toggle='treeview'>"."<i class='app-menu__icon fa fa-edit'>"."</i>"."<span class='app-menu__label'>"."New"."</span>"."<i class='treeview-indicator fa fa-angle-right'>"."</i>"."</a>".

          "<ul class='treeview-menu'>".
            "<li>"."<a class='treeview-item' href='#student_modal' data-toggle='modal'>"."<i class='icon fa fa-users'>"."</i>"."Supervisor"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='#lecture_modal' data-toggle='modal'>"."<i class='icon fa fa-user'>"."</i>"."Group"."</a>"."</li>".
          "</ul>".
        "</li>".
       
        "<li>"."<a class='app-menu__item' href='mysupervisor.php'>"."<i class='app-menu__icon fa fa-users'>"."</i>"."<span class='app-menu__label'>"."Students"."</span>"."</a>"."</li>".
         "<li>"."<a class='app-menu__item' href='Assessment_projects.php''>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."<span class='app-menu__label'>"."Assess projects"."</span>"."</a>"."</li>".
        "<li class='treeview'>"."<a class='app-menu__item' href='#'' data-toggle='treeview'>"."<i class='app-menu__icon fa fa-edit'>"."</i>"."<span class='app-menu__label'>"."Projects"."</span>"."<i class='treeview-indicator fa fa-angle-right'>"."</i>"."</a>".

          "<ul class='treeview-menu'>".
            "<li>"."<a class='treeview-item' href='projects.php''>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."Hit200"."</a>"."</li>"."<li>"."<a class='treeview-item' href='projects.php''>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."Hit400"."</a>"."</li>".
          "</ul>".
        "</li>".
        "<li class='treeview'>"."<a class='app-menu__item' href='#'' data-toggle='treeview'>"."<i class='app-menu__icon fa fa-th-list'>"."</i>"."<span class='app-menu__label'>"."View"."</span>"."<i class='treeview-indicator fa fa-angle-right'>"."</i>"."</a>".
          "<ul class='treeview-menu'>".
            "<li>"."<a class='treeview-item' href='students.php'>"."<i class='icon fa fa-circle-o'>"."</i>"."Students"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='lectures.php''>"."<i class='icon fa fa-circle-o'>"."</i>"."Staff"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='sessions.php''>"."<i class='icon fa fa-circle-o'>"."</i>"."Marks"."</a>"."</li>".
          "</ul>".
        "</li>".
        "<li class='treeview'><a class='app-menu__item' href='#' data-toggle='treeview'>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."<span class='app-menu__label'>"."More"."</span>"."<i class='treeview-indicator fa fa-angle-right'>"."</i>"."</a>".
          "<ul class='treeview-menu'>".
            "<li>"."<a class='treeview-item' href='blank-page.html'>"."<i class='icon fa fa-circle-o'>"."</i>"."Blank Page"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='page-login.html'>"."<i class='icon fa fa-circle-o'>"."</i>"."Login Page"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='page-calendar.html'>"."<i class='icon fa fa-circle-o'>"."</i>"." Calendar Page"."</a>"."</li>".
            ".<li>"."<a class='treeview-item' href='page-mailbox.html'>"."<i class='icon fa fa-circle-o'>"."</i>"." Mailbox"."</a>"."</li>".
            
          "</ul>".
        "</li>".
      "</ul>";
  }
  if ($role == 'Chairperson') {

    echo "<ul class='app-menu'>".
        "<li>"."<a class='app-menu__item active' href='Supervisor.php'>"."<i class='app-menu__icon fa fa-dashboard'>"."</i>"."<span class='app-menu__label'>"."Home"."</span>"."</a>"."</li>".
       "<li class='treeview'>"."<a class='app-menu__item' href='#'' data-toggle='treeview'>"."<i class='app-menu__icon fa fa-edit'>"."</i>"."<span class='app-menu__label'>"."New"."</span>"."<i class='treeview-indicator fa fa-angle-right'>"."</i>"."</a>".

          "<ul class='treeview-menu'>".
            "<li>"."<a class='treeview-item' href='#student_modal' data-toggle='modal'>"."<i class='icon fa fa-users'>"."</i>"."Supervisor"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='#lecture_modal' data-toggle='modal'>"."<i class='icon fa fa-user'>"."</i>"."Group"."</a>"."</li>".
          "</ul>".
        "</li>".
       
        "<li>"."<a class='app-menu__item' href='#'>"."<i class='app-menu__icon fa fa-users'>"."</i>"."<span class='app-menu__label'>"."Profile"."</span>"."</a>"."</li>".
         "<li>"."<a class='app-menu__item' href='Assessment_projects.php''>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."<span class='app-menu__label'>"."Assess projects"."</span>"."</a>"."</li>".
        "<li class='treeview'>"."<a class='app-menu__item' href='#'' data-toggle='treeview'>"."<i class='app-menu__icon fa fa-edit'>"."</i>"."<span class='app-menu__label'>"."Projects"."</span>"."<i class='treeview-indicator fa fa-angle-right'>"."</i>"."</a>".

          "<ul class='treeview-menu'>".
            "<li>"."<a class='treeview-item' href='projects.php''>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."Hit200"."</a>"."</li>"."<li>"."<a class='treeview-item' href='projects.php''>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."Hit400"."</a>"."</li>".
          "</ul>".
        "</li>".
        "<li class='treeview'>"."<a class='app-menu__item' href='#'' data-toggle='treeview'>"."<i class='app-menu__icon fa fa-th-list'>"."</i>"."<span class='app-menu__label'>"."View"."</span>"."<i class='treeview-indicator fa fa-angle-right'>"."</i>"."</a>".
          "<ul class='treeview-menu'>".
            "<li>"."<a class='treeview-item' href='students.php'>"."<i class='icon fa fa-circle-o'>"."</i>"."Students"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='lectures.php''>"."<i class='icon fa fa-circle-o'>"."</i>"."Staff"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='marks.php''>"."<i class='icon fa fa-circle-o'>"."</i>"."Marks"."</a>"."</li>".
          "</ul>".
        "</li>".
        "<li class='treeview'><a class='app-menu__item' href='#' data-toggle='treeview'>"."<i class='app-menu__icon fa fa-file-text'>"."</i>"."<span class='app-menu__label'>"."More"."</span>"."<i class='treeview-indicator fa fa-angle-right'>"."</i>"."</a>".
          "<ul class='treeview-menu'>".
            "<li>"."<a class='treeview-item' href='blank-page.html'>"."<i class='icon fa fa-circle-o'>"."</i>"."Blank Page"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='page-login.html'>"."<i class='icon fa fa-circle-o'>"."</i>"."Login Page"."</a>"."</li>".
            "<li>"."<a class='treeview-item' href='page-calendar.html'>"."<i class='icon fa fa-circle-o'>"."</i>"." Calendar Page"."</a>"."</li>".
            ".<li>"."<a class='treeview-item' href='page-mailbox.html'>"."<i class='icon fa fa-circle-o'>"."</i>"." Mailbox"."</a>"."</li>".
            
          "</ul>".
        "</li>".
      "</ul>";
  }
}
function assessment_details($Department)
{
    require '../dbh/dbh.php';
   $sql = "SELECT Assessment_id,Status, Assessment_title,Level,Year,Proposed_date,Assessment_objectives FROM assessment_details WHERE Department = '$Department'";
   $result = mysqli_query($Conn,$sql);
  $confirm = mysqli_num_rows($result);
   if ($confirm >0 )
   {
    echo "<div class='row'>".
            "<div class='col-md-12'>".
              "<div class='tile'>".
                "<div class='tile-body'>".
                  "<table class='table table-hover table-bordered' id='sampleTable'>".
                    "<thead>".
                        "<tr>".
                          "<th>"."Title"."</th>".
                          "<th>"."Level"."</th>".
                          "<th>"."Year"."</th>".
                          "<th>"."Description"."</th>".
                          "<th>"."Proposed date"."</th>".
                          "<th>"."Status"."</th>".
                          "<th>"."Items"."</th>".
                          "<th>"."Action"."</th>".
                        "<tr>".
                      "</thead>".
                      "<tbody>";
        while ($row = mysqli_fetch_assoc($result))
        {
          $id = $row['Assessment_id'];
         echo "<tr>".
                "<td>".$row['Assessment_title']."</td>".
                "<td>".$row['Level']."</td>".
                "<td>".$row['Year']."</td>".
                "<td>".$row['Assessment_objectives']."</td>".
                "<td>".$row['Proposed_date']."</td>".
                "<td>".$row['Status']."</td>";
                items($row['Assessment_id']);
                
         echo  "<td>"."Click to edit"."</td>".  
              "</tr>";
        }
            echo "</tbody>".
                "</table>".
               "</div>".
              "</div>".
            "</div>".
          "</div>";
   }
}
function items($id)
{
  require '../dbh/dbh.php';
   $sql = "SELECT item FROM Assessment_items WHERE Assessment_id = $id";
   $result = mysqli_query($Conn,$sql);
   $confirm = mysqli_num_rows($result);
   if ($confirm >0 )
   {    
    echo "<td>";
        while ($row = mysqli_fetch_assoc($result))
        {
            echo $row['item']." ,";
        }
        echo "</td>";
    }
    else{
      echo "<td>"."No items set"."</td>";
    }
}
function projects($Department)
{
   require '../dbh/dbh.php';
   $sql = "SELECT Tools,Year,Level,Project_title,Project_description,Department,Supervisor,Stage,Field FROM Projects WHERE Department = '$Department'";
   $result = mysqli_query($Conn,$sql);
   $confirm = mysqli_num_rows($result);
   if ($confirm >0 )
   {
    echo "<div class='col-md-12'>".
                    "<div class='tile'>".
                      "<div class='tile-body'>".
                        "<table class='table table-hover table-bordered' id='sampleTable'>".
                          "<thead>".
                                "<tr>".
                                  "<th>"."Title"."</th>".
                                  "<th>"."Description"."</th>".
                                  "<th>"."Year"."</th>".
                                  "<th>"."Level"."</th>".
                                  "<th>"."Field of Study"."</th>".
                                  "<th>"."Supervisor"."</th>".
                                  "<th>"."Status"."</th>".
                                  "<th>"."Tools"."</th>".
                                "</tr>".
                          "</thead>".
                          "<tbody>";
        while ($row = mysqli_fetch_assoc($result))
        {
          $Staff_id = $row['Supervisor'];
          $sql1 = "SELECT Name,Surname FROM lecturers WHERE Staff_id = '$Staff_id'";
          $result1 = mysqli_query($Conn,$sql1);
          $confirm1 = mysqli_num_rows($result1);
          if ($confirm1 >0 )
              {
                while ($row1 = mysqli_fetch_assoc($result1))
                {
                  $Supervisor = $row1['Name']." ".$row1['Surname'];
                }
              }
              else{
                $Supervisor = "Not assigned";
              }
              echo "<tr>".
                    "<td>".$row['Project_title']."</td>".
                    "<td>".$row['Project_description']."</td>".
                    "<td>".$row['Year']."</td>".
                    "<td>".$row['Level']."</td>".
                    "<td>".$row['Field']."</td>".
                    "<td>".$Supervisor."</td>".
                    "<td>".$row['Stage']."</td>".
                    "<td>".$row['Tools']."</td>".
                  "</tr>";
        }
            echo "</tbody>".
              "</table>".
            "</div>".
          "</div>".
          "</div>";
    }else{
      echo "<div class='col-md-12'>".
      "<div class='tile'>".
        "<div class='tile-body'>".
          "<table class='table table-hover table-bordered' id='sampleTable'>".
            "<thead>".
                  "<tr>".
                    "<th>"."Title"."</th>".
                    "<th>"."Description"."</th>".
                    "<th>"."Year"."</th>".
                    "<th>"."Level"."</th>".
                    "<th>"."Field of Study"."</th>".
                    "<th>"."Supervisor"."</th>".
                    "<th>"."Status"."</th>".
                    "<th>"."Tools"."</th>".
                  "</tr>".
            "</thead>".
            "<tbody>";
      echo "</tbody>".
              "</table>".
            "</div>".
          "</div>".
          "</div>";
    }
    
} 
function lectures($Department)
{
   require '../dbh/dbh.php';
   $sql = "SELECT Title,Name,Surname,Gender,Email_address,Contact FROM lecturers WHERE Department = '$Department'";
   $result = mysqli_query($Conn,$sql);
   $confirm = mysqli_num_rows($result);
   if ($confirm >0 )
   {
    echo "<div class='col-md-12'>".
                    "<div class='tile'>".
                      "<div class='tile-body'>".
                        "<table class='table table-hover table-bordered' id='sampleTable'>".
                          "<thead>".
                                "<tr>".
                                  "<th>"."Title"."</th>".
                                  "<th>"."Name"."</th>".
                                  "<th>"."Surname"."</th>".
                                  "<th>"."Gender"."</th>".
                                  "<th>"."Email_address"."</th>".
                                  "<th>"."Contact"."</th>".
                                "</tr>".
                          "</thead>".
                          "<tbody>";
        while ($row = mysqli_fetch_assoc($result))
        {
              echo "<tr>".
                    "<td>".$row['Title']."</td>".
                    "<td>".$row['Name']."</td>".
                    "<td>".$row['Surname']."</td>".
                    "<td>".$row['Gender']."</td>".
                    "<td>".$row['Email_address']."</td>".
                    "<td>".$row['Contact']."</td>".
                  "</tr>";
        }
            echo "</tbody>".
              "</table>".
            "</div>".
          "</div>".
          "</div>";
    }else{
      echo "<div class='col-md-12'>".
      "<div class='tile'>".
        "<div class='tile-body'>".
          "<table class='table table-hover table-bordered' id='sampleTable'>".
            "<thead>".
                  "<tr>".
                    "<th>"."Title"."</th>".
                    "<th>"."Name"."</th>".
                    "<th>"."Surname"."</th>".
                    "<th>"."Gender"."</th>".
                    "<th>"."Email_address"."</th>".
                    "<th>"."Contact"."</th>".
                  "</tr>".
            "</thead>".
            "<tbody>";
      echo "</tbody>".
      "</table>".
    "</div>".
  "</div>".
  "</div>";
    }
    
} 
function students($Department)
{
   require '../dbh/dbh.php';
   $sql = "SELECT Name,Surname,Reg_number,Gender,Email_address,Contact FROM students WHERE Department = '$Department'";
   $result = mysqli_query($Conn,$sql);
   $confirm = mysqli_num_rows($result);
   if ($confirm >0 )
   {
    echo "<div class='col-md-12'>".
                    "<div class='tile'>".
                      "<div class='tile-body'>".
                        "<table class='table table-hover table-bordered' id='sampleTable'>".
                          "<thead>".
                                "<tr>".
                                  "<th>"."Name"."</th>".
                                  "<th>"."Surname"."</th>".
                                  "<th>"."Reg_number"."</th>".
                                  "<th>"."Gender"."</th>".
                                  "<th>"."Email_address"."</th>".
                                  "<th>"."Contact"."</th>".
                                "</tr>".
                          "</thead>".
                          "<tbody>";
        while ($row = mysqli_fetch_assoc($result))
        {
              echo "<tr>".
                    "<td>".$row['Name']."</td>".
                    "<td>".$row['Surname']."</td>".
                    "<td>".$row['Reg_number']."</td>".
                    "<td>".$row['Gender']."</td>".
                    "<td>".$row['Email_address']."</td>".
                    "<td>".$row['Contact']."</td>".
                  "</tr>";
        }
            echo "</tbody>".
              "</table>".
            "</div>".
          "</div>".
          "</div>";
    }else{
      echo "<div class='col-md-12'>".
      "<div class='tile'>".
        "<div class='tile-body'>".
          "<table class='table table-hover table-bordered' id='sampleTable'>".
            "<thead>".
                  "<tr>".
                    "<th>"."Name"."</th>".
                    "<th>"."Surname"."</th>".
                    "<th>"."Reg_number"."</th>".
                    "<th>"."Gender"."</th>".
                    "<th>"."Email_address"."</th>".
                    "<th>"."Contact"."</th>".
                  "</tr>".
            "</thead>".
            "<tbody>";
            echo "</tbody>".
            "</table>".
          "</div>".
        "</div>".
        "</div>";
    }
    
}
function average($Staff_id,$stage,$Project_id,$comment)
{
  // this function calculates  marks allocated to each item  assessed and  insert the total in the lecture_assessment_marks table.

  require '../dbh/dbh.php';
      $Staff_id = $Staff_id;
      $Lock_key = $Staff_id."lock".$stage.$Project_id;
      $p_id = $Project_id;
      $A_id = $stage;
     
     //calculating the total marks of the assessment items
      $sql = "SELECT DISTINCT SUM(Mark) FROM assessment_marks WHERE Lock_key = '$Lock_key'";
       $result = mysqli_query($Conn,$sql);
       $confirm = mysqli_num_rows($result);
       if ($confirm >0 )
        {
            while ($row = mysqli_fetch_assoc($result))
              {
                $AVG = $row['SUM(Mark)'];
              }
      }
      else{
        echo "AVERAGING ERROR: " . $sql . "<br>" . $Conn->error;
      }

        //calculating the the total marks allocated to project by a single lecture
       $sql = "SELECT SUM(Item_mark) FROM Assessment_items where Assessment_id = '$stage'";
       $result = mysqli_query($Conn,$sql);
       $confirm = mysqli_num_rows($result);
       if ($confirm >0 )
       {
            while ($row = mysqli_fetch_assoc($result))
                {
                  $SUM = $row['SUM(Item_mark)'];
                }
      }
      //percentaging mark allocated to project / total mark NB total % of each single lecturer
      $Total = ($AVG/$SUM)*100;

      // unique mark id, acts as signature to the assessment and ensures no other assessment marks comes from his/her id
      $Mark_id = $Staff_id.'lock'.$p_id.'id'.$A_id;

      //Finally putting all the results in the lecturer assessment table14
      $Lock = $Staff_id.$p_id.$A_id;
      $sql = "INSERT INTO lecturer_assessment_marks
                  (
                    Staff_id,
                    Project_id,
                    Assessment_id,
                    Mark_id,
                    Mark,
                    Total_mark,
                    Overal_mark,
                    comment,
                    Lock_key
                  ) VALUES (
                            '$Staff_id',
                            '$p_id',
                            $A_id,
                            '$Mark_id',
                             '$AVG', 
                             $SUM,
                             $Total,
                             '$comment',
                             '$Lock')";
      if ($Conn->query($sql) === TRUE)
      {
        mark_total($p_id,$A_id,$SUM,$Total);
      }else{
          echo "Final computation Error: " . $sql . "<br>" . $Conn->error;        
        }

}

function mark_total($Project_id,$Assessment_id,$SUM,$Total)
      {
        require '../dbh/dbh.php';
        $Lock_key = $Project_id.$Assessment_id;
        $sql = "SELECT Assessed_by FROM final_stage_mark WHERE Project_id = '$Project_id' AND Assessment_id = '$Assessment_id'";
       $result = mysqli_query($Conn,$sql);
       $confirm = mysqli_num_rows($result);

       if ($confirm > 0) {

        while ($row = mysqli_fetch_assoc($result))
        {
              $num = $row['Assessed_by'];
        }
        $num = $num + 1;
        echo $num;
         # code...
       }else{
        $num = 1;
       }
       // DO NOT DELETE ABOVE QUERY
      
        $sql ="SELECT AVG(Overal_mark), AVG(Mark) FROM lecturer_assessment_marks WHERE Project_id ='$Project_id' AND Assessment_id = $Assessment_id";
       $result = mysqli_query($Conn,$sql);
       $confirm = mysqli_num_rows($result);
       if ($confirm >0 )
       {
           while ($row = mysqli_fetch_assoc($result))
                {
                      $avg = $row['AVG(Overal_mark)'];
                      $mark = $row['AVG(Mark)'];
                }

                $sql = "INSERT INTO final_stage_mark (
                                                 Project_id,
                                                 Assessment_id,
                                                 Mark,
                                                 Total_mark,
                                                 Overal_mark,
                                                 Assessed_by,
                                                 Lock_key
                                                  ) VALUES (
                                                  '$Project_id',
                                                  $Assessment_id,
                                                  $mark,
                                                  $SUM,
                                                  $avg,
                                                  $num,
                                                  '$Lock_key'
                                                )";
                if ($Conn->query($sql) === TRUE)
                    {
                        header('location: ../pages/Assessment.php');
                     }else{                           
                            $sql = "UPDATE final_stage_mark  SET 
                                                            Overal_mark = $avg ,
                                                            Assessed_by =$num,
                                                            Mark=$mark 
                                                      WHERE 
                                                      Lock_key = '$Lock_key'";
                                                      

                             if ($Conn->query($sql) === TRUE)
                                  {

                                      header('location: ../pages/Assessment.php');
                                    }else{
                                      echo "Failed to Finalise".$sql . "<br>" . $Conn->error;

                                    }
                                    
                                    
                          }
       }
}

function summary($Department)
{
  require '../dbh/dbh.php';
  $sql = "SELECT Assessment_id,Assessment_title,Level,Status FROM assessment_details WHERE Department = '$Department'";
  $result = mysqli_query($Conn,$sql);
  $confirm = mysqli_num_rows($result);

  if ($confirm >0 )
       {
        echo
         "<div class='col-md-6'>".
          "<div class='tile'>".
            "<h4>"."<i>"."Request Summary"."</i>"."</h4>".
            "<form method ='POST' Action = '../php/requestsummary.php'>".
            "<table class='table table-striped'>".
              "<thead>".
              "<tr>".
              "<th>"."Assessment title"."</th>".
              "<th>"."Level"."</th>".
              "<th>"."Status"."</th>".
              "<th>"."Select Assessment"."</th>".
            "</tr>".
          "</thead>"."<tbody>";
              while ($row = mysqli_fetch_assoc($result))
                {
                  $value = $row['Assessment_id'];
                   echo "<tr>".
                        "<td>".$row['Assessment_title']."</td>".
                        "<td>".$row['Level']."</td>".
                        "<td>".$row['Status']."</td>".
                        "<td>"."<div class='toggle-flip'>".
                         "<label>".
                          "<input type='radio' name='assess' value = $value>".
                          "</label>".
                          "</div>"."</td>"."</tr>";
                
              }
                echo "</table>".
                    "<center>".
            "<button type='submit' class='btn btn-primary' id='demoSwal'>"."Request Summary"."</button>".
          "</center>".
          "</form>"."</div>".
          "</div>";
     }
}
function stages($Department)
{
  require '../dbh/dbh.php';
  $sql = "SELECT Assessment_id,Assessment_title,Level,Status FROM assessment_details WHERE Department = '$Department'";
  $result = mysqli_query($Conn,$sql);
  $confirm = mysqli_num_rows($result);

  if ($confirm >0 )
       {
        echo
         "<div class='col-md-6'>".
          "<div class='tile'>".
            "<h4>"."<i>"."Department Assessment"."</i>"."</h4>".
            "<form method ='POST' Action = '../php/stages.php'>".
            "<table class='table table-striped'>".
              "<thead>".
              "<tr>".
              "<th>"."Assessment title"."</th>".
              "<th>"."Level"."</th>".
              "<th>"."Status"."</th>".
              "<th>"."Tick to assess"."</th>".
            "</tr>".
          "</thead>"."<tbody>";
              while ($row = mysqli_fetch_assoc($result))
                {
                  $value = $row['Assessment_id'];
                  $Status = $row['Status'];

                  if($Status == 'Assessed')
                  {
                    echo "<tr>".
                    "<td>".$row['Assessment_title']."</td>".
                    "<td>".$row['Level']."</td>".
                    "<td>".$row['Status']."</td>".
                    "<td>"."<div class='toggle-flip'>".
                     "<label>".
                      "Assessed".
                      "</label>".
                      "</div>"."</td>"."</tr>";
                  }else{
                    echo "<tr>".
                    "<td>".$row['Assessment_title']."</td>".
                    "<td>".$row['Level']."</td>".
                    "<td>".$row['Status']."</td>".
                    "<td>"."<div class='toggle-flip'>".
                     "<label>".
                      "<input type='radio' name='assess' value = $value>".
                      "</label>".
                      "</div>"."</td>"."</tr>";
                  }
                  
                
              }
                echo "</table>".
                    "<center>".
            "<button type='submit' class='btn btn-primary' id='demoSwal'>"."Save changes"."</button>".
          "</center>".
          "</form>"."</div>".
          "</div>";
     }
}
function displayfiles($Department)
{
  require '../dbh/dbh.php';

  $sql ="SELECT Project_id, Project_title,Project_description,Level,Year FROM projects WHERE Department ='$Department' AND Stage = 'current'";
  $result = mysqli_query($Conn,$sql);
  $confirm = mysqli_num_rows($result);

  if ($confirm >0 )
       {
         while ($row = mysqli_fetch_assoc($result))
         {
          $Project_id = $row['Project_id'];
          echo  "<tr>".
                  "<td>".$row['Project_title']."</td>".
                  "<td>".$row['Project_description']."</td>".
                  "<td>".$row['Year']."</td>".
                  "<td>".$row['Level']."</td>";
                  Developer($Project_id);
                  Files($Project_id);
              echo "</tr>";

         }
       }
}
function Developer($Project_id)
{
  require '../dbh/dbh.php';
  $sql = "SELECT Reg_number FROM project_developers WHERE Project_id = '$Project_id'";
  $result = mysqli_query($Conn,$sql);
  $confirm = mysqli_num_rows($result);

  if ($confirm > 0) {
    while ($row = mysqli_fetch_assoc($result))
    {
      $Reg_number = $row['Reg_number'];
      $sql = "SELECT Name,Surname FROM students WHERE Reg_number = '$Reg_number'";
      $result = mysqli_query($Conn,$sql);
      $confirm = mysqli_num_rows($result);
      if ($confirm > 0)
      {
        echo "<td>";
        while ($row = mysqli_fetch_assoc($result))
        {
          echo $row['Name']." ".$row['Surname'].",";
        }
        echo "</td>";
      }

    }
  }

}

function FunctionName($value='')
{
  # code...
}
function Files($Project_id)
{
  require '../dbh/dbh.php';
  $sql = "SELECT File_description,File_path,File_name FROM projects_files WHERE Project_id = '$Project_id'";
  $result = mysqli_query($Conn,$sql);
  $confirm = mysqli_num_rows($result);

  if ($confirm > 0) {
    echo "<td>";
    while ($row = mysqli_fetch_assoc($result))
    {
      $path = $row['File_path'];
      echo "<a href='$path'>".$row['File_description']."</a>";
    }
    echo "</td>";
  }else{
    echo "<td>"."No files attached"."</td>";
              ;
  }
  
}
function marks()
{
  require '../dbh/dbh.php';
  $Department = $_SESSION['Department'];

  $sql = "SELECT final_mark.Project_id,Assessment_id,Project_title,Level,Overal_mark,Assessed_by FROM final_mark,projects WHERE final_mark.Project_id = projects.Project_id  AND projects.Department = '$Department'";
  $result = mysqli_query($Conn,$sql);
  $confirm = mysqli_num_rows($result);

  if ($confirm > 0)
  {
    while ($row = mysqli_fetch_assoc($result))
    {
      $Project_id = $row['Project_id'];
      $Assessment_id = $row['Assessment_id'];
      $mark = $row['Overal_mark'];
      $Assessed_by = $row['Assessed_by'];
      $Project_title = $row['Project_title'];
      display1($Project_id,$Assessment_id,$Assessed_by);

      #echo $Project_id.$Assessment_id.$mark;

    }
  }
}
function more_items()
{
  /*
  echo "";
              <div class="row">
                        <div class="col-md-6">
                          <h6>Item</h6>
                         
                          <input type="text" name="input11" class="form-control input-lg m-bot15" required=""><br>
                          <input type="text" name="input12" class="form-control input-lg m-bot15"><br>
                          <input type="text" name="input13" class="form-control input-lg m-bot15"><br>
                          <input type="text" name="input14" class="form-control input-lg m-bot15"><br>
                          <input type="text" name="input15" class="form-control input-lg m-bot15"><br>
                         
                        </div>
                        <div class="col-md-6">
                          <h6>Mark</h6>
                          <input type="number" name="input16" class="form-control input-lg m-bot15" required=""><br>
                          <input type="number" name="input17" class="form-control input-lg m-bot15"><br>
                          <input type="number" name="input18" class="form-control input-lg m-bot15"><br>
                          <input type="number" name="input19" class="form-control input-lg m-bot15"><br>
                          <input type="number" name="input20" class="form-control input-lg m-bot15"><br>
                        </div>                 
                      </div>
                      */
}



















/*


      $sql = "SELECT Department FROM projects WHERE Project_id = '$Project_id'";
      $result = mysqli_query($Conn,$sql);
      $confirm = mysqli_num_rows($result);

      if ($confirm > 0)
      {
          while ($row = mysqli_fetch_assoc($result))
          {
            $dpt = $row['Department'];
             if ($dpt == $_SESSION['Department'])
             {
                #print_r($_SESSION);
                display1($Project_id,$Assessment_id);
            }
          }
         
      }else{
        echo "Error".$sql . "<br>" . $Conn->error;
      }

      
    }
  }



*/
function display1($Project_id,$Assessment_id,$Assessed_by)
{
  require '../dbh/dbh.php';

      $sql = "SELECT Reg_number FROM project_developers WHERE Project_id = '$Project_id'";
      $result = mysqli_query($Conn,$sql);
      $confirm = mysqli_num_rows($result);

      if ($confirm > 0)
        {

            while ($row = mysqli_fetch_assoc($result))
            {
              $Reg_number = $row['Reg_number'] ;
              #echo $Reg_number;
              display2($Reg_number,$Assessment_id,$Project_id,$Assessed_by);
            }
        }else{
          echo "Error".$sql . "<br>" . $Conn->error;
        }
  }
  function display2($Reg_number,$Assessment_id,$Project_id,$Assessed_by)
  {
   # echo $Reg_number.$Assessment_id.$Project_id;

    require '../dbh/dbh.php';
  

              $sql = "SELECT Name, Surname FROM Students WHERE Reg_number = '$Reg_number'";
              $result = mysqli_query($Conn,$sql);
              $confirm = mysqli_num_rows($result);
              if ($confirm > 0)
              { 
                echo "<tr>".
                          "<form action = 'test.php' method = 'POST'>";
          
              while ($row = mysqli_fetch_assoc($result))
                {
                    $Name = $row['Name'];
                    $Surname = $row['Surname'];
                    ;

                  /*  echo "<td>".$Name."</td>".
                         "<td>".$Surname."</td>".
                         "<td>".$Reg_number."</td>";*/
                         display4($Project_id);
                         display3($Assessment_id);
                         display5($Project_id,$Assessment_id,$Assessed_by);
                      
                }
                echo "</form>"."</tr>";
              }else{
                echo "Error".$sql . "<br>" . $Conn->error;
              }
}
function display3($Assessment_id)
{
  require '../dbh/dbh.php';


                    $sql = "SELECT Assessment_title FROM assessment_details WHERE Assessment_id = '$Assessment_id'";
                    $result = mysqli_query($Conn,$sql);
                    $confirm = mysqli_num_rows($result);
                    if ($confirm > 0)
                      {
                        while ($row = mysqli_fetch_assoc($result))
                          {
                              $a_title = $row['Assessment_title'];
                                echo "<td>".$a_title."</td>";
                          }
                        }else{
                          echo "Error".$sql . "<br>" . $Conn->error;
                        }
}
function display4($Project_id)
{
  require '../dbh/dbh.php';


                              $sql = "SELECT Project_title,Supervisor,Level FROM Projects WHERE Project_id = '$Project_id'";
                              $result = mysqli_query($Conn,$sql);
                              $confirm = mysqli_num_rows($result);
                              if ($confirm > 0)
                              {
                                 while ($row = mysqli_fetch_assoc($result))
                                   {
                                     $p_title = $row['Project_title'];
                                     $Supervisor = $row['Supervisor'];

                                      echo "<td>".$p_title."</td>".
                                            "<td>".$Project_id."</td>".
                                            "<td>".$row['Level']."</td>".      
                                            "<td>".$Supervisor."</td>";
                                    }
                              }else{
                                echo "Error".$sql . "<br>" . $Conn->error;
                              }
}
function display5($Project_id,$Assessment_id,$Assessed_by)
{
  require '../dbh/dbh.php';


                                    $sql = "SELECT Overal_mark FROM final_mark WHERE Project_id ='$Project_id' AND Assessment_id ='$Assessment_id'";
                                      $result = mysqli_query($Conn,$sql);
                                    $confirm = mysqli_num_rows($result);

                                    if ($confirm > 0)
                                      {
                                        while ($row = mysqli_fetch_assoc($result))
                                         {
                                          $mark = $row['Overal_mark'];
                                          echo "<td>".$mark."</td>";
                                          
                                         }
                                         echo "<th>"."<button type= 'submit' style='background: none; border:none;'>".$Assessed_by."</button>"."</th>";
                                         echo "</tr>";

                                       }else{
                                        
                                       }
}
function marks_table()
{
  
  echo "<div class='col-md-12' id='1'>".
                    "<div class='tile'>".
                      "<div class='tile-body'>".
                        "<table class='table table-hover table-bordered' id='sampleTable'>".
                          "<thead>".
                                "<tr>"./*
                                  "<th>"."Name"."</th>".
                                  "<th>"."Surname"."</th>".
                                  "<th>"."Reg-number"."</th>".*/
                                  "<th>"."Project Title"."</th>".
                                  "<th>"."Project ID"."</th>".
                                  "<th>"."Level"."</th>".
                                  "<th>"."Supervisor"."</th>".
                                  "<th>"."Assessment"."</th>".
                                  "<th>"."mark"."</th>".
                                  "<th>"."Assessed by"."</th>".
                                "</tr>".
                          "</thead>".
                          "<tbody>";
                          marks();
}
  function student_modal()
  {

         echo "<!-- modal -->".
                 "<div class='modal fade' id='mod9' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>".
                  "<div class='modal-dialog'>".
                    "<div class='modal-content'  style='width: 700px;'>".
                      "<div class='modal-header'>".
                        "<h4>"."New Project"."</h4>".
                        "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>"."&times"."</button>".
                        
                      "</div>".
                      "<div class='modal-body'>".

                      "<form  method='POST' action='../php/propose_project.php' enctype='multipart/form-data'>".

                    "<label class='control-label'>"."Project Title"."</label>".
                    "<input type='text' class='form-control' name='title' required=''>".

                    "<label class='control-label'>"."Project Description"."</label>".
                    "<textarea class='form-control'  name='description' required=''>"."</textarea>".
                     "<label class='control-label'>"."Field of study"."</label>".
                            "<select class='form-control' name='field'>".
                                "<option value='Artificial Intelligence'>"."Artificial Intelligence"."</option>".
                                "<option value='Big Data'>"."Big Data analytics"."</option>".
                                "<option value='Internet of Things'>"."IOT"."</option>".
                                "<option value='Expect Systems'>"."Expect Systems"."</option>".
                            "</select>".
                            "<br>".
                            "<input type='text' name='other' placeholder='specify if other' class='form-control' required=''>".
                            "<br>".

                            "<label class='control-label'>"."Attachments"."</label>".
                            "<input type='file' name='file'>".                            
                                                      "<label class='control-label'>"."What file are you attachment"."</label>".
                                                      "<textarea class='form-control' name='attachment'>"."</textarea>".
                                                      "<br>".
                            
                                                     "<label class='control-label'>"."Proposed Tools (languages to be used)"."</label>".
                                                      "<textarea class='form-control' name='tools' required=''>"."</textarea>".
                                                      "<br>".
                                                  "<div class='row'>".
                                                   "<div class='col-md-6'>".
                                                        "<label class='control-label'>"."Year"."</label>".
                                                         "<select class='form-control' name='year'>".
                                                          "<option value='2018/2019'>"."2018/2019"."</option>".
                                                          "<option value='2017/2018'>"."2017/2019"."</option>".
                                                        "</select>".
                                                    "</div>".
                                                      "<div class='col-md-6'>".
                                                        "<label class='control-label'>"."course code"."</label>".
                                                         "<select class='form-control' name='course'>".
                                                          "<option value='hit200'>"."Hit200"."</option>".
                                                          "<option value='hit400'>"."Hit400"."</option>".
                                                        "</select>".
                                                    "</div>".
                                                  "</div>".
                                                "<br>"."<br>".             
                                                  "</div>".
                                                  "<div class='modal-footer>".
                                                    "<button data-dismiss='modal' class='btn btn-default' type='button'>"."Close"."</button>".
                        "<button class='btn btn-success' type='submit' name='submit'>"."Save changes"."</button>".
                      "</div>".
                      "</form>".
                    "</div>".
                  "</div>".
                "</div>".
                "<!-- modal -->";
  }                              
function Duedate($Department,$Level)
{
  require '../dbh/dbh.php';
   $sql = "SELECT Proposed_date FROM assessment_details WHERE Department = '$Department' AND Status = 'Current' AND Level = '$Level'";
  $result = mysqli_query($Conn,$sql);
  $confirm = mysqli_num_rows($result);

  if ($confirm > 0)
  {
  
    while ($row = mysqli_fetch_assoc($result))
    {
        $systemdate = $row['Proposed_date'];
    }

     $todaysdate = date("Y-m-d");    
     $date1 = new DateTime($systemdate);
     $date2 = new DateTime($todaysdate);
       
    $interval = date_diff($date2, $date1);
    $num =  $interval->format('%R%a');

    if ($num <0)
    {
      return false;
      $_SESSION['message'] = $num;
      header('location: ../pages/message.php');
    }else{
      return true;
    echo $num;
    header('location: ../pages/message.php');
   }
 }else{
    echo "system Error: " . $sql . "<br>" . $Conn->error;
   }
}
function invite()
{
  
}
function notify_user($iniviter)
{
  require '../dbh/dbh.php';

  $Notification = 'message';
  $Notification_date = date("Y/m/d");
  $Notification_Time = date("h:i:sa");
  $invited = $_SESSION['Reg_number'];

  $sql = "INSERT INTO Notifications(Audience,Notification,Notification_date,Notification_Time,Notifier) VALUES ('$invited','$Notification','$Notification_date','$Notification_Time','$iniviter')";
    if ($Conn->query($sql) === FALSE)
    {
      echo "Error".$sql . "<br>" . $Conn->error;
    }
}
function addsupervisor()
{
 require '../dbh/dbh.php';
 $Department = $_SESSION['Department'];
 $sql = "SELECT Project_id, Project_title , Project_description, Level,Field, Tools,Supervisor FROM Projects WHERE Department = '$Department'";
 $result = mysqli_query($Conn,$sql);
 $confirm = mysqli_num_rows($result);
 if ($confirm > 0)
 { 
  echo
 "<div class='col-md-12'>".
  "<div class='tile'>".
    "<div class='tile-body'>".
      "<table class='table table-hover table-bordered' id='sampleTable'>".
        "<thead>".
              "<tr>".
                "<th>"."Project Title"."</th>".
                "<th>"."Project Description"."</th>".
                "<th>"."Level"."</th>".
                "<th>"."Field"."</th>".
                "<th>"."Tools"."</th>".
                "<th>"."File"."</th>".
                "<th>"."Supervisor"."</th>".
                "<th>"."New Supervisor"."</th>".
                "<th>"."Action"."</th>".
              "</tr>".
        "</thead>".
        "<tbody>";
        while ($row = mysqli_fetch_assoc($result))
        {
          $Project_id = $row['Project_id'];
          $Supervisor = $row['Supervisor'];
          echo
          "<tr>".
           "<form action = 'addsupervisor.php' method = 'POST'>".
           "<input type = 'hidden' name = 'id' value = '$Project_id'>".
           "<td>".$row['Project_title']."</td>".
           "<td>".$row['Project_description']."</td>".
           "<td>".$row['Level']."</td>".
           "<td>".$row['Field']."</td>".
           "<td>".$row['Tools']."</td>";
           Files($Project_id);
           supervisor($Supervisor);
           select_lecturers();
           echo "<td>"."<button type = 'submit' class = 'btn btn-primary'>"."Save"."</button>"."</td>".
           "</form>"."</tr>";

        }
 }
 echo "</tbody>".
 "</table>".
"</div>".
"</div>".
"</div>";
}
function select_lecturers()
{
  require '../dbh/dbh.php';
  $Department = $_SESSION['Department'];
  $sql = "SELECT Staff_id,Name,Surname FROM lecturers WHERE Department = '$Department'";
  $result = mysqli_query($Conn,$sql);
  $confirm = mysqli_num_rows($result);
  if ($confirm > 0)
  {
    echo "<td>"."<select class ='form-control' name='supervisor' style = 'border:none;'>";
    while ($row = mysqli_fetch_assoc($result))
    {
      $Staff_id = $row['Staff_id'];
      echo "<option value ='$Staff_id'>".$row['Name']." ".$row['Surname']."</option>";
    }
    echo "</select>"."</td>";
  }
}
function supervisor($Supervisor)
{
  require '../dbh/dbh.php';
  $sql = "SELECT Name,Surname FROM lecturers WHERE Staff_id = '$Supervisor'";
  $result = mysqli_query($Conn,$sql);
  $confirm = mysqli_num_rows($result);
  if ($confirm > 0)
  {
    echo "<td>";
    while ($row = mysqli_fetch_assoc($result))
    {
      echo $row['Name']." ".$row['Surname'];
    }
    echo "</td>";
  }else
  {
    echo "<td>"." "."</td>";
  }
}
function chats()
{
require '../dbh/dbh.php';

if(isset($_SESSION['Reg_number'])){
  $id = $_SESSION['Reg_number'];
}else{
  $id = $_SESSION['Staff_id'];
}

$sql = "SELECT message,Sender FROM messages WHERE thread_id = 3";
$result = mysqli_query($Conn,$sql);
$confirm = mysqli_num_rows($result);
if ($confirm > 0)
{
  while ($row = mysqli_fetch_assoc($result))
    {
      $sender = $row['Sender'];
      if ($sender == $id){
        $message = $row['message'];
        echo "<div class='message me'>".
        "<p class='info'>".$message."</p>".
      "</div>";
      }else{
        $message = $row['message'];
        echo "<div class='message'>".
        "<p class='info'>".$message."</p>".
      "</div>";
      }
    
    }
    
}
}
function supervision()
{
  require '../dbh/dbh.php';
  if(isset($_SESSION['Reg_number'])){
    $id = $_SESSION['Reg_number'];
    $sql = "SELECT Project_id FROM Project_developers WHERE Reg_number = '$id'";
    $result = mysqli_query($Conn,$sql);
    $confirm = mysqli_num_rows($result);
    if ($confirm > 0)
    {
      while ($row = mysqli_fetch_assoc($result))
      {
        $Project_id = $row['Project_id'];
        $sql = "SELECT Supervisor FROM Projects WHERE Project_id = '$Project_id'";
        $result = mysqli_query($Conn,$sql);
        $confirm = mysqli_num_rows($result);
        if ($confirm > 0)
        {
          while ($row = mysqli_fetch_assoc($result))
          {
            $Supervisor = $row['Supervisor'];
            $sql = "SELECT Name,Surname,Email_address,Contact FROM lecturers WHERE Staff_id = '$Supervisor'";
            $result = mysqli_query($Conn,$sql);
            $confirm = mysqli_num_rows($result);
            if ($confirm > 0)
              {
                while ($row = mysqli_fetch_assoc($result))
                 {
                   echo "<label class = 'control-label'>".$row['Name']." ".$row['Surname']."</label>"."<br>".
                   $row['Email_address']."<br>".
                   $row['Contact'];
                 }
                }else{
                  echo "ma1: " . $sql . "<br>" . $Conn->error;
                }

          }
        }

      }
    }

  }elseif(isset($_SESSION['Staff_id']))
  {
    $id = $_SESSION['Staff_id'];

    $sql = "SELECT Project_id FROM Projects WHERE Supervisor = '$id'";
    $result = mysqli_query($Conn,$sql);
    $confirm = mysqli_num_rows($result);
    if ($confirm > 0)
    {
        while ($row = mysqli_fetch_assoc($result))
          {
            $Project_id = $row['Project_id'];
          }
        $sql1 = "SELECT Reg_number FROM Project_developers WHERE Project_id = '$Project_id'";
        $result1 = mysqli_query($Conn,$sql1);
        $confirm1 = mysqli_num_rows($result1);
        if ($confirm1 > 0)
        {
          echo "<div class='col-md-12'>".
                  "<div class='tile'>".
                    "<div class='tile-body'>".
                      "<table class='table table-hover table-bordered' id='sampleTable'>".
                        "<thead>".
                              "<tr>".
                                "<th>"."Name"."</th>".
                                "<th>"."Surname"."</th>".
                                "<th>"."Reg-number"."</th>".
                                "</tr>".
                                "</thead>"."<tbody>";
            while ($row1 = mysqli_fetch_assoc($result1))
              {
                $Reg_number = $row1['Reg_number'];
                $sql2 = "SELECT Name,Surname FROM students WHERE Reg_number = '$Reg_number'";
                $result2 = mysqli_query($Conn,$sql2);
                $confirm2 = mysqli_num_rows($result2);
                if ($confirm2 > 0)
                {
                    while ($row2 = mysqli_fetch_assoc($result2))
                      {
                        echo "<tr>".
                        "<td>".$row2['Name']."</td>".
                        "<td>".$row2['Surname']."</td>".
                        "<td>".$Reg_number."</td>".
                        "</tr>";
                      }
                  }
              }
              echo "</tbody>".
              "</table>".
             "</div>".
             "</div>".
             "</div>";
        }else{
          echo "system Error: " . $sql . "<br>" . $Conn->error;
        }
    }else{
      echo "You have no students assigned to supervise";
    }

  }else{

}
}
function more()
{
  echo "ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
}





















