<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>

<h2>A basic HTML table</h2>

<table style="width:100%">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Password</th>
  </tr>
  @foreach ($users as $key => $value)

  <tr>
    <td>{{$value->name}}</td>
    <td>{{$value->email}}</td>
    <td>{{$value->password}}</td>
  </tr>
  @endforeach

</table>

<p>To understand the example better, we have added borders to the table.</p>

</body>
</html>