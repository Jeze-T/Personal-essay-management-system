 <html>
 <head>
     <meta charset="UTF-8">
     <title>个人论文管理系统</title>
 
 </head>
 <body>
 <center>
     <?php
     include_once"menu0.php";
     //1.连接数据库
     try{
         $pdo = new PDO("mysql:host=localhost;dbname=ptms;","root","root");
     }catch(PDOException $e){
         die("数据库连接失败".$e->getMessage());
     }
     //2.防止中文乱码
     $pdo->query("SET NAMES 'UTF8'");
     //3.拼接sql语句，取出信息
     $sql = "SELECT * FROM thesis";
     $stmt = $pdo->query($sql);//返回预处理对象
     if($stmt->rowCount()>0){
         $thesis = $stmt->fetch(PDO::FETCH_ASSOC);//按照关联数组进行解析
     }else{
         die("没有要修改的数据！");
     }
     ?>
     <form id="editthesis" name="editthesis" method="post" action="action0.php?action=edit">
        <input type="hidden" name="id" id="id" value="<?php echo $thesis['id'];?>"/>
         <table>
            <tr>
                 <td>id</td>
                 <td><input id="id" name="id" type="text" value="<?php echo $thesis['id']?>"/></td>
             </tr>
             <tr>
                 <td>论文名称</td>
                 <td><input id="论文名称" name="论文名称" type="text" value="<?php echo $thesis['论文名称']?>"/></td>
             </tr>
             <tr>
                 <td>作者名</td>
                 <td><input id="作者名" name="作者名" type="text" value="<?php echo $thesis['作者名']?>"/></
                 </td>
             </tr>
             <tr>
                 <td>论文摘要</td>
                 <td><input id="论文摘要" name="论文摘要" type="text" value="<?php echo $thesis['论文摘要']?>"/></td>
             </tr>
             <tr>
                 <td>出版期刊</td>
                 <td><input id="出版期刊" name="出版期刊" type="text" value="<?php echo $thesis['出版期刊']?>"/></td>
            </tr>
            <tr>
                 <td>出版年份</td>
                 <td><input id="出版年份" name="出版年份" type="text" value="<?php echo $thesis['出版年份']?>"/></td>
            </tr>
            <tr>
                 <td>论文链接</td>
                 <td><input id="论文链接" name="论文链接" type="text" value="<?php echo $thesis['论文链接']?>"/></td>
            </tr>
             <tr>
                 <td>&nbsp;</td>
                 <td><input type="submit" value="修改"/>&nbsp;&nbsp;
                     <input type="reset" value="重置"/>
                 </td>
             </tr>
         </table>
 
     </form>
 
 
 
 </center>
 </body>
 </html>
