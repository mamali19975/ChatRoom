<?php  

session_start();

# barresi log in budane user
if (isset($_SESSION['username'])) {
	
	# ertebat ba db
	include '../db.conn.php';

	#  daryafte username karbare log in shode dar session
	$id = $_SESSION['user_id'];

	$sql = "UPDATE users
	        SET last_seen = NOW() 
	        WHERE user_id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);

}else {
	header("Location: ../../index.php");
	exit;
}