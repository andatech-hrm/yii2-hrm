<?php
use andahrm\structure\models\Structure;
use yii\helpers\Url;

//andahrm\structure\assets\JqueryOrg::register($this);
firdows\orgchart\OrgChartAsset::register($this);
andahrm\structure\assets\MyChartAsset::register($this);

?>


<div class="x_panel">
  <div class="x_title">
      <h2>โครงการองค์กร <small>โองการบริหารส่วนจังหวัดยะลา</small></h2>
      <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div id="content" style="margin-bottom:30px;">
            <div id="mainOrg" >
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<?php
//   $this->registerJs('
//     $(function() {
//             $("#organisation").orgChart({
//               container: $("#mainOrg"),
//               interactive: true,
//               fade: true,
//               speed: "slow",
//               stack    : true, 
//               depth    : 3
//             });
//     });
    
    
// ');
//print_r(Structure::getOrgJson());
$this->registerJs("
var urlOrg = '".Url::to(['/structure/default/org'])."';
");
$this->registerJs("
  $('#mainOrg').orgchart({
        'data' : urlOrg,
        'nodeContent': 'title',
        'exportButton': true,
        'exportFilename': 'MyOrgChart',
        'depth': 4,
        'verticalDepth': 4,
      });
");