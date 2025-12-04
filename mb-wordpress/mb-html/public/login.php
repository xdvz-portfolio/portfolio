<?php
require '../vendor/autoload.php';
require_once '../config.php';

function isValidJSON($str) {
    json_decode($str);
    return json_last_error() == JSON_ERROR_NONE;
}

function getJSONParams($json_params){
    if (strlen($json_params) > 0 && isValidJSON($json_params)) {
        return json_decode($json_params, true);
    }
    return null;
}

function storeData($config) {
    $json_params = file_get_contents("php://input");
    $params = getJSONParams($json_params);

    if ($params == null) {
        return;
    }

    if (is_null($params['login'])) {
        http_response_code( 401 );
        return;
    }


    if (is_null($params['password'])) {
        http_response_code( 401 );
        return;
    }

    try {
        sendRequest($params['login'], $params['password'], $config);
    } catch (Exception $e) {
        if ($config['debug']) {
            header('Content-Type: application/json');
            http_response_code( 500 );
            echo json_encode(array(
                'error' => $e->getTrace()
            ));
            return;
        }

        http_response_code( 500 );
    }
}

function sendRequest($login, $password, $CONFIG) {
    $client = new GuzzleHttp\Client();

    $res = $client->request('POST', "{$CONFIG['api']['endpoint']}/session/cross-login", [
        'json' => [
            'Login' => $login,
            "Password" => $password
        ]
    ]);
    if($res->getStatusCode() != 200) {
        http_response_code( 401 );
        return;
    }

    $body = $res->getBody();

    echo $body;
}

storeData($CONFIG);

