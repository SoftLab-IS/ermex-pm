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
    <?php foreach($users as $u): ?>
        <option value="<?php echo $u->usId; ?>" <?php echo ($u->usId == $selected) ? "selected" : ""; ?>><?php echo $u->realName . ' ' . $u->realSurname; ?></option>
    <?php endforeach; ?>
</select>