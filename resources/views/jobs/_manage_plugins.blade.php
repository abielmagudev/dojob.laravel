<x-modal id='modalManagePlugins' header='Manage plugins'>
<x-slot name='trigger' class='btn btn-primary'>Manage plugins</x-slot>
<form action="{{ route('jobs.plugins.connect', $job)  }}" method='post' id='formConnectJobPlugins'>
    <div class="table-responsive">
        <table class="table table-hover shadow-none">
            <tbody>
                @foreach($plugins as $plugin)
                <?php $switch_id = "switch{$plugin->id}" ?>
                <tr>
                    <td style='width:1%'>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch"  name='plugins[]' value='{{ $plugin->id }}' id="{{ $switch_id }}" {{ $job->hasPlugin($plugin) ? 'checked' : '' }}>
                        </div>
                    </td>
                    <td>
                        <label class="form-check-label" for="{{ $switch_id }}">
                            <span class='d-block'>{{ $plugin->api->name }}</span>
                            <small class='text-muted'>{{ $plugin->api->description }}</small>
                        </label>
                    </td>
                    <td>
                        <span>{{ $plugin->created_at }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @csrf
    @method('put')
</form>
<x-slot name='footer' close='Close' scrollable=true>
    <button class="btn btn-success" type='submit' form='formConnectJobPlugins'>Update plugins</button>
</x-slot>
</x-modal>
