@extends('master')


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Best cool wacky phone site!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }

    /* Remove the jumbotron's default bottom margin */
     .jumbotron {
      margin-bottom: 0;
    }

    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f4f2f3;
      padding: 25px;
    }
  </style>
</head>
<body>
  @section('content')


<div class="jumbotron">
  <div class="container text-center">
    <h1>Cool Phone Store</h1>
    <p>Sick, Lit & Sebbe</p>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-10">
        <h1>Newest Phone!</h1>
        <div class="panel-body"><img src="{{ $product->image }}" class="img-responsive" style="width:100%" alt="Image"></div>

      </div>
    </div>
  </div>
</div><br><br>

  @endsection


</body>
</html>
