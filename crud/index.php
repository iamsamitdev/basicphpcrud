<?php
require '../config/connectdb.php';

// เขียนคำสั่ง sql select member
$sql = "SELECT * FROM members";
$query = mysqli_query($connect, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURD</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <div class="jumbotron py-1">
        <h1 class="display-5">PHP CRUD</h1>
        <p class="lead">PHP Create Read Update Delete</p>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <h1>รายชื่อสมาชิก</h1>
            </div>
            <div class="col-6 text-right">
               <a href="#" class="btn btn-lg btn-success" data-toggle="modal" data-target="#modal-add">เพิ่มรายชื่อใหม่</a>
            </div>
        </div>

        <!-- สร้างตารางรายชื่อสมาชิก -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Tel</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($result = mysqli_fetch_assoc($query))
                {
                ?>
                <tr>
                    <td><?php echo $result['id'];?></td>
                    <td><?php echo $result['fullname'];?></td>
                    <td><?php echo $result['email'];?></td>
                    <td><?php echo $result['password'];?></td>
                    <td><?php echo $result['tel'];?></td>
                    <td><?php echo $result['status'];?></td>
                    <td class="text-right">
                        <a href="#del" class="btn btn-info" data-toggle="modal" data-target="#modelId" data-id="<?php echo $result['id'];?>">View</a>
                        <a href="#del" class="btn btn-warning" data-id="<?php echo $result['id'];?>">Edit</a>
                        <a href="#del" class="btn btn-danger" data-id="<?php echo $result['id'];?>">Delete</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- สร้าง popup modal -->
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Member Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-2">ID</div>
                        <div class="col-10 c1"></div>
                    </div>
                    <div class="row">
                        <div class="col-2">Fullname</div>
                        <div class="col-10 c2"></div>
                    </div>
                    <div class="row">
                        <div class="col-2">Email</div>
                        <div class="col-10 c3"></div>
                    </div>
                    <div class="row">
                        <div class="col-2">Password</div>
                        <div class="col-10 c4"></div>
                    </div>
                    <div class="row">
                        <div class="col-2">Tel</div>
                        <div class="col-10 c5"></div>
                    </div>
                    <div class="row">
                        <div class="col-2">Status</div>
                        <div class="col-10 c6"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal แสดงฟอร์มเพิ่มข้อมูล -->
    <!-- Modal -->
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ฟอร์มเพิ่มผู้ใช้ใหม่</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post" id="add_member_form">
                        <div class="form-group">
                            <label for="">Fullname</label>
                            <input type="text" name="fullname" id="fullname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tel</label>
                            <input type="text" name="tel" id="tel" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" name="status" id="status" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="button" id="btnSubmit" class="btn btn-success">บันทึกข้อมูล</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        // การเรียกใช้ฟังก์ชันของ jQuery
        $(function(){
            // การสร้างเหตุการณ์คลิ๊กปุ่ม view
            $(".btn-info").click(function(){
               // รับค่า id ของปุ่ม
               var member_id = $(this).attr("data-id");
               // alert(id);
               // ส่งข้อมูลไปยัง view_member_by_id.php
               $.ajax({
                    url:"view_member_by_id.php",
                    dataType:"json",
                    method:"GET",
                    data:{"id": member_id},
                    success: function(data){
                        // alert(JSON.stringify(data))
                        var result = JSON.parse(JSON.stringify(data));
                        // alert(result.fullname);
                        $('.c1').text(result.id);
                        $('.c2').text(result.fullname)
                        $('.c3').text(result.email)
                        $('.c4').text(result.password)
                        $('.c5').text(result.tel)
                        $('.c6').text(result.status)
                    }
               });
            });

            /// ======= จบส่วนของการดึงข้อมูลมาแสดงบน popup  =========

            /// ================ ส่วนของการลบข้อมูล  ==============
            $(".btn-danger").click(function(){
                conf = confirm("ยืนยันการลบรายการนี้ ?");
                if(conf){
                    // รับค่า id ของปุ่ม
                    var member_id = $(this).attr("data-id");
                    var $row = $(this).closest("tr");
                    // alert(id);
                    // ส่งข้อมูลไปยัง delete_member_by_id.php
                    $.ajax({
                        url:"delete_member_by_id.php",
                        method:"GET",
                        data:{"id": member_id},
                        success: function(data){
                        if(data=="delete success"){
                            alert("ลบรายการเรียบร้อยแล้ว");
                            // ลบแถวที่คลิ๊กออกจากตาราง
                            $row.remove();
                        }else{
                                alert("มีข้อผิดพลาด " + data);
                        }
                        }
                    });
                }
            });


            /// ================ ส่วนของการบันทึกข้อมูลใหม่  ==============
            $("#btnSubmit").click(function(){
                // รับค่าจากฟอร์ม
                var fullname = $("input#fullname").val();
                var email = $("input#email").val();
                var password = $("input#password").val();
                var tel = $("input#tel").val();
                var status = $("input#status").val();
                $.ajax({
                        url:"add_new_member.php",
                        method:"POST",
                        data:{
                            "fullname": fullname,
                            "email":email,
                            "password":password,
                            "tel":tel,
                            "status":status
                        },
                        success: function(data){
                            if(data=="add success"){
                                alert("เพิ่มรายการเรียบร้อยแล้ว");
                                // เรียกข้อมูลมาใหม่มาแสดงในตาราง
                                $.getJSON( "select_new_member.php", function( jsondata ) {
                                    // console.log(jsondata);
                                    //console.log(jsondata.email);
                                    var trstring = `
                                                        <tr>
                                                        <td>${jsondata.id}</td>
                                                        <td>${jsondata.fullname}</td>
                                                        <td>${jsondata.email}</td>
                                                        <td>${jsondata.password}</td>
                                                        <td>${jsondata.tel}</td>
                                                        <td>${jsondata.status}</td>
                                                        <td class="text-right">
                                                            <a href="#del" class="btn btn-info" data-toggle="modal" data-target="#modelId" data-id="${jsondata.id}">View</a>
                                                            <a href="#del" class="btn btn-warning" data-id="${jsondata.id}">Edit</a>
                                                            <a href="#del" class="btn btn-danger" data-id="${jsondata.id}">Delete</a>
                                                        </td>
                                                    </tr>
                                                    `
                                    $("table tbody").append(trstring);
                                    // Clear ค่าในฟอร์ม
                                    $('form#add_member_form').trigger('reset');
                                    // Focus to membe name
                                    $('input#fullname').focus();
                                });
                            }else{
                                    alert("มีข้อผิดพลาด " + data);
                            }
                        }
                });
            });



        });
    </script>

</body>
</html>