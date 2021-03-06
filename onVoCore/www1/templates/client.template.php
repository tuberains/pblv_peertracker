
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <title>Child-Tracker</title>

    <link rel="stylesheet" href="include/bootstrap.min.css">

    <link rel="stylesheet" href="stylesheets/client.stylesheet.css">

</head>

<body
    ng-app="client_app"
    ng-controller="client_ctrl"
    ng-init="init ('<? echo $_GET['client_id']; ?>')">

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Child-Tracker</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
            </div>
        </div>
    </nav>

    <div class="content_container panel panel-default col-xs-12 col-sm-12 col-md-4 col-md-offset-4">

        <div class="panel-heading">CLIENT [ present: <strong>{{ client.distance == 0 ? 'LOST' : 'OK' }}</strong> ]</div>

        <div class="panel-body">

            <div class="img-rounded" style="background-image: url('<? echo Controller::$image_path; ?>/{{ client.image }}');"
                 ng-cloak
                 ng-if="client.image"></div>

            <form id="client_form" action="client.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="option" value="add">
                <input type="hidden" class="form-control" id="image_data" name="image_data">
                <input type="hidden" class="form-control" name="client_id"
                       ng-value="client.id">

                <div class="form-group">
                    <label for="client_name_input">Name</label>
                    <input type="text" class="form-control" name="name" id="client_name_input" placeholder="Name"
                           ng-value="client.name">
                </div>
		        <div class="form-group">
                    <label for="client_phone_input">Phone No.</label>
                    <input type="number" class="form-control" name="phone" id="client_phone_input" placeholder="Phone No."
                           ng-value="client.phone">
                </div>
                <div class="form-group">
                    <label for="client_image_input">Image</label>
                    <input type="file" name="image" id="client_image_input">
                    <p class="help-block"
                       ng-if="client.image">
                        Edit the name or change the image
                    </p>
                    <p class="help-block"
                       ng-if="!client.image">
                        Please choose a name and an image
                    </p>
                </div>
            </form>
            <button type="button" class="btn btn-default btn-lg" ng-click="resize_image_and_submit ();">Submit</button>

            <canvas id="image_canvas" style="display: none;"></canvas>

        </div>

    </div>

    <script src="include/jquery-2.2.1.min.js"></script>
    <script src="include/bootstrap.min.js"></script>
    <script src="include/angular.min.js"></script>

    <script src="angular/client.controller.js"></script>

</body>
</html>