@isset($surtitle)
<div class="text-muted h2">{{ $surtitle }}</div>
@endisset
<h1 class="m-0">{{ $slot }}</h1>
@isset($subtitle)
<div class="text-muted h4">{{ $subtitle }}</div>
@endisset
<br>
