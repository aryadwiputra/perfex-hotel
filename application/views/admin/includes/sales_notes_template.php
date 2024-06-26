<?php defined('BASEPATH') or exit('No direct script access allowed');
$len = count($notes);
$i   = 0;
?>
<div id="sales-notes-wrapper" data-total="<?php echo e($len); ?>">
    <?php foreach ($notes as $note) { ?>
    <div class="media sales-note-wrapper">
        <div class="media-left">
            <a href="<?php echo admin_url('profile/' . $note['addedfrom']); ?>">
                <?php echo staff_profile_image($note['addedfrom'], ['staff-profile-image-small', 'media-object']); ?>
            </a>
        </div>
        <div class="media-body">
            <?php if ($note['addedfrom'] == get_staff_user_id() || is_admin()) { ?>
            <a href="#" class="pull-right text-danger"
                onclick="delete_sales_note(this,<?php echo e($note['id']); ?>);return false;">
                <i class="fa fa fa-times"></i>
            </a>
            <a href="#" class="pull-right mright5" onclick="toggle_edit_note(<?php echo e($note['id']); ?>);return false;">
                <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <?php } ?>
            <p class="media-heading tw-font-semibold tw-mb-0"><a
                    href="<?php echo admin_url('profile/' . $note['addedfrom']); ?>">
                    <?php echo e(get_staff_full_name($note['addedfrom'])); ?>
                </a>
            </p>
            <span class="tw-text-sm tw-text-neutral-500">
                <?php echo e(_dt($note['dateadded'])); ?>
            </span>
            <div data-note-description="<?php echo e($note['id']); ?>" class="text-muted mtop10">
                <?php echo process_text_content_for_display($note['description']); ?>
            </div>
            <div data-note-edit-textarea="<?php echo e($note['id']); ?>" class="hide mtop15">
                <?php echo render_textarea('note', '', $note['description']); ?>
                <?php if ($note['addedfrom'] == get_staff_user_id() || is_admin()) { ?>
                <div class="text-right">
                    <button type="button" class="btn btn-default"
                        onclick="toggle_edit_note(<?php echo e($note['id']); ?>);return false;">
                        <?php echo _l('cancel'); ?>
                    </button>
                    <button type="button" class="btn btn-primary" onclick="edit_note(<?php echo e($note['id']); ?>);">
                        <?php echo _l('update_note'); ?>
                    </button>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php if ($i >= 0 && $i != $len - 1) {
    echo '<hr />';
}
    ?>
    </div>
    <?php
$i++;
} ?>
</div>
