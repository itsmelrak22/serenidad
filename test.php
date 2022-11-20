<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // if (window.top != window.self)  //-- Don't run on frames or iframes.
        // return;

        window.addEventListener ('load', function () {
            // setInterval (checkDB, 2000);
            setTimeout (checkDB, 2000);
        }, false);

        function checkDB(){
             /* Get from elements values */
            // var values = $(this).serialize();

            $.ajax({
                url: "test2.php",
                type: "get",
                // data: values ,
                success: function (response) {
                    response.forEach(element => {
                        console.log(element)
                    });
                    // You will get response from your PHP page (what you echo or print)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
            
        }

        function setTitle () {
            document.writeln('test');
        }
    </script>
</body>
</html>