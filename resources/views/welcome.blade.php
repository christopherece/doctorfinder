<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>Doctors in your Area</title>
<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">     
    <!-- <link rel="stylesheet" href="css/style.css"> -->

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
        <a class="navbar-brand" href="#" style="color: white;">Search Doctors</a>
    </nav> 
     <div class="container search-wrapper">
               <div id="search-doctor" class="card card-body">
                   <h1 class="text-center" style="color: black;">Find a Doc </h1>

                   <div class="form-group">
                        <label for="name">Search by Name</label>
                        <input type="text" id="doc-name" class="form-control" placeholder="Search By Name"> 
                    </div>
                     
                   <div class="form-group">
                        <label for="category">Specialization</label>
                        <select class="form-control" id="specializations"></select>
                    </div>

                    <div class="form-group">
                        <button type="submitBtn" class="mt-5 form-control btn btn-success" id="submitBtn">Serach</button>
                    </div>
                   
               </div>  
               <div class="spinner text-center"></div>
               <div id="result" class="row mt-5"></div>
           </div>
            <p></p>
           <footer class="text-center bg-primary">
              Find a Doc | 2019 &copy; Topicute
           </footer>

          <script src="js/jquery.js"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>          <script src="js/specializationAPI.js"></script>
          <script src="js/doctorAPI.js"></script>
          <script src="js/ui.js"></script>
          <script src="js/app.js"></script>
           <style>
      
                footer, h1{
                     color: white;
                     height: 50px;
                     padding: 15px 0 0 0;
                }
           </style>

           <script type="text/javascript">
                $(document).on('click','.doc-profile', function(){

                    $('.modal-title').text('Dr. ' + $(this).data('surname') + ' ' + $(this).data('firstname'));
                    $('.details').text($(this).data('specialization'));
                    $('.contact_no').text($(this).data('contact_no'));
                    $('.working_hours').text($(this).data('workhours'));
                    $('#img').attr('src', $(this).data('img'));
                    $('#myModal').modal('show');
                });
           </script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Modal title</h3>
      </div>
      <div class="modal-body">
          <div class="row">
               <div class="col-xs-4"><img id="img"></div>
               <div class="col-xs-8">
                    <strong>Specialization:</strong> <div class="details">
                    </div>
                    <strong>Contact No:</strong><div class="contact_no">
                    </div>
                    <strong>Working Hours:</strong><div class="working_hours">
                    </div>
               <div>   
          </div>
      </div>
      
    </div>
  </div>
</div>
</body>
</html>