<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Indonesia News Classification</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/home.css')}}">
        <script type="text/javascript">
            $(document).ready(function(){
                $("#overlay-spinner").hide();
                $("#submit").click(function(event){
                    $("#overlay-spinner").fadeIn(300);　
                    $("#hasil").text("");
                    var text = $("#text").val();
                    $.ajax({
                        type:"POST",
                        url : "http://127.0.0.1:5000/",
                        data : {"text":text},
                        success: function(response){
                            setTimeout(function(){
                                $("#overlay-spinner").fadeOut(300);
                                $("#hasil").text("Kategori termasuk dalam : "+response);
                            },500);
                        },
                        error: function(xhr){
                            console.log(xhr);
                        }
                    })
                })
            });
        </script>
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="text-capitalize text-center">Indonesia News Classification</h1>
            <form id="form-data" name="form-data">
                <div class="form-group">
                    <label>Isi berita</label>
                    <textarea class="form-control" id="text" rows="6"></textarea>
                </div>
                <div class="form-group text-center">
                    <input type="button" class="btn btn-primary" id="submit" value="Submit">
                </div>
            </form>
            <div id="overlay-spinner">
                <div class="cv-spinner">
                    <span class="spinner"></span>
                </div>
            </div>
        </div>
            <p class="text-center" id="hasil"></p>
        </div>

    </body>
</html>
