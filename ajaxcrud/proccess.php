<?php 
	include 'db.php';
	$check=$_POST['checker'];

	$check();


function insert(){
	global $con;
	$id=$_POST['id'];
	if (empty($id)) {
		$name=$_POST['name'];
		$father=$_POST['father'];
		$mother=$_POST['mother'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		if (empty($name)) {
			echo '<div class="alert alert-danger"> Name Field is Required</div>';
		}
		 else if (empty($father)) {
                echo '<div class="alert alert-danger"> Father Name Field is Required</div>';
            }
            else if (empty($mother)) {
                echo '<div class="alert alert-danger">Mother Name Field is Required</div>';
            }
            else if (empty($phone)) {
                echo '<div class="alert alert-danger"> Phone Field is Required</div>';
            }
            else if (empty($address )) {
                echo '<div class="alert alert-danger"> Address Field is Required</div>';
            }
		else{
			$sql="INSERT INTO tbl_student(name,father,mother,phone,address)VALUES('$name','$father','$mother','$phone','$address')";
			$result=$con->query($sql);
			if ($result) {
				echo '<div class="alert alert-success"> Insert Success</div>';
			}
			else{
				echo '<div class="alert alert-danger"> Insert Not Success '.$con->error.'</div>';
			}
		}
	}
	else{
		echo '<div class="alert alert-danger"> Only For Update Now </div>';
	}
	
}

function show(){
	global $con;
	$sql="SELECT *FROM tbl_student";
	$result =$con->query($sql);
	$show="";
	$show .="<table  class='table border display' id='table_id'>
				<thead><tr>
					<th>#Sl</th>
					<th>Name</th>
					<th>Father Name</th>
					<th>Mother Name</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Action</th>
				</tr></thead><tbody>
		";
		$sl=1;
	while($data=$result->fetch_assoc()) {
		$show .="<tr>
					<td>".$sl."</td>
					<td>".$data['name']."</td>
					<td>".$data['father']."</td>
					<td>".$data['mother']."</td>
					<td>".$data['phone']."</td>
					<td>".$data['address']."</td>
					<td>
						<button class='btn btn-sm btn-success' onclick='test(".$data['id'].")'>Edit</button>
					</td>
					<td>
						<button class='btn btn-sm btn-danger' onclick='forDelete(".$data['id'].")'>Delete</button>
					</td>

				</tr>";
	$sl++; }
	$show .="</tbody></table>";
	echo $show;
}

function showDataforUpdate(){
	global $con;
	$id=$_POST['id'];
	$sql="SELECT *FROM tbl_student WHERE id='$id'";
	$result =$con->query($sql);
	$show="";
	while($row=$result->fetch_assoc()) {
		$show=$row;
	}
	echo json_encode($show);
}

function delete(){
	global $con;
	$id=$_POST['id'];
	$sql="DELETE FROM tbl_student WHERE id='$id'";
	$result =$con->query($sql);
	if ($result) {
		echo '<div class="alert alert-success">Student Data Deleted</div>';
	}
	else{
		echo '<div class="alert alert-danger">Student Data Not Deleted '.$con->error.'</div>';
	}
	
}
function update(){

	global $con;
	$id=$_POST['id'];
	if (empty($id)) {
		echo '<div class="alert alert-danger">Select Student First '.$con->error.'</div>';
	}
	else{
		$name=$_POST['name'];
		$father=$_POST['father'];
		$mother=$_POST['mother'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];

			$sql="UPDATE tbl_student SET name='$name',father='$father',mother='$mother',phone='$phone',address='$address' WHERE id='$id'";
			$result=$con->query($sql);
			if ($result) {
				echo '<div class="alert alert-success"> Update Success</div>';
			}
			else{
				echo '<div class="alert alert-success"> Update Not Success '.$con->error.'</div>';
			}
	}

}