<div class='mb-3'>
    <label class='form-label'>Skills</label>
    <div class="border rounded p-3">
        @foreach($skills as $skill)
        <?php $checkbox_id = "skill{$skill->id}" ?>
        <div class="form-check">
            <input type="checkbox" id="{{ $checkbox_id }}" name="skills[]" value="{{ $skill->id }}" class='form-check-input' {{ $member->hasSkill($skill) ? 'checked' : '' }}>
            <label for="{{ $checkbox_id }}" class='form-check-label'>{{ $skill->name }}</label>
        </div>
        @endforeach
    </div>
</div>
