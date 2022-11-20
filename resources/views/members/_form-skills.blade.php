<div class="table-responsive">
    <table class="table table-hover shadow-none">
        <tbody>
            @foreach($skills as $skill)
            <?php $checkbox_id = "skill{$skill->id}" ?>
            <tr>
                <td style='width:1%' class='text-center'>
                    <div class="form-check form-switch">
                        <input id="{{ $checkbox_id }}" name="skills[]" value="{{ $skill->id }}" type="checkbox" class='form-check-input' style='width:32px;height:16px' {{ $member->hasSkill($skill) ? 'checked' : '' }}>
                    </div>
                </td>
                <td>
                    <label for="{{ $checkbox_id }}" class='form-check-label'>{{ $skill->name }}</label>
                    <small class='d-block'>{{ $skill->description }}</small>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
