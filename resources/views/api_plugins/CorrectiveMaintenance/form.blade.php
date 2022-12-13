<div id="plugin{{ $api_plugin->hashed }}">
    <p class='mb-1'><em>{{ $api_plugin->name }}</em></p>
    <div class="mb-3">
        <label for="textareaIssues{{ $api_plugin->hashed }}" class="form-label">Issues</label>
        <textarea name="issues_{{ $api_plugin->hashed }}" id="textareaIssues{{ $api_plugin->hashed }}" cols="30" rows="3" class='form-control' required></textarea>
    </div>
    <div class="mb-3">
        <label for="textareaFixes{{ $api_plugin->hashed }}" class="form-label">Fixes</label>
        <textarea name="fixes_{{ $api_plugin->hashed }}" id="textareaFixes{{ $api_plugin->hashed }}" cols="30" rows="3" class='form-control'></textarea>
    </div>
</div>
