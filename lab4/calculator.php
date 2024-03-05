<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $expression = $_POST['expression'];
        $result = calculateExpression($expression);
        echo $result;
    } catch (Exception $e) {
        echo 'Error';
    }
}

function calculateExpression($expression) {
    try {
        $expression = str_replace(' ', '', $expression);
        return calculateAdditionAndSubtraction($expression);
    } catch (Exception $e) {
        throw new Exception();
    }
}

function calculateAdditionAndSubtraction(&$expression) {
    try {
        $result = calculateMultiplicationAndDivision($expression);

        while (strlen($expression) > 0) {
            $operator = $expression[0];
            
            if ($operator == '+' || $operator == '-') {
                $expression = substr($expression, 1);
                $num2 = calculateMultiplicationAndDivision($expression);

                if ($operator == '+') {
                    $result += $num2;
                } elseif ($operator == '-') {
                    $result -= $num2;
                }
            } else {
                break;
            }
        }

        return $result;
    } catch (Exception $e) {
        throw new Exception();
    }
}

function calculateMultiplicationAndDivision(&$expression) {
    try {
        $result = calculateNumber($expression);

        while (strlen($expression) > 0) {
            $operator = $expression[0];

            if ($operator == '*' || $operator == '/') {
                $expression = substr($expression, 1);
                $num2 = calculateNumber($expression);

                if ($operator == '*') {
                    $result *= $num2;
                } elseif ($operator == '/') {
                    if ($num2 == 0) {
                        throw new Exception();
                    }
                    $result /= $num2;
                }
            } else {
                break;
            }
        }

        return $result;
    } catch (Exception $e) {
        throw new Exception();
    }
}

function calculateNumber(&$expression) {
    try {
        $number = "";

        if ($expression[0] == "(") {
            $expression = substr($expression, 1);
            $number = calculateAdditionAndSubtraction($expression);
            $expression = substr($expression, 1); 
        } else {
            while (strlen($expression) > 0 && is_numeric($expression[0])) {
                $number .= $expression[0];
                $expression = substr($expression, 1);
            }
            $number = intval($number);
        }

        return $number;
    } catch (Exception $e) {
        throw new Exception();
    }
}
?>