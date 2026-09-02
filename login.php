<?php include "db.php";
$user=$_POST['username'];
$pass=$_POST['password'];
$sql="SELECT * FROM users WHERE username='$user' AND password='$pass'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
echo"<script>alert('Login Successful');
window.location='dashboard.php';
</script>";
}
else{
echo "<script>
alert('Invalid Login');
window.location='index.html';
</script>";
}
?>