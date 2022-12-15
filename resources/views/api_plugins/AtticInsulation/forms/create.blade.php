<?php 

$config = include(resource_path('views/api_plugins/AtticInsulation/config.php'));
$postfix = "_{$api_plugin->hashed}";

?>

<div id="plugin{{ $postfix }}">
    <p class='mb-1'><em>{{ $api_plugin->name }}</em></p>
    <div class="row">
        <div class="col-sm">
            <label for="selectMethod{{ $postfix }}" class="form-label">Method</label>
            <select name="method{{ $postfix }}" id="selectMethod{{ $postfix }}" class="form-select">
                <option disabled selected label='Select method...'></option>
                @foreach($config as $method => $rvalues)
                <option value="{{ $method }}">{{ ucfirst($method) }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm">
            <label for="selectRValue{{ $postfix }}" class="form-label">R-Value</label>
            <select name="rvalue{{ $postfix }}" id="selectRValue{{ $postfix }}" class='form-select'>
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
            <label for="inputSquareFeets{{ $postfix }}" class="form-label">Square feets</label>
            <input type="number" name="square_feets{{ $postfix }}" id="inputSquareFeets{{ $postfix }}" min='0.01' step='0.01' class='form-control'>
        </div>
        <div class="col-sm">
            <label for="bagCounter{{ $postfix }}" class="form-label">Bags</label>
            <div id='bagCounter{{ $postfix }}' class="form-control">0</div>
        </div>
    </div>
</div>
