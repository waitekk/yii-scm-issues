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
<?php $this->widget('bootstrap.widgets.BootNavbar', array(
    'fixed'=>true,
    'brand'=>Yii::app()->name,
    'brandUrl'=>'/',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.BootMenu',
            'items'=>array(
                //
            ),
        ),
        '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
        array(
            'class'=>'bootstrap.widgets.BootMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>
<div class="container">
    <?php
    if(Yii::app()->getRequest()->requestUri != '/')
    {
        $this->widget('bootstrap.widgets.BootBreadcrumbs', array(
            'homeLink'=>array('label'=>'На сайт','url'=>'/'),
            'links'=>$this->breadcrumbs,
        ));
    }
    ?>
    <?php echo $content; ?>
</div>
</body>
</html>