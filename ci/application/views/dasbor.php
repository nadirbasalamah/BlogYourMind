<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
$nama = ($this->session->userdata['logged_in']['nama']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: login");
}
?>
<head>
<title>Admin Page</title>
</head>
<body>
<div id="profile">
<?php
echo "Hello <b id='welcome'><i>" . $nama . "</i> !</b>";
echo "<br/>";
echo "<br/>";
echo "Welcome to Admin Page";
echo "<br/>";
echo "<br/>";
echo "Your Username is " . $nama;
echo "<br/>";
echo "Your Email is " . $email;
echo "<br/>";
?>
<b id="logout"><a href="<?php echo base_url('index.php/user_authentication/logout'); ?>">Logout</a></b>
</div>
<br/>
</body>
</html>