<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $experation = $_POST['expression'];
        $result = calculateExpression($experation);
        echo $result;
    } catch (Exception $e) {
        echo 'Error';
    }
}

function calculateExpression($experation) {
    try {
        $experation = str_replace(' ', '', $experation);
        return calculateAdditionAndSubtraction($experation);
    } catch (Exception $e) {
        throw new Exception('Error');
    }
}

function calculateAdditionAndSubtraction(&$experation) {
    try {
        $result = calculateMultiplicationAndDivision($experation);

        while (strlen($experation) > 0) {
            $operation = $experation[0];
            
            if ($operation == '+' || $operation == '-') {
                $experation = substr($experation, 1);
                $num2 = calculateMultiplicationAndDivision($experation);

                if ($operation == '+') {
                    $result += $num2;
                } elseif ($operation == '-') {
                    $result -= $num2;
                }
            } else {
                throw new Exception('Error');
            }
        }

        return $result;
    } catch (Exception $e) {
        throw new Exception('Error');
    }
}

function calculateMultiplicationAndDivision(&$experation) {
    try {
        $result = calculateNumber($experation);

        while (strlen($experation) > 0) {
            $operation = $experation[0];

            if ($operation == '*' || $operation == '/') {
                $experation = substr($experation, 1);
                $num2 = calculateNumber($experation);

                if ($operation == '*') {
                    $result *= $num2;
                } elseif ($operation == '/') {
                    if ($num2 == 0) {
                        throw new Exception('Error');
                    }
                    $result /= $num2;
                }
            } else {
                break;
            }
        }

        return $result;
    } catch (Exception $e) {
        throw new Exception('Error');
    }
}

function calculateNumber(&$experation) {
    try {
        $number = "";

        if ($experation[0] == "(") {
            $experation = substr($experation, 1);
            $number = calculateAdditionAndSubtraction($experation);
            $experation = substr($experation, 1);

            if ($number === "") {
                throw new Exception('Error');
            }
        } else {
            while (strlen($experation) > 0 && (is_numeric($experation[0]) || $experation[0] == '-')) {
                $number .= $experation[0];
                $experation = substr($experation, 1);
            }

            if ($number === "") {
                throw new Exception('Error');
            }

            $number = intval($number);
        }

        return $number;
    } catch (Exception $e) {
        throw new Exception('Error');
    }
}
?>