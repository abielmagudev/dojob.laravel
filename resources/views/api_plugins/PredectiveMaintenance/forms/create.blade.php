<div id="plugin{{ $api_plugin->hashed }}">
    <p class='mb-1'><em>{{ $api_plugin->name }}</em></p>
    <div class="mb-3">
        <label for="textareaToDo{{ $api_plugin->hashed }}" class="form-label">To do</label>
        <textarea name="todo_{{ $api_plugin->hashed }}" id="textareaToDo{{ $api_plugin->hashed }}" cols="30" rows="3" class='form-control' required></textarea>
    </div>
    <div class="mb-3">
        <label for="inputInitialPeriod{{ $api_plugin->hashed }}" class="form-label">Initial period</label>
        <input type='date' value="{{ date('Y-m-d') }}" name="initial_period_{{ $api_plugin->hashed }}" id="inputInitialPeriod{{ $api_plugin->hashed }}" class='form-control' required>
    </div>
    <div class="mb-3">
        <label for="inputEachPeriodNumber{{ $api_plugin->hashed }}" class="form-label">Each period</label>
        <div class="row">
            <div class="col-sm">
                <input type="number" value='1' name="each_period_number_{{ $api_plugin->hashed }}" id="inputEachPeriodNumber{{ $api_plugin->hashed }}" class='form-control' step='1' min='1' required>
            </div>
            <div class="col-sm">
                <select name='each_period_context_{{ $api_plugin->hashed }}' id="selectEachPeriodContext{{ $api_plugin->hashed }}" class='form-select' required>
                    <option value="year">Year(s)</option>
                    <option value="month">Month(s)</option>
                    <option value="day">Day(s)</option>
                </select>
            </div>
        </div>
    </div>
</div>
