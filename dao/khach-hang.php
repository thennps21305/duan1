<?php
require_once 'pdo.php';
// them kh trong phần đăng ký
function khachhang_insert( $mat_khau, $ho_ten, $email){
    $sql = "insert into khach_hang( mat_khau,ho_ten,email) values ('$mat_khau','$ho_ten','$email')";
    pdo_execute($sql);
}


// kiem tra  khach hang
 function checkusers($ma_kh){
    $sql = "select * from khach_hang where ma_kh= '$ma_kh'";
    pdo_execute($sql);

    
 }


 // hiện tất cả khach hàng
 function users(){
    $sql = "select * from khach_hang" ;
    return  pdo_query($sql);
 }

// Thêm khách hàng mới
function khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat,$vai_tro){
    $sql = "INSERT INTO khach_hang(ma_kh, mat_khau, ho_ten, email, hinh,kich_hoat,vai_tro) VALUES ('$ma_kh', '$mat_khau', '$ho_ten', '$email', '$hinh','$kich_hoat','$vai_tro')";
   pdo_execute($sql);
}

//Cập nhật thông tin 1 khách hàng
function khach_hang_update($ma_kh,$mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro){
 if($hinh!=""){
   $sql = "UPDATE khach_hang SET mat_khau='".$mat_khau."',ho_ten='".$ho_ten."',email='".$email."',hinh='".$hinh."',kich_hoat=$kich_hoat,vai_tro=$vai_tro WHERE ma_kh='". $ma_kh."'  ";
 }else{
   $sql = "UPDATE khach_hang SET mat_khau='".$mat_khau."',ho_ten='".$ho_ten."',email='".$email."',kich_hoat=$kich_hoat,vai_tro=$vai_tro WHERE ma_kh='". $ma_kh."'  ";
 }
    pdo_execute($sql);
}

// Xóa một hoặc nhiều khách hàng
function khach_hang_delete($ma_kh){
    $sql = "DELETE FROM khach_hang  WHERE ma_kh= '$ma_kh'";
    // if(is_array($ma_kh)){
    //     foreach ($ma_kh as $ma_kh) {
    //         pdo_execute($sql);
    //     }
    // }
    // else{
        pdo_execute($sql);
    // }
}

//Truy vấn một kháh hàng theo email
function khach_hang_select_by_id($email){
    $sql = "SELECT * FROM khach_hang where email='$email'";
    $kh=pdo_query_one($sql);
    return $kh ;
}

//Kiểm tra sự tồn tại của một khách hang3
function khach_hang_exist($email){
    $sql = "SELECT count(*) FROM khach_hang WHERE email='$email'";
    return pdo_query_value($sql) > 0;
}

// //Lấy danh sách kh theo vai trò
// function khach_hang_select_by_role($vai_tro){
//     $sql = "SELECT * FROM khachhang WHERE vai_tro=".$vai_tro;
//     return pdo_query($sql);
// }
//Cập nhật mật khẩu của 1 khách hàng
function khach_hang_change_password($ma_kh, $mat_khau_moi){
    $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
    pdo_execute($sql, $mat_khau_moi, $ma_kh);
}