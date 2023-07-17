<!DOCTYPE html>
<html>
<body>

<h2>HTML Forms</h2>

<form action="<?php echo route('user.store')?>" method ="POST">
    @csrf
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" value=""><br>
  <label for="email ">Email:</label><br>
  <input type="text" id="email" name="email" value=""><br>
  <label for="password">PassWord:</label><br>
  <input type="text" id="password" name="password" value=""><br><br>
  <input type="submit" value="Submit">
</form>

<p>If you click the "Submit" button, the form-data will be sent to a page called "/action_page.php".</p>

</body>
</html>
