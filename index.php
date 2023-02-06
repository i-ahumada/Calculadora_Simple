<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Calculadora</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="calc-container py-2">
            <form action="calculate.php" method="post">
                <div class="row mb-3 mt-2">
                    <div class="col-12 text-right">
                        <textarea class="h-100 w-100" type="text" name="display" id="display" placeholder="->"><?php 
                                if(isset($_GET['resultado'])) {
                                    echo $_GET['resultado'];
                                }
                                ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="" >
                    </div>
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="[]^[]" >
                    </div>
                    <div class="col-3">
                        <input class="w-100" type="button" value="CE" id="clear-everything">
                    </div>
                    <div class="col-3">
                        <input class="w-100" type="button" value="C" id="clear">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="1" >
                    </div>
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="2" >
                    </div>
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="3" >
                    </div>
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="+" >
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="4" > 
                    </div>
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="5" >
                    </div>
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="6" >
                    </div>
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="-" >
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="7" >
                    </div>
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="8" >
                    </div>
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="9" >
                    </div>
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="/" >
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <input class="w-100 calc-button"  type="button" value="00" >
                    </div>
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="0" >
                    </div>
                    <div class="col-3">
                        <input class="w-100" type="submit" value="=" id="equal-submit">
                    </div>
                    <div class="col-3">
                        <input class="w-100 calc-button" type="button" value="*" >
                    </div>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
    </body>
</html>