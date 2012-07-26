<table class="table">
    <tr>
        <td class="span1">#<?php echo $data->local_id ?></td>
        <td><h4><?php echo $data->title ?><br /><small><?php echo Yii::t('issues', 'Reported by')?> <?php echo $data->reported_by->first_name.' <a href="">'.$data->reported_by->username.'</a> '.$data->reported_by->last_name ?></small></h4>
    </tr>
</table>