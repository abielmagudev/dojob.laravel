@isset($surtitle)
<div class="text-muted mb-3">{{ $surtitle }}</div>
@endisset
<div class="h2">{{ $slot }}</div>
@isset($subtitle)
<div class="h6">{{ $subtitle }}</div>
@endisset
<br>
