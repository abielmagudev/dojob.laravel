@include('api_plugins.components.header', ['api_plugin' => $api_plugin])
<div class="m-3">
    <div class="mb-3">
        <?php $textarea_todo_id = $api_plugin->generateElementId('textareaTodo') ?>
        <label for="{{ $textarea_todo_id }}" class="form-label">To do</label>
        <textarea name="{{ $api_plugin->generateInputName('todo') }}" id="{{ $textarea_todo_id }}" cols="30" rows="3" class='form-control' required></textarea>
    </div>
    <div class="mb-3">
        <?php $input_next_id = $api_plugin->generateElementId('inputNext') ?>
        <label for="{{ $input_next_id }}" class="form-label">Schedule next</label>
        <input type="date" name="{{ $api_plugin->generateInputName('next') }}" id="{{ $input_next_id }}" class='form-control'>
        <div id="{{ $api_plugin->generateElementId('inputNextHelp')}}" class="form-text">Ignore this field if there is no next maintenance.</div>
    </div>
</div>
<br>
