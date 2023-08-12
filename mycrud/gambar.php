<?php
 $query = " select * from image ";
 $result = mysqli_query($db, $query);
while ($data = mysqli_fetch_assoc($result)) {
?>
<img src="./image/<?php echo $data['foto']; ?>">
<?php
 }
?>