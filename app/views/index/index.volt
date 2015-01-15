<!doctype html>
<html class="no-js" lang="en" data-ng-app="notes">

<head id="www-sitename-com" data-template-set="html5-reset">

    <meta charset="utf-8">
    <title>Angular.js : Advanced Design Patterns and Best Practices</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, maximum-scale=.5">

    <link rel="shortcut icon" href="img/favicon.ico">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:500,400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/tomorrow-night-eighties.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/base.css">

    <script src="lib/modernizr-1.7.min.js"></script>
    <script src="lib/jquery-1.7.2.min.js"></script>
    <script src="lib/class.js"></script>
    <script src="lib/namespace.js"></script>
    <script src="lib/highlight/highlight.pack.js"></script>
    <script src="lib/angular/angular.min.js"></script>

    <script src="js/app.js"></script>
    <script src="js/base/BaseController.js"></script>
    <script src="js/base/EventDispatcher.js"></script>
    <script src="js/base/Notifications.js"></script>
    <script src="js/notes/NotesController.js"></script>
    <script src="js/notes/NotesModel.js"></script>
    <script src="js/notes/NotesService.js"></script>
    <script src="js/slides/SlideController.js"></script>
    <script src="js/slides/SlideDirective.js"></script>
    <script src="js/navigation/NavigationDirective.js"></script>
    <script src="js/highlight/HighlightDirective.js"></script>

    <!--[if gte IE 9]>
    <style type="text/css">
        .gradient {
            filter: none;
        }
    </style>
    <![endif]-->
</head>

<body data-ng-controller="NotesController">
<div class="view">
    <div class="content ng-view">

    </div>
</div>

<div class="navigation" data-navigation="">
    <a class="icon-backward" data-ng-click="previousPage()"></a>
    <span>Use keyboard arrows to navigate</span>
    <a class="icon-forward" data-ng-click="nextPage()"></a>
</div>


</body>
</html>