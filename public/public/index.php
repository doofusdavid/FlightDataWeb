<?php

/******************************* LOADING & INITIALIZING BASE APPLICATION ****************************************/

// Configuration for error reporting, useful to show every little problem during development
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Load Composer's PSR-4 autoloader (necessary to load Slim, Mini etc.)
require '../vendor/autoload.php';

// Initialize Slim (the router/micro framework used)
$app = new \Slim\Slim();

// and define the engine used for the view @see http://twig.sensiolabs.org
$app->view = new \Slim\Views\Twig();
$app->view->setTemplatesDirectory("../Mini/view");

/******************************************* THE CONFIGS *******************************************************/

// Configs for mode "development" (Slim's default), see the GitHub readme for details on setting the environment
$app->configureMode('development', function () use ($app) {

    // pre-application hook, performs stuff before real action happens @see http://docs.slimframework.com/#Hooks
    $app->hook('slim.before', function () use ($app) {

        // SASS-to-CSS compiler @see https://github.com/panique/php-sass
        SassCompiler::run("scss/", "css/");

        // CSS minifier @see https://github.com/matthiasmullie/minify
        $minifier = new MatthiasMullie\Minify\CSS('css/style.css');
        $minifier->minify('css/style.css');

        // JS minifier @see https://github.com/matthiasmullie/minify
        // DON'T overwrite your real .js files, always save into a different file
        //$minifier = new MatthiasMullie\Minify\JS('js/application.js');
        //$minifier->minify('js/application.minified.js');
    });


});

// Configs for mode "production"
$app->configureMode('production', function () use ($app) {
    // Set the configs for production environment

});


/************************************ THE ROUTES / CONTROLLERS *************************************************/

// GET request on homepage, simply show the view template index.twig
$app->get('/', function () use ($app) {
    $app->render('index.twig');
});

$app->get('/intro', function() use ($app){
    $app->render('intro.twig');
});

$app->get('/flight_delay_per_day_of_month', function() use ($app){
    $app->render('flight_delay_per_day_of_month.twig');
});
$app->get('/flight_delay_per_day_of_week', function() use ($app){
    $app->render('flight_delay_per_day_of_week.twig');
});
$app->get('/flight_delay_per_month', function() use ($app){
    $app->render('flight_delay_per_month.twig');
});
$app->get('/flight_delay_per_day_of_week', function() use ($app){
    $app->render('flight_delay_per_day_of_week.twig');
});
$app->get('/flight_delay_per_number_of_flights', function() use ($app){
    $app->render('flight_delay_per_number_of_flights.twig');
});
$app->get('/flight_average_delay_by_reason', function() use ($app){
    $app->render('flight_average_delay_by_reason.twig');
});
$app->get('/flight_delay_reasons', function() use ($app){
    $app->render('flight_delay_reasons.twig');
});
$app->get('/airport_average_delay', function() use ($app){
    $app->render('airport_average_delay.twig');
});
$app->get('/airport_bottom50_count_delayed', function() use ($app){
    $app->render('airport_bottom50_count_delayed.twig');
});
$app->get('/airport_top50_count_delayed', function() use ($app){
    $app->render('airport_top50_count_delayed.twig');
});
$app->get('/airport_top50_percent_delayed', function() use ($app){
    $app->render('airport_top50_percent_delayed.twig');
});
$app->get('/dst_average_delay_per_year', function() use ($app){
    $app->render('dst_average_delay_per_year.twig');
});
$app->get('/dst_percent_delay_per_year', function() use ($app){
    $app->render('dst_percent_delay_per_year.twig');
});
$app->get('/tail_number_top50_average_delay', function() use ($app){
    $app->render('tail_number_top50_average_delay.twig');
});
$app->get('/tail_number_top50_percent', function() use ($app){
    $app->render('tail_number_top50_percent.twig');
});
$app->get('/aggregate_flight_cancellation_counts', function() use ($app){
    $app->render('aggregate_flight_cancellation_counts.twig');
});
$app->get('/cancelled_flights_vs_active_airlines', function() use ($app){
    $app->render('cancelled_flights_vs_active_airlines.twig');
});
$app->get('/reasons_for_cancellation', function() use ($app){
    $app->render('reasons_for_cancellation.twig');
});
$app->get('/distance_impact', function() use ($app){
    $app->render('distance_impact.twig');
});

/******************************************* RUN THE APP *******************************************************/

$app->run();

