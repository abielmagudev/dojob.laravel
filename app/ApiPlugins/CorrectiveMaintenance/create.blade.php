@include('api_plugins.components.header', ['api_plugin' => $api_plugin])
<div class="m-3">
    <div class="mb-3">
        <?php $textarea_issues_id = $api_plugin->generateElementId('textareaIssues') ?>
        <label for="{{ $textarea_issues_id }}" class="form-label">Issues</label>
        <textarea name="{{ $api_plugin->generateInputName('issues') }}" id="{{ $textarea_issues_id }}" cols="30" rows="3" class='form-control' required></textarea>
    </div>
    <div class="mb-3">
        <?php $textarea_fixes_id = $api_plugin->generateElementId('textareaFixes') ?>
        <label for="{{ $textarea_fixes_id }}" class="form-label">Fixes</label>
        <textarea name="{{ $api_plugin->generateInputName('fixes') }}" id="{{ $textarea_fixes_id }}" cols="30" rows="3" class='form-control'></textarea>
    </div>
</div>
<br>
