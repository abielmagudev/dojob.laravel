<div class='mb-3'>
    <label class='form-label'>Available</label>
    <div class="border rounded p-3">
        <div class='form-check form-switch'>
            <input type="checkbox" id="checkboxAvailable" name="available" value="yes" class='form-check-input' {{ $member->isAvailable() ? 'checked' : '' }}>
            <label for="checkboxAvailable" class='form-check-label'>This member can be used to belong to a crew or assign a job.</label>
        </div>
    </div>
</div>
