<?php

function tankinfo($tank_uid, $tank_price, $tank_tier, $tank_nationality, $tank_type, $tank_img, $tank_id) {
    $element = <<<END

        <tr>
            <td>$tank_id</td>
            <td>$tank_uid</td>
            <td>$tank_price</td>
            <td>$tank_tier</td>
            <td>$tank_type</td>
            <td>$tank_nationality</td>
            <td>$tank_img</td>
        </tr>

    END;
    echo $element;
}
