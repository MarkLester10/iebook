
@push('css')
<style>
    #payment_details{
    z-index: 1052 !important;
}
.modal-backdrop.show:nth-of-type(even) {
    z-index: 1051 !important;
}
</style>
@endpush
<div wire:poll.3000ms wire:poll.visible class="m-portlet__body bg-light p-4">
    <div class="m-form m-form--label-align-right m--margin-bottom-30">
        <div class="row align-items-center">
           <div class="col-12 order-2 order-xl-1">
               <div class="form-group m-form__group row align-items-center">
                   <div class="col-md-6 mb-4">
                       <div class="input-group m-input-group">
                           <span class="input-group-addon" id="basic-addon1">
                               <i class="la la-search"></i>
                           </span>
                           <input type="text" wire:model.debounce.300ms="search" class="form-control m-input"
                           placeholder="Search order number, customer name . . ."
                           aria-describedby="basic-addon1">
                       </div>
                       <div class="d-md-none m--margin-bottom-10"></div>
                   </div>

                   <div class="col-md-3 mb-4">
                       <div class="m-form__group m-form__group--inline">
                           <div class="m-form__label">
                               <label>
                                   Records
                               </label>
                           </div>
                           <div class="m-form__control">
                               <select class="form-control" wire:model="perPage" >
                                   <option>
                                       5
                                   </option>
                                   <option >
                                       10
                                   </option>
                                   <option >
                                       20
                                   </option>
                                   <option >
                                       30
                                   </option>
                                   <option >
                                       50
                                   </option>

                               </select>
                           </div>
                       </div>
                       <div class="d-md-none m--margin-bottom-10"></div>
                   </div>

               </div>
           </div>
        </div>
    </div>
    <div style="overflow-x: auto;">
        <div class="table-responsive">
            <table class="table table-striped table-bordered nowrap" style="width:100%" id="products">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Order Code</th>
                        <th>Customer</th>
                        <th>Status</th>
                        @if($status == 0)
                        <th>Order Placed Date</th>
                        @endif
                        @if(in_array($status, [1,3]))
                        @if($status == 1)
                        <th>Date Approved</th>
                        @endif
                        <th>Start Date</th>
                        <th>End Date</th>
                        @endif
                        @if($status == 2)
                        <th>Date Denied</th>
                        <th>Remarks</th>
                        @endif
                        <th>Order Total</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                @forelse($subscriptions as $order)
                <tr class="text-nowrap" style="cursor: pointer;">
                   <td class="align-middle">{{ ($subscriptions->currentpage()-1) * $subscriptions->perpage() + $loop->index + 1 }}</td>
                   <td class="align-middle text-warning">
                       <a href="#" class="text-warning">
                           <strong>{{ $order->code }}</strong>
                       </a>
                   </td>

                   <td class="align-middle">{{ $order->user->getFullName() }}</td>
                   <td class="align-middle">
                    <span class="m-badge {{ $order->getStatusColor() }} m-badge--wide">
                        {{ $order->getStatusName() }}
                    </span>
                   </td>
                   @if($status == 0)
                   <td class="align-middle">{{ $order->created_at }}</td>
                   @endif
                   @if(in_array($status, [1,3]))
                   @if($status == 1)
                   <td class="align-middle">{{ $order->updated_at }}</td>
                   @endif
                   <td class="align-middle">{{ $order->getStartDate() }}</td>
                   <td class="align-middle">{{ $order->getExpirationDate() }}</td>
                   @endif
                   @if($status == 2)
                   <td class="align-middle">{{ $order->updated_at }}</td>
                   <td class="align-middle">{{ $order->remarks }}</td>
                   @endif
                   <td class="align-middle">&#8369; {{ number_format($order->amount,2) }}</td>

                    <td class="align-middle">
                       <a href="#" wire:click.prevent="viewOrderDetails({{ $order->id }})" data-toggle="m-tooltip" title="Quick View Order" class="btn btn-outline-info m-btn m-btn--icon m-btn--icon-only">
                           <i class="la la-eye"></i>
                       </a>
                    </td>

                </tr>
                @empty
                    <tr>
                        <td colspan="100%" class="text-center">No Records Found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{  $subscriptions->links()  }}
        </div>
   </div>

   @include('livewire.includes.order-quick-view-modal')

</div>

@push('scripts')
<script src="{{ asset('admin/assets/demo/default/custom/components/base/bootstrap-notify.js') }}" type="text/javascript"></script>
<script>
   window.addEventListener("open_order_details_modal",e=>{$("#order_details").modal("show")});
    window.addEventListener("close_order_details_modal",e=>{$("#order_details").modal("hide")});
</script>
@if(session()->has('success'))
<script>
   $.notify({
       // options
       message: '{{ session("success") }}',
   },{
       // settings
       type: 'success',
       timer: 500,
       allow_dismiss: true,
       animate: {
           enter: 'animated bounce',
           exit: 'animated bounce'
       },
   });
</script>
@endif
@endpush
