<h2><?php echo Yii::t('issues', 'Issues')?></h2>
<?php
$this->widget('zii.widgets.CListView',
    array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view'
    )
);

$this->widget('JTimeAgo', array(
    'selector' => ' .timeago',
));
?>