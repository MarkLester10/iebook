@push('css')
<style>

    #processing{
        display: none;
    }

    #processing.active{
        display: block !important;
    }


        .images-container{
        display: flex;
        /* align-items: center; */
        gap: 20px;
        flex-wrap: wrap;
    }
    .images-container .images, .images-container .images img{
        width: 250px;
        object-fit: contain !important;
        height:250px;
        position: relative;
    }

    .images-container .images label{
        width: 250px !important;
        height:250px !important;
        flex-shrink: none !important;
    }


    @media (max-width: 640px) {
        .images-container .images, .images-container .images img{
            width:100%;
        }

    }


    .images-container .images .overlay{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        background: rgba(255, 255, 255, 0.6);
        padding: 20px 0;
    }

</style>
@endpush

<div class="m-portlet__body bg-light p-4">
    <div class="m-form m-form--label-align-right m--margin-bottom-30">
        <div class="row align-items-center">
            <div class="col-xl-8 order-2 order-xl-1">
                <div class="form-group m-form__group row align-items-center">
                    <div class="col-md-6 mb-2">
                        <div class="input-group m-input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <i class="la la-search"></i>
                            </span>
                            <input type="text" wire:model.debounce.300ms="search" class="form-control m-input" placeholder="Search term, description . . ." aria-describedby="basic-addon1">
                        </div>
                        <div class="d-md-none m--margin-bottom-10"></div>
                    </div>
                    <div class="col-md-6">
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

                    <div class="col-md-6 mb-2">
                        <div class="m-form__group m-form__group--inline">
                            <div class="m-form__label">
                                <label>
                                    Status
                                </label>
                            </div>
                            <div class="m-form__control">
                                <select class="form-control" wire:model="status" >
                                    <option value=''>
                                        All
                                    </option>
                                    <option value=0>
                                        Active
                                    </option>
                                    <option value=1>
                                        Hidden
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="d-md-none m--margin-bottom-10"></div>
                    </div>

                    <div class="col-md-6">
                        <div class="m-form__group m-form__group--inline">
                            <div class="m-form__label">
                                <label>
                                    Type
                                </label>
                            </div>
                            <div class="m-form__control">
                                <select class="form-control" wire:model="type">
                                    <option value=1>
                                        Active
                                    </option>
                                    <option value=0>
                                        Archived
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="d-md-none m--margin-bottom-10"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="m-form__group m-form__group--inline">
                            <div class="m-form__label">
                                <label>
                                    Order By
                                </label>
                            </div>
                            <div class="m-form__control">
                                <select class="form-control" wire:model="order_by">
                                    <option value="created_at">
                                        Date Created
                                    </option>
                                    <option value="term">
                                        Alphabetical
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="d-md-none m--margin-bottom-10"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="m-form__group m-form__group--inline">
                            <div class="m-form__label">
                                <label>
                                    Order
                                </label>
                            </div>
                            <div class="m-form__control">
                                <select class="form-control" wire:model="order">
                                    <option value="asc">
                                        Ascending
                                    </option>
                                    <option value="desc">
                                        Descending
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="d-md-none m--margin-bottom-10"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <button type="button" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" data-toggle="modal" data-target="#term-modal-add">
                    <span>
                       <i class="la la-comment"></i>
                        <span>
                         Add Term
                        </span>
                    </span>
                </button>
                <button type="button" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill mt-3 mt-md-0" data-toggle="modal" data-target="#import-modal">
                    <span>
                       <i class="la la-file-excel-o"></i>
                        <span>
                         Import From Excel
                        </span>
                    </span>
                </button>
                <div class="m-separator m-separator--dashed d-xl-none"></div>
            </div>
        </div>
    </div>
    <div style="overflow-x: auto;">
    <div class="table-responsive">
        <table class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    <th>Term</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Date Created</th>
                    <th>Date Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($terms as $key => $term)
                <tr class="text-nowrap">
                    <td class="align-middle">{{ ($terms->currentpage()-1) * $terms->perpage() + $loop->index + 1 }}</td>
                    <td class="align-middle p-image d-flex">
                        <img src="{{ $term->image ? asset('storage/term_images/' . $term->image) : asset('imgs/logo_v2.png') }}" style="width:60px; height:60px; object-fit:cover;" alt="">
                        <p class="ml-2 m--font-boldest m-0 d-flex align-items-center">
                            {{ $term->term }}
                        </p>
                    </td>
                    <td class="align-middle">
                        {{ $term->truncatedDescription() }}
                    </td>
                    <td class="align-middle">
                        @if($term->is_hidden)
                        <span class="m-badge m-badge--warning m-badge--wide">Hidden</span>
                        @else
                        <span class="m-badge m-badge--success m-badge--wide">Active</span>
                        @endif
                    </td>
                    <td class="align-middle">{{ $term->created_at }}</td>
                    <td class="align-middle">{{ $term->updated_at }}</td>
                    <td class="align-middle">
                        @if($term->trashed())
                        <a href="{{ route('terms.restore', $term->id) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" id="restore"
                        data-toggle="m-tooltip" title="Restore this event">
                            <i class="la la-clock-o"></i>
                        </a>
                        @else
                        <a href="#" wire:click.prevent="edit({{ $term->id }})" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill"
                            data-toggle="m-tooltip" title="Edit this term"><i class="la la-edit"></i>
                        </a>
                        @endif
                        <form action="@if($term->trashed()) {{ route('terms.force-delete', $term->id) }} @else {{ route('terms.destroy', $term->id) }}  @endif" class="d-inline-block" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" onclick="return confirm(
                                @if($term->trashed()) 'Are you sure you want to permanently delete this term?' @else 'Are you sure you want to archive this term? You can restore it later.' @endif
                            )"
                            class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill"><i class="la la-trash" data-toggle="m-tooltip" title="Delete this term"></i></button>
                        </form>
                    </td>
                </tr>

                @empty
                <tr class="text-center">
                    <td colspan="7">No Data Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
        {{ $terms->links() }}

    {{-- Dynamic Modal --}}
    <div wire:ignore.self class="modal fade" id="term-modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header {{ $showEditModal ? 'bg-info' :'bg-success' }}">
                    <h3 class="modal-title text-white" id="exampleModalLabel">
                        {{ $showEditModal ? 'Edit Term':'Add Term' }}
                    </h3>
                    <button type="button" class="close text-white" wire:click="clearModal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
            <form wire:submit.prevent="{{ $showEditModal ? 'update':'store' }}" class="m-form">
                <div class="modal-body">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="term">
                                Term <span class="text-danger">*</span>
                            </label>
                            <div class="@error('term') has-danger @enderror">
                                <input type="text" wire:model="term" class="form-control m-input @error('term') border-danger @enderror" id="term" placeholder="Term" >
                                @error('term')
                                <div class="form-control-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group m-form__group">
                            <label for="answer">
                                Description <span class="text-danger">*</span>
                            </label>
                            <div class="@error('description') has-danger @enderror">
                               <div wire:ignore>
                                <textarea type="text" wire:model="answer" class="summernote" rows="10" class="form-control m-input @error('description') border-danger @enderror" id="description" placeholder="description">{{ $description }}</textarea>
                               </div>
                                @error('description')
                                <div class="form-control-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group m-form__group">
                            <label>
                                Image
                            </label>
                            <div class="@error('image') has-danger @enderror">
                                <div class="images-container">
                                    <div class="images">
                                        <div class="d-flex align-items-center justify-content-center mt-2" style="border: 2px dashed #ccc;">
                                                @if($showEditModal)
                                                    @if($image instanceof Livewire\TemporaryUploadedFile)
                                                    <img src='{{ $image->temporaryUrl() }}' class="img-fluid" alt="" @error("image") style="border: 2px solid red;" @enderror>
                                                    @elseif(is_string($image) && $image)
                                                    <img src='{{  asset('storage/term_images/' . $this->image) }}' class="img-fluid" alt="" @error("image") style="border: 2px solid red;" @enderror>
                                                    @else
                                                    <label class="cursor-pointer d-flex align-items-center justify-content-center">
                                                        <svg style="cursor: pointer;" class="w-25" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        <input type="file" class="m--hide" wire:model="image" accept="image/*" placeholder="Choose Image">
                                                    </label>
                                                    @endif
                                                @else
                                                    @if($image)
                                                    <img src='{{ $image->temporaryUrl() }}' class="img-fluid" alt="" @error("image") style="border: 2px solid red;" @enderror>
                                                    @else
                                                    <label class="cursor-pointer d-flex align-items-center justify-content-center">
                                                        <svg style="cursor: pointer;" class="w-25" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        <input type="file" class="m--hide" wire:model="image" accept="image/*" placeholder="Choose Image">
                                                    </label>
                                                    @endif
                                                @endif

                                                @if($image)
                                                <div class="overlay text-center">
                                                    <button wire:click="removeOptionImage()" type="button" class="mt-3 btn
                                                    {{ ($image instanceof Livewire\TemporaryUploadedFile) ? 'btn-warning' :'btn-danger' }} m-btn btn-sm m-btn--icon m-btn--pill"
                                                    data-container="#images-container--1" data-toggle="m-popover" data-placement="top"  data-content="Remove Image" data-original-title="" title="">
                                                        <span class="text-center ">
                                                            <i class="la la-trash"></i>
                                                            <span>
                                                                {{ ($image instanceof Livewire\TemporaryUploadedFile) ? 'Remove' :'Delete' }}
                                                            </span>
                                                        </span>
                                                    </button>
                                                </div>
                                                @endif
                                        </div>
                                    </div>

                                </div>
                                @error('image')
                                <div class="form-control-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group m-form__group">
                            <label class="m-checkbox">
                                <input type="checkbox" name="is_hidden_by_admin" wire:model="is_hidden">
                                    Hide from the website
                                <span></span>
                            </label>
                        </div>



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="clearModal">
                        Close
                    </button>
                    <button type="submit" class="btn  {{ $showEditModal ? 'btn-info' : 'btn-success' }} text-white">
                        {{ $showEditModal ? 'Save Changes' : 'Add Term' }}
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="import-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h3 class="modal-title text-white" id="exampleModalLabel">
                        Bulk Upload
                    </h3>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>
            <form action="{{ route('terms.bulk-upload') }}" method="POST" class="m-form" onsubmit="startLoading()" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="term">
                                Excel File <span class="text-danger">*</span>
                            </label>
                                <input type="file" name="excel_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control m-input" required>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-success text-white">
                        Upload
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>


    <div id="processing">
        <div class="blockUI blockOverlay" style="z-index: 3000; border: none; margin: 0px; padding: 0px; width: 100%; height: 100%; top: 0px; left: 0px; background-color: rgb(0, 0, 0); opacity: .4; cursor: wait; position: fixed;"></div>
        <div class="blockUI blockMsg blockPage" style="z-index: 5000; position: fixed; padding: 0px; margin: 0 auto; width: 370px; top: 50%; left: 50%; transform: translateX(-30%);text-align: center; color: rgb(0, 0, 0); border: 0px; cursor: wait;"><div class="m-blockui"><span>Processing... Please Wait</span><span><div class="m-loader  m-loader--primary "></div></span></div></div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('admin/assets/demo/default/custom/components/base/bootstrap-notify.js') }}" type="text/javascript"></script>
<script>
jQuery(document).ready(function(){$(".summernote").summernote({height:150,callbacks:{onChange:function(contents,$editable){@this.set('description', contents);var n=$(".note-editable").text().length;$("#total-caracteres").text(n)},onInit:function(e){var t=$(".note-editable").text().length;$("#total-caracteres").text(t)}}})}),window.addEventListener("close_modal",e=>{$("#term-modal-add").modal("hide")}),window.addEventListener("open_modal",e=>{$("#term-modal-add").modal("show")}),window.addEventListener("notification",e=>{$.notify({message:e.detail.message},{type:e.detail.type,timer:500,allow_dismiss:!0,animate:{enter:"animated bounce",exit:"animated bounce"}})});Livewire.on('reset-summernote', () => {$('.summernote').summernote('reset');});
Livewire.on('summernote-edit', (value) => {$('.summernote').summernote('code', value);});
Livewire.on('summernote-edit', (value) => {$('.summernote').summernote('code', value);});
const loading = document.getElementById('processing');
function startLoading(){
loading.classList.toggle("active");
document.body.style.cursor='wait';
};
</script>
@endpush
