<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>для тестов</title>
</head>
<body>
<?php
echo preg_replace('#aaa(?<!b)#', '!', 'aaab aaab'). "<br>";
 
preg_match_all('#ab{5,}a#', 'aa aba abba abbba abbbba abbbbba', $matches); print_r($matches[0]). "<br>";

preg_match_all('#ab[be]a#', 'aba aca aea abba adca abea', $matches); print_r($matches[0]). "<br>";

echo preg_replace('#(\w)\1#', '!', 'aae xxz 33a');
?>

</body>
</html>