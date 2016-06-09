<?php
    if ($user)
    {
        ?>
        <h3>User</h3>
        <div class="result">
        <?php
        foreach ($user as $key => $value) {
            ?>
            <div class="result-member">
                <a href="<?php echo base_url().'personal/home/'.$value->username ?>" title=""><img src="<?php echo upload_url().'/avata/'.$value->avatalink ?>" width="35" height="35" alt=""><?php echo $value->name ?></a>
            </div>
            <?php
        }
        ?>
        </div>
        <?php
    }
    if ($album) {
        ?>
        <h3>Album</h3>
        <div class="result">
        <?php
            foreach ($album as $key => $value)
            {
                ?>
                <div class="result-member">
                    <a href="<?php echo base_url().'album/albumview/'.$value->id ?>" title=""><?php echo $value->name ?></a>
                </div>
                <?php
            }
        ?>
        </div>
        <?php
    }
?>