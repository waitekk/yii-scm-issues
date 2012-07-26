<table class="table">
    <tr>
        <td class="span1">#<?php echo $data['number'] ?></td>
        <td class="span1"><?php echo $data['state']?></td>
        <td><h4><?php echo $data['title'] ?><br /><small><?php echo Yii::t('issues', 'Reported by')?> <?php echo '<a href="'.$data['user']['url'].'">'.$data['user']['username'].'</a>';?>
            <time datetime="<?php echo $data['created_at'];?>" class="timeago"><?php echo $data['created_at'];?></time>
            (<?php echo Yii::t('issues', 'Comments:')?> <?php echo $data['comments']?>)</small></h4>
    </tr>
</table>