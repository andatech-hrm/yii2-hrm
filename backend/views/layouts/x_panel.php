<?php
use yii\helpers\Html;
?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<?php
$menus = \andahrm\setting\models\Setting::getTypes();
$request = Yii::$app->request;
?>
<div class="x_panel tile">
    <div class="x_title">
        <h2><?= $this->title; ?></h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <?php echo $content; ?>
        <div class="clearfix"></div>
    </div>
</div>

<?php $this->endContent(); ?>
