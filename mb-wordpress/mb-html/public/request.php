<?php
require '../vendor/autoload.php';
require_once '../config.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

Class Log {
    public static $log = null;

    public static function Init() {
        $log = new Logger('log');
        $log->pushHandler(new StreamHandler('../php.log', Logger::WARNING));
    }

    /**
     * @return Monolog\Logger
     */
    public static function getLog()
    {
        return self::$log;
    }
}

Log::Init();

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

    if (is_null($params['company-size'])) {
        $message = <<<MESSAGE
Компания: {$params["company"]}; 
Имя: {$params["first_name"]}; 
Фамилия: {$params["last_name"]}; 
E-mail: {$params["email"]}; 
Телефон: {$params["phone"]}; 
Регион: {$params["region"]}; 

Сообщение: 
{$params["message"]}
MESSAGE;
    } else {
        $message = <<<MESSAGE
Компания: {$params["company"]}; 
Имя: {$params["first_name"]}; 
Фамилия: {$params["last_name"]}; 
E-mail: {$params["email"]}; 
Телефон: {$params["phone"]}; 
Регион: {$params["region"]}; 
Тип компании: {$params["company-type"]}; 
Тариф: {$params["tariff"]}; 
Размер компании: {$params["company-size"]};
Период оплаты: {$params["period"]};
MESSAGE;
    }

    $ticket_type = $params['ticket-type'];
    $header = $params['header'];

    try {
        sendRequest($header, $message, $ticket_type, $config);
    } catch (Exception $e) {
        Log::getLog()->error($e);
        if ($config['debug']) {
            header('Content-Type: application/json');
            http_response_code( 500 );
            echo json_encode(array(
                'error' => $e->getTrace(),
                'message' => $e->getMessage()
            ));
            return;
        }

        http_response_code( 500 );
    }
}

function sendRequest($header, $message, $ticket_type, $CONFIG) {
    $client = new GuzzleHttp\Client();

    $res = $client->request('POST', "{$CONFIG['api']['endpoint']}/session/login", [
        'json' => [
            'Login' => $CONFIG['api']['login'],
            "Password" => $CONFIG['api']['password']
        ]
    ]);
    if($res->getStatusCode() != 200)
        return;

    $body = $res->getBody();
    $auth = json_decode($body->getContents());
    $token = $auth->auth_token;

    //'Подключение', 'Сообщение с сайта', 'Музыка с сайта', 'Тест с сайта'

    $res = $client->request('POST', "{$CONFIG['api']['endpoint']}/client/tickets", [
        'form_params' => [
            'Header' => $header,
            'Message' => $message,
            'TicketType' => $ticket_type
        ],
        'headers' => [
            'Authorization' => "Bearer $token"
        ]
    ]);

    if($res->getStatusCode() != 200)
        return;

    $body = $res->getBody();
    echo $body;
}

storeData($CONFIG);

