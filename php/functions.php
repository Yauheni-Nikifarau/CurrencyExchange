<?php
function render () {
    $data = getExcData();
    require_once ROOT . '/php/common_view.php';
};

function updateDb () {
    $curlQuery = curl_init();
    $curlOptions = [
        CURLOPT_URL => 'https://openexchangerates.org/api/latest.json?app_id=d308334086824cd3886e16e95342fb79',
        CURLOPT_RETURNTRANSFER => 1
    ];
    curl_setopt_array($curlQuery, $curlOptions);
    $curlResult = curl_exec($curlQuery);
    curl_close($curlQuery);
    $curlResult = json_decode($curlResult, true);
    $data = json_encode($curlResult['rates']);
    file_put_contents(ROOT . '/data/rates.json', $data);
};

function getExcData () {
    if (!file_exists(ROOT . '/data/rates.json') || (time() - filemtime(ROOT . '/data/rates.json')) > 3600) {
        updateDb();
    }
    $data = file_get_contents(ROOT . '/data/rates.json');
    $data = json_decode($data, true);
    return $data;
};

function responseAjax ($from, $to) {
    $data = getExcData();
    if (isset($data[$from]) && isset($data[$to])) {
        return $data[$to] / $data[$from];
    } else {
        return false;
    }
};
