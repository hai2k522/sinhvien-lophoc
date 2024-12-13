<?php 
include_once("./Connectdb1.php");
$msv=''; $ht=''; $ml=''; $gt=''; 
// Tạo câu lệnh sql lấy DL từ bảng lophoc đưa vào mảng $lophoc
$sql="Select * From Lophoc";
$lophoc=mysqli_query($con,$sql);

//Tìm kiếm 
if(isset($_POST["btnTimkiem"])){
    $msv=$_POST["txtMasinhvien"];
    $ht=$_POST['txtHoten'];
    $gt=$_POST['ddlGioitinh'];
    $ml=$_POST['ddlLophoc'];   }
    $sql1= "SELECT sinhvien.*,Tenlop FROM sinhvien,lophoc WHERE sinhvien.Malop=lophoc.Malop and Masinhvien like '%$msv%' 
           and Hoten like '%$ht%' and Gioitinh like '%$gt%' and sinhvien.Malop like '%$ml%'"; 
    $data=mysqli_query($con,$sql1);

if(isset($_POST["btnThemmoi"])){header("location:./Capnhatsinhvien.php");
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
        <form action="" method="post">
        <div class="form-group" style="width: 90%; padding-left: 150px;">
                <label>Mã sinh viên</label>
                <input type="text" class="form-control" name="txtMasinhvien" value="<?php echo $msv ?>">
                <br><br>
                <label>Họ và tên</label>
                <input type="text" class="form-control" name="txtHoten" value="<?php echo $ht ?>">
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
    
                <button type="submit" class="btn btn-primary" name="btnTimkiem">Tìm kiếm</button>
                <br><br>
                <button type="submit" class="btn btn-primary" name="btnThemmoi">Thêm mới</button>
            </div>
       
        </form>
       
        <table class="table table-striped" border="1">
   <thead>
      <tr>
         <th>STT</th>
         <th>Mã sinh viên</th>
         <th>Họ và tên</th>
         <th>Giới tính</th>
         <th>Mã lớp</th>
         <th>Tên lớp</th>
         <th>Điện thoại</th>
         <th>Email</th>
         <th>Địa chỉ</th>
         <th></th>
      </tr>
   </thead>
   <tbody>
   

    <?php 
    if(isset($data)&& mysqli_num_rows($data > 0)) {
        $i=1;
        while($row = mysqli_fetch_assoc($data)) { 
            ?>
         
      <tr>
         <td><?php echo $i++ ?></td>
         <td><?php echo $row['Masinhvien'] ?></td>
         <td><?php echo $row['Hoten'] ?></td>
         <td><?php echo $row['Ngaysinh'] ?></td>
         <td><?php echo $row['Gioitinh'] ?></td>
         <td><?php echo $row['Malop'] ?></td>
         <td><?php echo $row['Tenlop'] ?></td>
         <td><?php echo $row['Dienthoai'] ?></td>
         <td><?php echo $row['Email'] ?></td>
         <td><?php echo $row['Diachi'] ?></td>
         <td>
        <a href="">Sửa</a> &nbsp; &nbsp;
        <a href="">Xoá</a>
      </td>
      </tr>
      

      <?php
        }   }
    ?>
      <tr>
         <td>2</td>
         <td>C</td>
         <td>11.03%</td>
      </tr>
      <tr>
         <td>3</td>
         <td>C++</td>
         <td>5.60%</td>
      </tr>
   </tbody>
</table>
    </div>
</body>
</html>
