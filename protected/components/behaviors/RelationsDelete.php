<?php

/**
 * Description of RelationsDelete
 *
 * @author Aleksei Prokopov <a.prokopov@edss.ee>
 */
class RelationsDelete extends CBehavior
{
    /**
     * Declares events and the event handler methods
     * See yii documentation on behavior
     */

    /**
     * Declares events and the event handler methods
     * See yii documentation on behavior
     */
    public function events()
    {
        return array_merge(parent::events(),
                           array(
                    'onBeforeDelete' => 'beforeDelete'
                ));
    }

//
//    /**
//     * Before deleting
//     * @param unknown_type $event
//     */
    public function beforeDelete($event)
    {
        $event->isValid = false; //$this->getCheckRelations(false);
        return true;
        //return FALSE;
    }

}