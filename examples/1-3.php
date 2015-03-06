<html>
<head>
<title>Greeting website</title>
</head>
<body>
<?php if(isset($_POST['name'])) {
echo "Hello, ".htmlspecialchars($_POST['name'])." How are you?.";
} ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
Enter your name: <input type="text" name="name" />
<input type="submit" value="send" />
</form>
</body>
</html>
