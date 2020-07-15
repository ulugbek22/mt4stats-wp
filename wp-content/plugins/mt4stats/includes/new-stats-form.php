<form action="" id="primaryPostForm" method="POST">
    <fieldset>
        <label for="postTitle"><?php _e('Stats Title:', 'teacherbot') ?></label>
        <input type="text" name="statsTitle" id="postTitle" class="required" />
    </fieldset>
    <fieldset>
        <label for="postContent"><?php _e('Post Content:', 'teacherbot') ?></label>
        <textarea name="statsContent" id="postContent" rows="8" cols="30" class="required"></textarea>
    </fieldset>
    <fieldset>
        <input type="hidden" name="submitted" id="submitted" value="true" />
        <button type="submit"><?php _e('Add Stats', 'teacherbot') ?></button>
    </fieldset>
</form>