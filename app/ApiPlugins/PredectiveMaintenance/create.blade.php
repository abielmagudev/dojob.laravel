@include('api_plugins.components.header', ['api_plugin' => $api_plugin])
<div class="m-3">
    <div class="mb-3">
        <?php $textarea_todo_id = $api_plugin->generateElementId('textareaToDo') ?>
        <label for="{{ $textarea_todo_id }}" class="form-label">To do</label>
        <textarea name="{{ $api_plugin->generateInputName('todo') }}" id="{{ $textarea_todo_id }}" cols="30" rows="3" class='form-control' required></textarea>
    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col-sm">
                <?php $input_initial_period_id = $api_plugin->generateElementId('inputInitialPeriod')  ?>
                <label for="{{ $input_initial_period_id }}" class="form-label">Initial period</label>
                <input type='date' value="{{ date('Y-m-d') }}" name="{{ $api_plugin->generateInputName('initial_period') }}" id="{{ $input_initial_period_id }}" class='form-control' required>
            </div>
            <div class="col-sm">
                <?php $input_each_period_number_id = $api_plugin->generateElementId('inputEachPeriodNumber') ?>
                <label for="{{ $input_each_period_number_id }}" class="form-label">Each period</label>
                <input type="number" value='1' name="{{ $api_plugin->generateInputName('each_period_number') }}" id="{{ $input_each_period_number_id }}" class='form-control' step='1' min='1' required>
            </div>
            <div class="col-sm">
                <?php $input_each_period_context_id = $api_plugin->generateElementId('inputEachPeriodContext') ?>
                <label for="{{ $input_each_period_context_id }}" class="form-label">&nbsp;</label>
                <select name="{{ $api_plugin->generateInputName('each_period_context') }}" id="{{ $input_each_period_context_id }}" class='form-select' required>
                    <option value="year">Year(s)</option>
                    <option value="month">Month(s)</option>
                    <option value="day">Day(s)</option>
                </select>
            </div>
        </div>
    </div>
</div>
<br>
