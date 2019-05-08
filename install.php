<?php

$result = mkdir(__DIR__ . '/app/order/ordersfile/', 0777, true);

if ($result) {
    echo "Install success!";
} else {
    echo "Install error!";
}
