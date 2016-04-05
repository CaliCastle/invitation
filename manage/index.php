<?php include '../functions.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
<?php include 'head.php';?>
<title>邀请码管理</title>
</head>
<body>
       <?php include 'header.php'; ?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>邀请码管理</h3>
  	 <a onclick="addCode()" class="btn btn-primary" id="add-admin">添加邀请码</a>
<div class="panel">
  	<div class="panel-body no-padding">
    <table class="table table-striped">
      <thead>
        <tr class="success">
          <th class="col-lg-2">#</th>
          <th class="col-lg-6">邀请码</th>
          <th class="col-lg-2">日期</th>
          <th class="col-lg-2">状态</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $con = mysql_connect(DB_HOST,DB_ADMIN,DB_PWD);
            if ($con){
                mysql_select_db(DB_NAME);
                mysql_query("set names utf8;");
                $sql = "SELECT * FROM `invite_code`;";
                $result = mysql_query($sql);
        
                while($row = mysql_fetch_array($result)){
            ?>
                <tr id="row-<?php echo $row["id"]; ?>">
                    <th scope="row">
                        <?php echo $row["id"]; ?>
                    </th>
                    <th>
                        <?php echo $row["code"]; ?>
                    </th>
                    <th>
                        <?php echo $row["date"]; ?>
                    </th>
                    <th>
                        <?php echo $row["valid"] == 0 ? '已领' : '未领'; ?>
                    </th>
                    <th>
                </tr>
        <?php
                }
            }
          ?>
      </tbody>
    </table>
   </div>
  </div>
            </div>
   <script src="js/admin_action.js"></script>
   <script src="js/custom.js"></script>
   <script type="text/javascript">
        if(!getCookie('admin_cookie')){
            window.location.href="login.php";
        }
    </script>
<?php
    include 'footer.php';
?>