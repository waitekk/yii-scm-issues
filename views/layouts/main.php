<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?
    Yii::app()->clientScript->registerCssFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('bootstrap.assets')).'/css/bootstrap.min.css');
    ?>
</head>

<body>
<div class="container">
    <h1 style="margin:25px auto;"><?php echo Yii::t('issues', 'Issues tracker');?></h1>
    <?php
    if(Yii::app()->getRequest()->requestUri != '/')
    {
        $this->widget('bootstrap.widgets.BootBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
        ));
    }
    ?>
    <?php echo $content; ?>
</div>
</body>
</html>