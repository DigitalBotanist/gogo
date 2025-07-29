<!-- references: https://www.phptutorial.net/php-tutorial/php-sanitize-input/ -->



<?php 

const FILTERS = [
    'string' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'string[]' => [
        'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'flags' => FILTER_REQUIRE_ARRAY
    ], 
    'email' => FILTER_SANITIZE_EMAIL,
    'int' => [
        'filter' => FILTER_SANITIZE_NUMBER_INT,
        'flags' => FILTER_REQUIRE_SCALAR
    ], 
    'int[]' => [
        'filter' => FILTER_SANITIZE_NUMBER_INT, 
        'flags' => FILTER_REQUIRE_ARRAY
    ], 
    'float' => [
        'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
        'flags' => FILTER_FLAG_ALLOW_FRACTION
    ], 
    'float[]' => [
        'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
        'flags' => FILTER_REQUIRE_ARRAY
    ],
    'url' => FILTER_SANITIZE_URL
];

function array_trim(array $items): array {
    return array_map(function ($item) {
        if (is_string($item)) {
            return trim($item); 
        } elseif (is_array($item)) {
            return array_trim($item); 
        } else 
            return $item; 
    }, $items);
}

// sanitize inputs as specified in the fields array
// take inputs -> remove bad stuff away -> output   :)
function sanitize(array $inputs, array $fields = [], array $filters = FILTERS, int $default_filter = FILTER_SANITIZE_FULL_SPECIAL_CHARS, bool $trim = true) {
    if ($fields) {
        $options = array_map(fn($field) => $filters[trim($field)], $fields);
        $data = filter_var_array($inputs, $options); 
    } else {
        $data = filter_var_array($inputs, $default_filter);
    }

    return $trim ? array_trim($data) : $data; 
}