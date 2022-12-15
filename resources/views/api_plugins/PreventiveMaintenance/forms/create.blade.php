<div id="plugin{{ $api_plugin->hashed }}">
    <p class='mb-1'><em>{{ $api_plugin->name }}</em></p>
    <div class="mb-3">
        <label for="textareaToDo{{ $api_plugin->hashed }}" class="form-label">To do</label>
        <textarea name="todo_{{ $api_plugin->hashed }}" id="textareaToDo{{ $api_plugin->hashed }}" cols="30" rows="3" class='form-control' required></textarea>
    </div>
    <div class="mb-3">
        <label for="inputNext{{ $api_plugin->hashed }}" class="form-label">Next</label>
        <input type="date" name="next_{{ $api_plugin->hashed }}" id="inputNext{{ $api_plugin->hashed }}" class='form-control'>
        <div id="inputNextHelp{{ $api_plugin->hashed }}" class="form-text">Ignore this field if there is no next maintenance.</div>
    </div>
</div>
