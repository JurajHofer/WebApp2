
<?php

function component($tank_uid, $tank_price, $tank_tier, $tank_nationality, $tank_type, $tank_img, $tank_id) {
    $element = <<<END
    
    <div class="card">
        <form action="premiovyObchod.php" method="post">
            <div class="flex-containerColumns">
                <div>
                    <img src="$tank_img" alt="">
                </div>
                <div>
                    <h2> Tier $tank_tier $tank_nationality $tank_type $tank_uid </h2>
                    <hr>
                </div>
                <div >
                    <div class="splitcontent">
                        <div class="centerflex">
                            <p> $tank_price </p>
                            <div class ="icon2">
                                <img src="pictures/coin.png" alt="">
                            </div>
                        </div>
                        <button type="submit" name="kupit" class="button"> KÚPIŤ</button>
                        <input type="hidden" name="tank_id" value="$tank_id">
                        <input type="hidden" name="tank_price" value="$tank_price">
                        <input type="hidden" name="tank_id" value="$tank_id">
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    END;
    echo $element;
}