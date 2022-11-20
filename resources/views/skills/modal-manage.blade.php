<x-modal id='modalManageSkills' header='Manage skills'>
    <x-slot name='trigger' class='btn btn-outline-primary btn-sm'>Manage skills</x-slot>
    <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-list-skills-tab" data-bs-toggle="pill" data-bs-target="#pills-list-skills" type="button" role="tab" aria-controls="pills-list-skills" aria-selected="true">Skills</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-new-skill-tab" data-bs-toggle="pill" data-bs-target="#pills-new-skill" type="button" role="tab" aria-controls="pills-new-skill" aria-selected="false">New skill</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-list-skills" role="tabpanel" aria-labelledby="pills-list-skills-tab" tabindex="0">
            <div style="height:71vh" class='overflow-auto'>
                <div class="table-responsive">
                    <table class="table table-hover align-middle shadow-none">
                        <tbody>
                            @foreach($skills as $skill)
                            <?php $checkbox_id = "skill{$skill->id}" ?>
                            <tr>
                                <td>
                                    <span>{{ $skill->name }}</span>
                                    <br>
                                    <small>{{ $skill->description }}</small>
                                </td>
                                <td class='text-end'>
                                    <a href="{{ route('skills.edit', [$skill, 'member' => $member]) }}" class="btn btn-outline-warning">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-new-skill" role="tabpanel" aria-labelledby="pills-new-skill-tab" tabindex="0">
            <?php $skill = new App\Models\Skill ?>
            <form action="{{ route('skills.store', ['member' => $member]) }}" method='post'>
                @csrf
                @include('skills._form-modal')
                <button class="btn btn-success" type='submit'>Save skill</button>
            </form>
        </div>
    </div>
</x-modal>