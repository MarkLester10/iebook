<style>
    a{
        text-decoration: none !important;
    }
    button{
        border: none !important;
        outline: none !important;
    }
</style>
<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
    @if ($paginator->hasPages())
    <div class="m-datatable__pager m-datatable--paging-loaded clearfix">
       <ul class="m-datatable__pager-nav">

            @if ($paginator->onFirstPage())
          <li><button id="next" class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled" disabled="disabled"><i class="la la-angle-double-left"></i></button></li>
          @else
          <li><button id="previousPage" type="button" wire:click="previousPage" class="m-datatable__pager-link m-datatable__pager-link--prev"><i class="la la-angle-double-left"></i></button></li>
          @endif

          @foreach ($elements as $element)
            @if (is_string($element))
            <li><a title="More pages" class="m-datatable__pager-link m-datatable__pager-link--more-next">
                <i class="la la-ellipsis-h"></i>
                {{ $element }}
            </a></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                <li wire:key="paginator-page{{ $page }}" id="paginator-page{{ $page }}">
                    @if ($page == $paginator->currentPage())
                    <button wire:click="gotoPage({{ $page }})" class="m-datatable__pager-link m-datatable__pager-link-number m-datatable__pager-link--active">{{ $page }}</button>
                    @else
                    <button type="button" wire:click="gotoPage({{ $page }})" class="m-datatable__pager-link m-datatable__pager-link-number">{{ $page }}</button>
                    @endif
                </li>
                @endforeach
            @endif
          @endforeach

          @if ($paginator->hasMorePages())
          <li><button  type="button" wire:click="nextPage" class="m-datatable__pager-link m-datatable__pager-link--last"><i class="la la-angle-double-right"></i></button></li>
          @else
          <li><button class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled" disabled="disabled"><i class="la la-angle-double-right"></i></button></li>
          @endif
       </ul>
       <div class="m-datatable__pager-info">
          <span class="m-datatable__pager-detail">Displaying {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} of {{ $paginator->total() }} records</span>
       </div>
    </div>
    @endif
 </div>



