<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>寻一下-找回密码</title>
	</head>
	<body>
		<h2>找回密码</h2>

		<div>
			点击下面的连接重新设置新密码: <br/>{{ URL::to('password/reset/'.$token) }}。<br/>
			连接将在{{ Config::get('auth.password.expire', 60) }} 分钟后过期。
		</div>
	</body>
</html>