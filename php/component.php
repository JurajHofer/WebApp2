
<?php

function component($tank_uid, $tank_price, $tank_tier, $tank_nationality, $tank_type, $tank_img) {
    $element = <<<END
    
    <div class="card">
            <div class="flex-containerColumns">
                <div>
                    <img src="$tank_img" alt="">
                </div>
                <div>
                    Tier $tank_tier $tank_nationality $tank_type $tank_uid
                </div>
                <div >
                    <div class="splitcontent">
                        <div class="centerflex">
                            <h2> $tank_price goldov</h2>
                        </div>
                        <button type="button" class="button">KÚPIŤ</button>
                    </div>
                </div>
            </div>
        </div>
    
    END;
    echo $element;
}