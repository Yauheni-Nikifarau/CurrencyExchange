let $input = document.querySelector('#input-from'),
    $from = document.querySelector('#select-from'),
    $to = document.querySelector('#select-to'),
    $res = document.querySelector('#result');
console.log($input);
let exchangeAction = async function () {
    let $url = `/?from=${$from.value}&to=${$to.value}`;
    console.log($url);
    let response = await fetch($url);
    $exchangeValue = (await response.text()) * $input.value;
    $res.textContent = $exchangeValue.toFixed(4);
}
$input.addEventListener('change', exchangeAction);
$from.addEventListener('change', exchangeAction);
$to.addEventListener('change', exchangeAction);