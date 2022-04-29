<?php

//index.php

include('class/Appointment.php');

$object = new Appointment;

if(isset($_SESSION['patient_id']))
{
	header('location:dashboard.php');
}

$object->query = "
SELECT * FROM doctor_schedule_table 
INNER JOIN doctor_table 
ON doctor_table.doctor_id = doctor_schedule_table.doctor_id
WHERE doctor_schedule_table.doctor_schedule_date >= '".date('Y-m-d')."' 
AND doctor_schedule_table.doctor_schedule_status = 'Active' 
AND doctor_table.doctor_status = 'Active' 
ORDER BY doctor_schedule_table.doctor_schedule_date ASC
";

$result = $object->get_result();

include('header.php');

?>
  <div class="pricing-header mx-auto text-center"  style="margin-top:-40px;">
	      	<h3 class="display-4">BASIS HOSPITAL</h3>
		      	<div class="card" style="background-image: url('images/image1.jpg');height:580px;width:1500px;margin-top:20px;">
		      		
		      	</div>
		    

<?php

include('footer.php');

?>
