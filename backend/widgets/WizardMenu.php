<?php
/**
 * WizardMenu Class file
 *
 * @author    Chris Yates
 * @copyright Copyright &copy; 2015 BeastBytes - All Rights Reserved
 * @license   BSD 3-Clause
 * @package   Wizard
 */

namespace backend\widgets;

use Yii;
use yii\widgets\Menu;
use yii\helpers\ArrayHelper;

/**
 * WizardMenu class.
 * Creates a menu from the wizard steps.
 */
class WizardMenu extends \beastbytes\wizard\WizardMenu
{
    /**
     * @var string The CSS class for the current step
     */
    public $currentStepCssClass = 'selected';
    /**
     * @var array The item to be shown to indicate completion of the wizard.
     * e.g. ['label' => 'Done', 'url' => null]
     */
    public $finalItem;
    /**
     * @var string The CSS class for future steps
     */
    public $futureStepCssClass = 'disabled';
    /**
     * @var string The CSS class for past steps
     */
    public $pastStepCssClass = 'selected';
    /**
     * @var string The current step
     */
    public $step;
    /**
     * @var \beastbytes\wizard\WizardBehavior The Wizard
     */
    public $wizard;

    /**
     * Initialise the widget
     */
    public function init()
    {
        $route  = ['/'.$this->wizard->owner->route];
        $params = $this->wizard->owner->actionParams;
        $steps  = $this->wizard->steps;
        $index  = array_search($this->step, $steps);

        foreach ($steps as $key => $step) {
            $stepIndex = array_search($step, $steps);
            $params[$this->wizard->queryParam] = $step;

            if ($stepIndex == $index) {
                $active = true;
                $class  = $this->currentStepCssClass;
                $url    = array_merge($route, $params);
            } elseif ($stepIndex < $index) {
                $active = false;
                $class  = $this->pastStepCssClass;
                $url    = ($this->wizard->forwardOnly
                    ? null : array_merge($route, $params)
                );
            } else {
                $active = false;
                $class  = $this->futureStepCssClass;
                //$url    = '#';
                $url    = ($this->wizard->forwardOnly
                    ? null : array_merge($route, $params)
                );
            }

           $menu = '';
          
            $this->items[] = [
                'label'   => $this->wizard->stepLabel($step),
                'url'     => $url,
                'active'  => $active,
                //'options' => compact('class'),
                //'encodeLabels' => true,
                //'labelTemplate' =>'{label} Label',
                'template' => '<a href="{url}" class="'.$class.'" >
                            <span class="step_no">'.($key+1).'</span>
                            <span class="step_descr">
                               '.Yii::t('app','Step').' '.($key+1).'<br>
                              <small>{label}</small>
                          </span></a>',    
            ];

            if (!empty($this->finalItem)) {
                $this->items[] = $this->finalItem;
            }
        }
    }
  
  
    public function run(){
      return '<div id="wizard" class="form_wizard wizard_horizontal">'
         .Menu::widget([
           //'options' => ['class' => 'nav side-menu'],
           'options' => $this->options,
           'encodeLabels' => false,
           "activeCssClass" => "selectd",
           "items" => $this->items,
         ]).'</div>';
    }
}
