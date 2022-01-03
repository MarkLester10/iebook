<div>
    <div class="m-portlet__body bg-light p-4">
        <div class="m-form m-form--label-align-right m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-md-8">
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" wire:model.debounce.300ms="search" class="form-control m-input m-input--solid" placeholder="Search firstname, lastname, email" id="m_form_search">
                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span>
                                        <i class="la la-search"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="m-form__group m-form__group--inline">
                                <div class="m-form__label">
                                    <label>
                                        Records
                                    </label>
                                </div>
                                <div class="m-form__control">
                                    <select class="form-control" wire:model="perPage">
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
                {{-- <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="#"  class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                           <i class="la la-user-plus"></i>
                            <span>
                             Add User
                            </span>
                        </span>
                    </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div> --}}
            </div>
        </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered nowrap" style="width:100%" id="products">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Account Type</th>
                            <th>Search Limit</th>
                            <th>Registered At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $key => $customer)
                        <tr class="text-nowrap">
                            <td class="align-middle">{{ ($customers->currentpage()-1) * $customers->perpage() + $loop->index + 1 }}</td>
                            <td class="align-middle">
                                <div>
                                    <img src="{{ $customer->avatar() }}" class="mr-3"  style="height:50px;width:50px;object-fit:cover;border-radius:50%;" alt="#">
                                    <span>{{ $customer->getFullName() }}</span>
                                </div>
                            </td>
                            <td class="align-middle">{{ $customer->email }}</td>
                            <td class="align-middle">
                                @if(!$customer->is_premium)
                                <span class="m-badge m-badge--warning m-badge--wide">Basic</span>
                                @else
                                <span class="m-badge m-badge--success m-badge--wide">Premium</span>
                                @endif
                            </td>
                            <td class="align-middle">{{ $customer->search_limit }}</td>
                            <td class="align-middle">{{ $customer->created_at }}</td>
                            <td class="align-middle">{{ $customer->updated_at }}</td>
                            <td class="align-middle">
                                <a href="#" wire:click.prevent="edit({{ $customer->id }})" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                                    data-toggle="m-tooltip" title="Edit search limit"><i class="la la-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">No Data Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div wire:ignore.self class="modal fade" id="user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h3 class="modal-title text-white" id="exampleModalLabel">
                            Update Search Limit
                        </h3>
                        <button type="button" class="close text-white" wire:click="clearModal" aria-label="Close">
                            <span aria-hidden="true">
                                &times;
                            </span>
                        </button>
                    </div>

                    <form wire:submit.prevent="update" class="m-form" >
                        @csrf
                        <div class="modal-body">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <label for="term">
                                        Name
                                    </label>
                                        <input type="text" disabled readonly wire:model="name" class="form-control m-input">
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="term">
                                        Email
                                    </label>
                                        <input type="email" disabled readonly wire:model="email" class="form-control m-input">
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="term">
                                        Search Limit
                                    </label>
                                        <input type="number" wire:model="search_limit" class="form-control m-input" required>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="clearModal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-success text-white">
                                Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <div id="processing" class="active" wire:loading wire:target="update">
            <div class="blockUI blockOverlay" style="z-index: 3000; border: none; margin: 0px; padding: 0px; width: 100%; height: 100%; top: 0px; left: 0px; background-color: rgb(0, 0, 0); opacity: .4; cursor: wait; position: fixed;"></div>
            <div class="blockUI blockMsg blockPage" style="z-index: 5000; position: fixed; padding: 0px; margin: 0 auto; width: 370px; top: 50%; left: 50%; transform: translateX(-30%);text-align: center; color: rgb(0, 0, 0); border: 0px; cursor: wait;"><div class="m-blockui"><span>Processing... Please Wait</span><span><div class="m-loader  m-loader--primary "></div></span></div></div>
        </div>

    </div>
</div>

@push('scripts')
<script src="{{ asset('admin/assets/demo/default/custom/components/base/bootstrap-notify.js') }}" type="text/javascript"></script>
<script>
window.addEventListener("close_modal_user",e=>{$("#user-modal").modal("hide")}),window.addEventListener("open_modal_user",e=>{$("#user-modal").modal("show")}),window.addEventListener("notification",e=>{$.notify({message:e.detail.message},{type:e.detail.type,timer:500,allow_dismiss:!0,animate:{enter:"animated bounce",exit:"animated bounce"}})});
</script>
@endpush


