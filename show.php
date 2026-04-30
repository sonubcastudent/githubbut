<?php
$conn = mysqli_connect("localhost","username","password","database_name");

$result = mysqli_query($conn,"SELECT * FROM students");

while($row = mysqli_fetch_assoc($result)){
?>
    <p><?php echo $row['name']; ?></p>
    
    <img src="uploads/<?php echo $row['photo']; ?>" width="150">
    
    <hr>
<?php
}
?>