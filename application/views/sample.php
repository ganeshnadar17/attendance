<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/csc/bootstrap.min.css">
</head>

<table>

    <tr>
        <td>1</td>
        <td>getthis</td>
        <td onclick="$(this).parents("tr").find("td:eq(2)").html()">4</td>
        <td>5</td>
    </tr>

    <tr>
        <td>1</td>
        <td>getthis</td>
        <td onclick="$(this).parents("tr").find("td:eq(2)").html()">4</td>
        <td>5</td>
    </tr>

        <tr>
        <td>1</td>
        <td>getthis</td>
        <td onclick="$(this).parents("tr").find("td:eq(2)").html()">4</td>
        <td>5</td>
    </tr>

    <tr>
        <td>1</td>
        <td>getthis</td>
        <td onclick="$(this).parents("tr").find("td:eq(2)").html()">4</td>
        <td>5</td>
    </tr>   

</table>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

</body>
</html>