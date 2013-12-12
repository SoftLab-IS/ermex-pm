<?php
/**
 * View for WUserList Widget
 *
 * @author Aleksandar
 *
 * @var $this CController Current controller which callled WUserList widget.
 * @var $users Users[] List of all users.
 * @var $selected integer Current selected user.
**/
?>

<select id="select-workers">
    <?php 
        foreach($users as $u):
        $role = ($u->privilegeLevel == 1) ? "radnik" : (($u->privilegeLevel == 2) ? "racunovodja" : (($u->privilegeLevel == 3) ? "administrator" : ""));
    ?>
        <option class="<?php echo $role; ?><?php echo ($u->privilegeLevel > $selectedPL) ? " higher-role" : ""; ?>" value="<?php echo $u->usId; ?>" <?php echo ($u->usId == $selected) ? "selected" : ""; ?>><?php echo $u->realName . ' ' . $u->realSurname; ?></option>
    <?php endforeach; ?>
</select>