<?php

/**
 * WUserList
 *
 * List current users in a drop down list.
 *
 * @author Aleksandar Panic
 */
 class WUserList extends CWidget
 {

    /**
     *  @var integer $selectedUserId ID which will be selected in option.
    **/
    public $selectedUserId = -1;

    /**
     *  @var integer $selectedPrivilegeLevel Privilege level of the user to which others will be offset.
    **/
    public $selectedPrivilegeLevel = -1;   

    /**
     * Main Widget Run function
     *
     * @author Aleksandar Panic
     *
    **/
    public function run()
    {
        $this->render('main', 
        array(
            'users' => Users::model()->onlyActive()->descByPrivilege()->findAll(),
            'selected' => $this->selectedUserId,
            'selectedPL' => $this->selectedPrivilegeLevel,
        ));
    }
 }