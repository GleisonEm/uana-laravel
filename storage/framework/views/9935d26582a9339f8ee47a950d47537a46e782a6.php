<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Vue Task App</title>
    <!-- CSRF Stuff -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script>
    window.Laravel = {
        csrfToken: '<?php echo e(csrf_token()); ?>'
    }
    </script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container" id='app'>
        pedro
        <login-page>
        </login-page>
    </div>
    <!-- Scripts -->

    
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>

</html>