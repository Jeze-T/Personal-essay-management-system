 <?php
 //1.连接数据库
 try {
     $pdo = new PDO("mysql:host=localhost;dbname=ptms;", "root", "root");
 
 } catch (PDOException $e) {
     die("数据库连接失败" . $e->getMessage());
 }
 //2.防止中文乱码
 $pdo->query("SET NAMES 'UTF8'");
 //3.通过action的值进行对应操作
 switch ($_GET['action']) {
     case 'add':{   //增加操作
         $id = $_POST['id'];
         $论文名称 = $_POST['论文名称'];
         $作者名 = $_POST['作者名'];
         $论文摘要 = $_POST['论文摘要'];
         $出版期刊 = $_POST['出版期刊'];
         $出版年份 = $_POST['出版年份'];
         $论文链接 = $_POST['论文链接'];

         //写sql语句
                 $sql = "INSERT INTO thesis (id,论文名称,作者名,论文摘要,出版期刊,出版年份,论文链接) VALUES ('{$id}','{$论文名称}','{$作者名}','{$论文摘要}','{$出版期刊}','{$出版年份}','{$论文链接}')";
         $rw = $pdo->exec($sql);
         if ($rw > 0) {
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>"; 
             echo "<script> alert('增加成功');
                             window.location='index0.php'; //跳转到首页
                  </script>";
         } else {
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>"; 
             echo "<script> alert('增加失败');
                             window.history.back(); //返回上一页
                  </script>";
         }
         break;
     }


     case "del": {    //1.获取表单信息
         $id = $_GET['id'];
         $sql = "DELETE FROM thesis WHERE id={$id}";
         $pdo->exec($sql);
         header("Location:index0.php");//跳转到首页
         break;
     }


     case "edit" :{   //1.获取表单信息
         $id = $_POST['id'];
         $论文名称 = $_POST['论文名称'];
         $作者名 = $_POST['作者名'];
         $论文摘要 = $_POST['论文摘要'];
         $出版期刊 = $_POST['出版期刊'];
         $出版年份 = $_POST['出版年份'];
         $论文链接 = $_POST['论文链接'];
         $sql = "UPDATE thesis SET 论文名称='{$论文名称}',作者名='{$作者名}',论文摘要='{$论文摘要}',出版期刊='{$出版期刊}',出版年份='{$出版年份}',论文链接='{$论文链接}' WHERE id='{$id}'";
         $rw=$pdo->exec($sql);
         if($rw>0){
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>"; 
             echo "<script>alert('修改成功');window.location='index0.php'</script>";
         }else{
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>"; 
             echo "<script>alert('修改失败');window.history.back()</script>";
         }
           break;
     }


      case "search": {    //1.获取表单信息
        include_once "search0.php"; 
        $keywords = isset($_POST['keywords'])?$_POST['keywords']:'';
        $option = isset($_POST['op'])?$_POST['op']:'';
        if($option == 论文名称){
            $field = '论文名称';
        }elseif($option == 作者名){
            $field = '作者名';
        }elseif($option == 论文摘要){
            $field = '论文摘要';
        }elseif($option == 出版期刊){
            $field = '出版期刊';
        }elseif($option == 出版年份){
            $field = '出版年份';
        }else{
            $field = '论文名称';
        }

        if(!empty($keywords)){
            $sql = "SELECT * FROM thesis WHERE $field like '%{$keywords}%' ";
        }else{
            $sql = "SELECT * FROM thesis";
        }

        $keysArr = [];
        $result = $pdo->query($sql);
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
    //简单高亮显示
    // $row['username'] = str_replace($keywords, "<font color='red'>".$keywords."</font>",$row['username']);
    //高亮显示，不区分关键字的大小写
            $keywordArr = preg_split('/(?<!^)(?!$)/u',$row['$field']);
            foreach ($keywordArr as $key => $value) {
                if(strtoupper($keywords) == strtoupper($value)){
                    $keywordArr[$key] = "<font color='red'>".$value."</font>";
                }
            }
            $row['$field'] = join($keywordArr);
            $keysArr[] = $row;
        }    
        if(!empty($keywords)){
            echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>"; 
            echo " <center>查询关键词:<font color='red'>&nbsp;".$keywords."&nbsp;</font>结果! </center>";
        }
        $tableString = "<table width='500' border='1' cellpadding='5'>";
        $tableString .= "<tr bgcolor='orange'><th>id</th><th>论文名称</th><th>作者名</th><th>论文摘要</th><th>出版期刊</th><th>出版年份</th><th>论文链接</th></tr>";
        if(!empty($keysArr)){
            foreach ($keysArr as $key => $value) {
                $tableString .= "<tr><td>" . $value['id']. "</td><td>" . $value['论文名称'] . "</td><td>".$value['作者名']."</td><td>" . $value['论文摘要']. "</td><td>" . $value['出版期刊']. "</td><td>" . $value['出版年份']. "</td><td>" . $value['论文链接']. "</td></tr>";
            }
        }else{
            $tableString .="<tr><td colspan='3'>没有数据</td></tr>";
        }
        $tableString .= "</table>";
        echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>"; 
        echo  "<center>$tableString </center>";
         break;
     }
 
 }
