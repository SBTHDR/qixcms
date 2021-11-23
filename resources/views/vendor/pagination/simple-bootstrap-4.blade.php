@if ($paginator->hasPages())
    <nav class="flexbox mt-30">
        @if ($paginator->onFirstPage())
            <a class="btn btn-white disabled"><i class="fa fa-arrow-circle-left"></i> Previous</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-white"><i class="fa fa-arrow-circle-left"></i> Previous</a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-white" href="#">Next <i class="fa fa-arrow-circle-right"></i></a>            
        @else
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-white disabled">Next <i class="fa fa-arrow-circle-right"></i></a>
        @endif
   </nav>
@endif
