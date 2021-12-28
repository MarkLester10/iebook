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
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="#"  class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                    <span>
                       <i class="la la-user-plus"></i>
                        <span>
                         Add User
                        </span>
                    </span>
                </a>
                <div class="m-separator m-separator--dashed d-xl-none"></div>
            </div>
        </div>
    </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered nowrap" style="width:100%" id="products">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email Name</th>
                        <th>Registered At</th>
                        <th>Updated At</th>
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
                        <td class="align-middle">{{ $customer->created_at }}</td>
                        <td class="align-middle">{{ $customer->updated_at }}</td>
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
</div>
