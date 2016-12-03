<!-- 
    Aplication header, with external and custom styles and simple menu, 
    included call to static method isLoged from Login class,
    just to show different menu items depending on if the user is loged in or not,
    if user is loged in show Sign out link, if not show Sign in link.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Randock Test</title>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    
</head>
<body>

    <!-- nav -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Randock Test</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (Login::isLoged()) : 
                ?>
                <li>
                    <a href="classes/controller.php?doLogOut">
                        <span class="label label-warning">Sign out</span>
                    </a>
                </li>
                <?php else : ?>
                <li>
                    <a href="#" data-toggle="modal" data-target="#login-modal">
                        <span class="label label-primary">Sign in</span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </nav>