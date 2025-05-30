<?php

function getFile($file)
{
    include_once($file);
}

function apalah()
{
    echo "khna biji 2025";
}

function testingFunc($function)
{
    try {
        if (is_string($function)) {
            $tes = new ReflectionFunction($function);
            if ($tes->getNumberOfParameters() == 0) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    } catch (Throwable $e) {
        return false;
    }
}

function createPublicAPI($value)
{
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    echo json_encode($value, JSON_PRETTY_PRINT);
}
function changeTitle($title)
{
    echo "<script>document.title = '$title'</script>";
}
