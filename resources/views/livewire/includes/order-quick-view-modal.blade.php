<div>
    <div wire:ignore.self class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @if($currentOrder)
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                       <strong>Order Status</strong> <br>
                            <small class="m-nav__link-text text-warning">
                            #{{ $currentOrder->code }}
                          </small>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="form-group">
                            <label for="status" class="form-control-label">
                                Status: <span class="text-danger">*</span>
                            </label>
                            <div class="@error('updateStatus') has-danger @enderror">
                                <select wire:model="updateStatus"  required id="updateStatus" class="form-control m-input @error('updateStatus') border-danger @enderror">
                                    <option value=0>Pending</option>
                                    <option value=1>Approved</option>
                                    <option value=2>Denied</option>
                                    <option disabled value=3>Expired</option>
                                </select>
                                @error('updateStatus')
                                <small class="form-control-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="form-control-label">
                                Order Placed Date And Time
                            </label>
                                <input readonly="readonly" class="form-control" disabled  value="{{ $currentOrder->created_at}}">
                        </div>


                        <div class="@if($updateStatus != 1 && $updateStatus != 3) d-none @endif">
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">
                               Subscription Start Date
                            </label>
                            <div class="@error('start_date') has-danger @enderror"  id="picker-container">
                                <input type="datetime-local" id="start_date" class="form-control m-input @error('start_date') border-danger @enderror" wire:model="start_date" value="{{ $start_date }}">
                                @error('start_date')
                                <small class="form-control-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">
                               Subscription End Date
                            </label>
                            <div class="@error('end_date') has-danger @enderror" id="picker-container2">
                                <input type="datetime-local" id="end_date" class="form-control m-input @error('end_date') border-danger @enderror" wire:model="end_date" value="{{ $end_date }}">
                                @error('end_date')
                                <small class="form-control-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        </div>



                       <div class="@if($updateStatus != 2) d-none @endif">
                        <div class="form-group">
                            <label for="status" class="form-control-label">
                                Remarks: (optional)
                            </label>
                            <div class="@error('remarks') has-danger @enderror">
                                <textarea wire:model="remarks" class="form-control m-input @error('remarks') border-danger @enderror" cols="5" rows="5"></textarea>
                                @error('remarks')
                                <small class="form-control-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                       </div>

                       <div class="form-group">
                        <label for="status" class="form-control-label">
                            Proof Of Payment
                        </label> <br>
                        <button type="button" class="btn m-btn--square btn-info btn-sm" data-toggle="modal" data-target="#payment_details">
                            Review Payment Details
                        </button>
                    </div>
                    </form>
                </div>
                <div class="modal-footer" id="order-update-status"  style="position:relative;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>

                    <button type="button"  class="btn m-btn--square btn-success btn-sm m-btn m-btn--custom" wire:click="updateOrder">
                        Update Subscription
                    </button>

                    {{-- <button type="button" @if($updateStatus == $currentOrder->status) disabled @endif class="btn m-btn--square btn-success btn-sm m-btn m-btn--custom" wire:click="updateOrder">
                        Update Subscription
                    </button> --}}
                    {{-- @if($updateStatus == $currentOrder->status)
                    <div style="position: absolute; width: 100%; bottom: 120px; right:-220px;">
                        <div class="m-popover popover fade bs-popover-top show" role="tooltip" id="popover266510" x-placement="bottom">
                            <div class="arrow" style="left: 200.57px;"></div>
                            <h3 class="popover-header"></h3>
                            <div class="popover-body">Make sure to update order status</div>
                        </div>
                    </div>
                    @endif --}}
                </div>

            </div>
        </div>
        @endif
    </div>

    <div wire:loading wire:target="updateOrder" wire:loading.delay.longest>
        <div class="blockUI blockOverlay" style="z-index: 3000; border: none; margin: 0px; padding: 0px; width: 100%; height: 100%; top: 0px; left: 0px; background-color: rgb(0, 0, 0); opacity: .4; cursor: wait; position: fixed;"></div>
        <div class="blockUI blockMsg blockPage" style="z-index: 5000; position: fixed; padding: 0px; margin: 0 auto; width: 370px; top: 50%; left: 50%; transform: translateX(-30%);text-align: center; color: rgb(0, 0, 0); border: 0px; cursor: wait;"><div class="m-blockui"><span>Processing... Please Wait</span><span><div class="m-loader  m-loader--primary "></div></span></div></div>
    </div>
</div>



@if($currentOrder)
    <div wire:ignore.self class="modal fade" id="payment_details" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-md" style="overflow-x: hidden;">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">
                        <strong>Payment Details</strong>
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
                <div class="modal-body"  style="overflow: auto; height:600px; overflow-x: hidden;">
                        <img src='{{ asset("storage/payments/{$currentOrder->proof_of_payment}") }}' alt="" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
