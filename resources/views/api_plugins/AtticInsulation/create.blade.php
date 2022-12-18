@include('api_plugins.components.header', ['api_plugin' => $api_plugin])
<?php $config = include( resource_path('views/api_plugins/AtticInsulation/config.php') ) ?>
<div class="m-3">
    <div class="row">
        <div class="col-sm">
            <?php $select_method_id = $api_plugin->generateElementId('selectMethod') ?>
            <label for="{{ $select_method_id }}" class="form-label">Method</label>
            <select name="{{ $api_plugin->generateInputName('method') }}" id="{{ $select_method_id }}" class="form-select">
                <option disabled selected label='Select method...'></option>
                @foreach($config as $method => $rvalues)
                <option value="{{ $method }}">{{ ucfirst($method) }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm">
            <?php $select_rvalue_id = $api_plugin->generateElementId('selectRValue') ?>
            <label for="{{ $select_rvalue_id }}" class="form-label">R-Value</label>
            <select name="{{ $api_plugin->generateInputName('rvalue') }}" id="{{ $select_rvalue_id }}" class='form-select'>
                <option disabled selected label='Select R-Value'></option>
                @foreach($config as $method => $rvalues)
                    <optgroup label='{{ ucfirst($method) }}'>
                        @foreach($rvalues as $rvalue => $score)
                        <option value="{{ $rvalue }}" data-score="{{ $score }}">{{ ucfirst($rvalue) }}</option>  
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>
        <div class="col-sm">
            <?php $input_squarefeets_id = $api_plugin->generateElementId('inputSquareFeets') ?>
            <label for="{{ $input_squarefeets_id }}" class="form-label">Square feets</label>
            <input type="number" name="{{ $api_plugin->generateInputName('square_feets') }}" id="{{ $input_squarefeets_id }}" min='0.01' step='0.01' class='form-control'>
        </div>
        <div class="col-sm">
            <?php $div_bagcounter_id = $api_plugin->generateElementId('bagCounter')  ?>
            <label for="{{ $div_bagcounter_id }}" class="form-label">Bags</label>
            <div id='{{ $div_bagcounter_id }}' class="form-control">0</div>
        </div>
    </div>
    <script id='<?= $api_plugin->generateElementId('script') ?>'>
    const selectMethod = {
        element: document.getElementById('<?= $select_method_id ?>'),
        listen: function () {
            this.element.addEventListener('change', function (e) {
                alert(e.target.value)
            })
        }
    }
    selectMethod.listen()
    </script>
</div>
<br>
