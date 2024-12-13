<?php 
    include_once("./Connectdb1.php");
    $msv=''; $ht=''; $ngs=''; $ml=''; $gt=''; $dt=''; $email=''; $dc='';
    // Tạo câu lệnh sql lấy DL từ bảng lophoc đưa vào mảng $lophoc
    $sql="Select * From Lophoc";
    $lophoc=mysqli_query($con,$sql);
    
    //Lưu DL vào bảng Sinhvien
    if(isset($_POST["btnLuu"])){
        $msv=$_POST['txtMasinhvien'];
        $ht= $_POST['txtHoten'];
        $ngs= $_POST['txtNgaysinh'];
        $gt=$_POST['ddlGioitinh'];
        $ml=$_POST['ddlLophoc'];
        $dt=$_POST['txtDienthoai'];
        $email=$_POST['txtEmail'];
        $dc=$_POST['txtDiachi'];
        //Tạo câu lệnh sql để chèn DL vào bảng Sinhvien
        $sql1="Insert into Sinhvien Values('$msv',N'$ht','$ngs','$gt','$ml','$dt','$email','$dc')";
        //Thực thi câu lệnh
        $kq=mysqli_query($con,$sql1);
        if($kq) {
            echo "<script>alert('Thêm mới thành công!')</script>";
        }
        else { echo "<script>alert('Thêm mới thất bại!')</script>"; }
    }
    if(isset($_POST["btnBack"])){
        header("location:./Danhsachsinhvien.php");
    }
    mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="QLTHUVIEN/border.css">
</head>
<body>
    <div class="container">
        
        <form action="" method="post" #Xác định phương thức gửi dũ liệu bằng POST or GET>
        <div class="form-group" style="width: 90%; padding-left: 150px;">
                <label>Mã sinh viên</label>
                <input type="text" class="form-control" name="txtMasinhvien" value="<?php echo $msv ?>">
                <br><br>
                <label>Họ và tên</label>
                <input type="text" class="form-control" name="txtHoten" value="<?php echo $ht ?>">
                <br><br>
                <label>Ngày sinh</label>
                <input type="date" name="txtNgaysinh"  class="form-control" value="<?php echo $ngs ?>">
                <br><br>
                <label>Giới tính</label>
                <select name="ddlGioitinh" id="">
                    <option value="">--Chọn giới tính--</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
                <br><br>
                <label for="">Lớp học</label>
                <select name="ddlLophoc" class="form-control" id="">
                    <option value="">--Chọn lớp học</option>
                    <?php 
                    if(isset($lophoc)&&mysqli_num_rows($lophoc)> 0){
                        while($row = mysqli_fetch_assoc($lophoc)) {
                        
                    ?>
                    <option value="<?php echo $row['Malop'] ?>">
                        <?php echo $row['Tenlop'] ?>
                    </option>
                    <?php  } }?>
                </select>
                <br><br>
                <label>Điện thoại</label>
                <input type="tel" class="form-control" name="txtDienthoai" value="<?php echo $dt ?>">
                <br><br>
                <label>Email</label>
                <input type="email" class="form-control" name="txtEmail" value="<?php echo $email ?>">
                <br><br>
                <label>Địa chỉ</label>
                <input type="text" class="form-control" name="txtDiachi" value="<?php echo $dc ?>">
                <br><br>
                <button type="submit" class="btn btn-primary" name="btnLuu">Lưu</button>
                <br><br>
                <button type="submit" class="btn btn-primary" name="btnBack">Thoát</button>
            </div>
        </form>
    </div>
</body>
</html>
