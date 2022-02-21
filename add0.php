<html>
<head>
     <meta charset="UTF-8">
     <title>个人论文管理系统</title>
 </head>
 <body>
 <center>
     <?php include_once "menu0.php"; ?>
     <h3>增加论文信息</h3>
 
     <form id="addthesis" name="addthesis" method="post" action="action0.php?action=add">
         <table>
            <tr>
                 <td>id</td>
                 <td><input id="id" name="id" type="text"/></
                 </td>
             </tr>
             <tr>
                 <td>论文名称</td>
                 <td><input id="论文名称" name="论文名称" type="text"/></td>
 
             </tr>
             <tr>
                 <td>作者名</td>
                 <td><input id="作者名" name="作者名" type="text"/></
                 </td>
             </tr>
             <tr>
                 <td>论文摘要</td>
                 <td><input id="论文摘要" name="论文摘要" type="text"/></td>
             </tr>
             <tr>
                 <td>出版期刊</td>
                 <td><input id="出版期刊" name="出版期刊" type="text"/></td>
            </tr>
            <tr>
                 <td>出版年份</td>
                 <td><input id="出版年份" name="出版年份" type="text"/></td>
            </tr>
            <tr>
                 <td>论文链接</td>
                 <td><input id="论文链接" name="论文链接" type="text"/></td>
            </tr>
             <tr>
                 <td>&nbsp;</td>
                 <td><input type="submit" value="增加"/>&nbsp;&nbsp;
                     <input type="reset" value="重置"/>
                 </td>
             </tr>
         </table>
 
     </form>
 </center>
 </body>
 </html>