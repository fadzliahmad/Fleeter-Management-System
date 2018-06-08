 <?php
if (isset($_POST["upload"])) {
    
    $target = "vehicle/" . basename($_FILES['image']['name']);
    
    include_once('config.php');

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $sql = "INSERT INTO vehicle (image) VALUES ('$image')";
    
    $uploaded = mysqli_query($conn, $sql);
    
    if (move_uploaded_file($tmp_name, $target)) {
         echo "Image uploaded successfully";
    } else {
         echo "Image uploaded failed Gambar kecik jer boleh system noob ";
    }
}
?> 