<!DOCTYPE html>
<head>
     <meta charset="UTF-8">
     <title>个人论文管理系统</title>
     <script>
         function doDel(id) {
             if (confirm("确定要删除么？")) {
                 window.location = 'action0.php?action=del&id='+id;
             }
         }
     </script>
 </head>
 <body>
 <center>
     <?php include_once 'menu0.php';
     ?>
     <h3>浏览论文信息</h3>
     <table width="600" border="1">
         <tr>
             <th>id</th>
             <th>论文名称</th>
             <th>作者名</th>
             <th>论文摘要</th>
             <th>出版期刊</th>
             <th>出版年份</th>
             <th>论文链接</th>
         </tr>
         <?php
  //1.连接数据库
         try {
             $pdo = new PDO("mysql:host=localhost;dbname=ptms;", "root", "root");
         } catch (PDOException $e) {
             die("数据库连接失败" . $e->getMessage());
         }
         //2.解决中文乱码问题
         $pdo->query("SET NAMES 'UTF8'");
         //3.执行sql语句，并实现解析和遍历
         $sql = "SELECT * FROM thesis ";
         foreach ($pdo->query($sql) as $row) {
             echo "<tr>";
             echo "<td>{$row['id']}</td>";
             echo "<td>{$row['论文名称']}</td>";
             echo "<td>{$row['作者名']}</td>";
             echo "<td>{$row['论文摘要']}</td>";
             echo "<td>{$row['出版期刊']}</td>";
             echo "<td>{$row['出版年份']}</td>";
             echo "<td>{$row['论文链接']}</td>";
             echo "<td>
                     <a href='javascript:doDel({$row['id']})'>删除</a>
                     <a href='edit0.php?id=({$row['id']})'>修改</a>
                   </td>";
             echo "</tr>";
         }
 
         ?>
 
     </table>
 </center>
 
 </body>
 </html>