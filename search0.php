<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>个人论文管理系统</title>
</head>
<body>
<center>
	<?php include_once "menu0.php"; ?>
     <h3>查询论文</h3>
	 <form id="searchthesis" name="searchthesis" method="post" action="action0.php?action=search">
		<select name="op">
        <option value="论文名称" selected>论文名称</option>
        <option value="作者名">作者名</option>
        <option value="论文摘要">论文摘要</option>
        <option value="出版期刊">出版期刊</option>
        <option value="出版年份">出版年份</option>
        </select>
        <input type="text" name="keywords" value="" />
		<input type="submit" value="提交查询" />
	</form>
</center>
</body>
</html>
