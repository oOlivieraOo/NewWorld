<!DOCTYPE html>
<html>
<head>


	<title>New World</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="MDB_Free/css/mdb.min.css">
	<link rel="stylesheet" href="MDB_Free/css/bootstrap.min.css" />



    <script type="text/javascript" src="MDB_Free/js/jquery-3.2.1.min.js"></script>
     <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
     <script language="javascript">

        function divers()
        {
          $('label').on('click', function() {
            var label = $(this);
            var input = label.siblings('input')[0];

            label.addClass('active');
            input.focus();        
            }); 
            (function (){
              $('#itemslider').carousel({ interval: 3000 });
            }());

            (function(){
              $('.carousel-showmanymoveone .item').each(function(){
                var itemToClone = $(this);

                for (var i=1;i<6;i++) {
                  itemToClone = itemToClone.next();


                  if (!itemToClone.length) {
                    itemToClone = $(this).siblings(':first');
                  }


                  itemToClone.children(':first-child').clone()
                    .addClass("cloneditem-"+(i))
                    .appendTo($(this));
                }
              });
            }());
        }
        $(document).ready(function(){
          divers();
        });
    
        
       
    </script>
   
    <style rel="stylesheet">
        /* TEMPLATE STYLES */
        html,body {
           
           /* padding-bottom: 2rem;*/
        }
      /*  .widget-wrapper {
            padding-bottom: 2rem;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 2rem;
        }*/

        .navbar {
            background-color: transparent;
        }

        .top-nav-collapse {
            background-color: #304a74;
        }

        footer.page-footer {
            background-color: #304a74;
            margin-top: 2rem;
        }

        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #4285F4;
            }
        }

         .scrolling-navbar {
            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }

         .carousel {
            height: 50%;
        }

        @media (max-width: 776px) {
            .carousel {
                height: 100%;
            }
        }

        .carousel-item,
        .active {
            height: 100%;
        }

        .carousel-inner {
            height: 100%;
        }
        /*Caption*/

        .flex-center {
            color: #fff;
        }
        .navbar .btn-group .dropdown-menu a:hover {
            color: #000 !important;
        }
        .navbar .btn-group .dropdown-menu a:active {
            color: #fff !important;
        }

    </style>
</head>

<body>
<?php
	/*include("HautNW.php");*/
	include("menu.php");
	include("corps.php");
	include("toutenbas.php");
?>


<!-- chargement de jquery -->
<!-- SCRIPTS -->



    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="MDB_Free/js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="MDB_Free/js/mdb.min.js"></script>

<!-- fin des scripts -->

</body>

</html>