<?php
require '../vendor/autoload.php';
$con = new mysqli("localhost","heshan", "Heshan@666",  "odi_live_score");

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);
// login

$app->post('/login', function ($request, $response, $args) {

    $username = $request->getParsedBodyParam('username', '');
    $password = $request->getParsedBodyParam('password', '');

    $payload = ['logged' => false];

    if ($username == "admin" && $password == "root") {
        setSession("admin", "1", "admin");
        $payload = ['logged' => true];
        return $response->withStatus(200)->withJson($payload);
    }

    return $response->withStatus(200)->withJson($payload);
});

//update-score

$app->post('/update-score', function ($request, $response, $args) {
    global $con;

    $team = $request->getParsedBodyParam('team');
    $description = $request->getParsedBodyParam('description');
    $score = $request->getParsedBodyParam('score');
    $wickets = $request->getParsedBodyParam('wickets');
    $overs = $request->getParsedBodyParam('overs');

    $con->query("UPDATE score SET runs = '$score', wickets = '$wickets', overs = '$overs' WHERE team = '$team'");

    return $response->withStatus(201)->withJson();
});

$app->get('/get-sum', function ($request, $response, $args){
    global $con;

    $_sum = $con->query("SELECT sum_col FROM sum_table WHERE id = 97");
    $sum = $_sum->fetch_assoc();
    return $response->withStatus(200)->withJson($sum);

});
try {
    $app->run();
} catch (\Slim\Exception\MethodNotAllowedException $e) {
} catch (\Slim\Exception\NotFoundException $e) {
} catch (Exception $e) {
    echo 'error';
}

