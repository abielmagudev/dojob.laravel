<nav aria-label="pagination">
    <ul class="pagination">
        <!-- Previous -->
        @if(! is_null($collection->previousPageUrl()) )
        <li class="page-item">
            <a class="page-link" href="{{ $collection->previousPageUrl() }}">Previous</a>
        </li>

        @else
        <li class="page-item disabled">
            <span class="page-link">Previous</span>
        </li>

        @endif

        <!-- Next -->
        @if(! is_null($collection->nextPageUrl()) )
        <li class="page-item">
            <a class="page-link" href="{{ $collection->nextPageUrl() }}">Next</a>
        </li>

        @else
        <li class="page-item disabled">
            <span class="page-link">Next</span>
        </li>

        @endif
    </ul>
</nav>