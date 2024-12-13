<?php 
    $msv=$_GET['masv'];
    include_once "./ConnectDB.php";
    //tạo câu lệnh xóa
    $sql="Delete from Sinhvien where Masinhvien='$msv'";
    $kq=mysqli_query($con,$sql);
    if($kq)
        header("location:./Danhsachsinhvien.php");
    else
        echo "<script>alert('Xóa thất bại!')</script>";
    
?>
