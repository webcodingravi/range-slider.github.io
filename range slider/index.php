<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Search with range using php & ajex</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

    <link href="css/style.css" rel="stylesheet" type="text/css">
  
   
</head>


<body>


<div class="header">
<div class="container">
<div class="row">
<div class="col-12">
  <h1 class="mb-5">Search with Range Slider using PHP & Ajex</h1>
  <div id="slider_wrap">
  <div>
<label class="mb-3">Age Between:</label>
<span id="age"></span>
  </div>
  <div id="slider-range"></div>
  </div>

<div id="content" class="mt-4">
  <table id="table-data" class="table table-bordered">
 <thead class="bg-primary text-white">
  <th>Id</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Age</th>
  <th>city</th>
  <thead>
 <tbody></tbody>
  </table>
</div>



</div>
</div>
</div>

</div>




<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <script>
 $(document).ready(function() {
   var v1 = 15;
   var v2 = 25;

  $( "#slider-range" ).slider({
      range: true,
      min: 13,
      max: 30,
      values: [ v1, v2 ],
      slide: function( event, ui ) {
        $( "#age" ).html(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        v1 = ui.values[ 0 ];
        v2 = ui.values[ 1 ];
        loadTable(v1, v2);
      }
    });
    $( "#age" ).html($( "#slider-range" ).slider( "values", 0 ) +
      " - " + $( "#slider-range" ).slider( "values", 1 ) );

      function loadTable(range1, range2){
          $.ajax({
            url : "get-data.php",
            type : "POST",
            data : {range1: range1, range2: range2},
            success: function(data) {
              $("#table-data tbody").html(data);
            }
          });
      }
      loadTable(v1, v2);

 });


    </script>



</body>
</html>