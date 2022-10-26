@props(['button','footer'])

<!-- Button trigger modal -->
<div class='{{ "text-{$button->attributes->get("align")}" ?? "d-inline-block" }}'>
  <a href='#!' class="{{ $button->attributes->get('class') }}" data-bs-toggle="modal" data-bs-target="#{{ $attributes->get('id') }}">
    {{ $button }}
  </a>
</div>
<!-- Modal -->
<div class="modal fade" {{ $attributes }} tabindex="-1" aria-labelledby="{{ $attributes->get('id') }}Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="{{ $attributes->get('id') }}Label">{{ $title }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{ $slot }}
      </div>
      @isset($footer)
      <div class="modal-footer">
        @if( $footer->attributes->get('close') )
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ $footer->attributes->get('close') }}</button>
        @endif
        {{ $footer }}
      </div>
      @endisset
    </div>
  </div>
</div>
