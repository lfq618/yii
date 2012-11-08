<?php

/**
 * Description of index
 *
 * @author Aleksei Prokopov <a.prokopov@edss.ee>
 */
?>
<div class="alert alert-info">
        <strong>Heads up!</strong>
        You must manage the position of a pinned element and the behavior of its immediate parent. Position is
        controlled by <code>affix</code>, <code>affix-top</code>, and <code>affix-bottom</code>. Remember to check for a
        potentially collapsed parent when the affix kicks in as it's removing content from the normal flow of the page.
    </div>
<?

$this->widget('bootstrap.widgets.TbJsonGridView',
              array(
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'type'         => 'striped bordered condensed',
    'summaryText'  => false,
    'cacheTTL'     => 10, // cache will be stored 10 seconds (see cacheTTLType)
    'cacheTTLType' => 's', // type can be of seconds, minutes or hours
    'columns'      => array(
        'id',
        'username',
//        array(
//            'name' => 'create_time',
//          //  'type' => 'datetime'
//        ),
        array(
            'header'   => Yii::t('ses', 'Edit'),
            'class'    => 'bootstrap.widgets.TbJsonButtonColumn',
            'template' => '{view} {delete}',
        ),
    ),
));
?>