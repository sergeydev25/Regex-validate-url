<?php

$testUrls = [
    'http:\\test.dev',
    'http:/test.dev',
    'http/test.dev',
    'http://tes t.dev',
    'dsfgh',
    '321',
    'https://www.sdf.org',
    'http://test',
    'http://www.w3schools.com',
    'https://www.w3schools.com',
    'https://www.example.com:3306',
    'https://www.example.com:3306/fdfdf',
    'test.dev',
    'http://test.devhttp://test.dev/',
];

$regex = "#^" .
    // protocol identifier
    "(?:(?:https?|ftp):\\/\\/)?" .
    // user:pass authentication
    "(?:\\S+(?::\\S*)?@)?" .
    "(?:" .
    // IP address exclusion
    // private & local networks
    "(?!(?:10|127)(?:\\.\\d{1,3}){3})" .
    "(?!(?:169\\.254|192\\.168)(?:\\.\\d{1,3}){2})" .
    "(?!172\\.(?:1[6-9]|2\\d|3[0-1])(?:\\.\\d{1,3}){2})" .
    // IP address dotted notation octets
    // excludes loopback network 0.0.0.0
    // excludes reserved space >= 224.0.0.0
    // excludes network & broacast addresses
    // (first & last IP address of each class)
    "(?:[1-9]\\d?|1\\d\\d|2[01]\\d|22[0-3])" .
    "(?:\\.(?:1?\\d{1,2}|2[0-4]\\d|25[0-5])){2}" .
    "(?:\\.(?:[1-9]\\d?|1\\d\\d|2[0-4]\\d|25[0-4]))" .
    "|" .
    // host name
    "(?:(?:[a-z\\x{00a1}-\\x{ffff}0-9]-*)*[a-z\\x{00a1}-\\x{ffff}0-9]+)" .
    // domain name
    "(?:\\.(?:[a-z\\x{00a1}-\\x{ffff}0-9]-*)*[a-z\\x{00a1}-\\x{ffff}0-9]+)*" .
    // TLD identifier
    "(?:\\.(?:[a-z\\x{00a1}-\\x{ffff}]{2,}))" .
    ")" .
    // port number
    "(?::\\d{2,5})?" .
    // resource path
    "(?:\\/\\S*)?" .
    "$#ui"
;

foreach ($testUrls as $url) {
    if (!preg_match($regex, $url)) {
        echo "<div style='color: #ff0000'>$url is not a valid URL</div>";
    } else {
        echo "<div style='color: #008000'>$url is valid URL</div>";
    }
}
