<?php

namespace App\Http\Livewire;

use App\Models\Term;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Storage;

class TermsTable extends Component
{
    use WithPagination,WithFileUploads;
    public $search = '';
    public $perPage = 5;
    public $type = 1;
    public $status = '';
    public $showEditModal=false;
    public $editingTerm;

    // Ordering
    public $order_by = 'created_at';
    public $order = 'desc';

    // Model Attr
    public $term;
    public $description;
    public $image;
    public $is_hidden = 0;

    protected $queryString = ['type'];

    protected $rules = [
        'term' => ['required','string','max:50'],
        'description' => ['required','string'],
        'image' => ['nullable', 'sometimes'],
    ];

    public function paginationView()
    {
        return 'vendor.livewire.custom-pagination';
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function showForm(){
        $this->showEditModal = false;
        $this->dispatchBrowserEvent('open_modal');
    }



    public function edit($id)
    {
        $this->showEditModal = true;
        $this->dispatchBrowserEvent('open_modal');
        $term = Term::withTrashed()->where('id', $id)->first();
        $this->editingTerm = $term;
        $this->term = $term->term;
        $this->description = $term->description;
        $this->is_hidden = $term->is_hidden;
        $this->image = $term->image;
        $this->emit('summernote-edit',$term->description);
    }




    public function store()
    {
        $this->validate();
        $imageName = '';
        if($this->image){
            $imageName = time() . '.' . $this->image->getClientOriginalName();
            $this->image->storeAs('public/term_images/', $imageName);
        }

        $term = Term::create([
        'term'=>$this->term,
        'description'=>$this->description,
        'is_hidden'=>$this->is_hidden,
        'image'=>$imageName,
        ]);
        if($term){
            $this->clearModal();
            $this->dispatchBrowserEvent('notification',['message' => 'Question added successfully','type' =>'success']);
        }else{
            $this->clearModal();
            $this->dispatchBrowserEvent('notification',['message' => 'Something went wrong. Please try again.','type' =>'danger']);
        }
    }

    public function update()
    {

        $this->validate();
        $imageName = $this->editingTerm->image;
        if($this->image instanceof TemporaryUploadedFile){
            $imageName = time() . '.' . $this->image->getClientOriginalName();
            $this->image->storeAs('public/term_images/', $imageName);
        }

        $term = $this->editingTerm->update([
        'term'=>$this->term,
        'description'=>$this->description,
        'is_hidden'=>$this->is_hidden,
        'image'=>$imageName,
        ]);
        if($term){
            $this->clearModal();
            $this->dispatchBrowserEvent('notification',['message' => 'Term updated successfully','type' =>'success']);
        }else{
            $this->clearModal();
            $this->dispatchBrowserEvent('notification',['message' => 'Something went wrong. Please try again.','type' =>'danger']);
        }

    }


    // CLEAR AND DELETE FUNCTIONS

    public function removeOptionImage()
    {
        if($this->image instanceof TemporaryUploadedFile){
            $this->image = null;
        }else{
            // delete Option Image
            Storage::delete('public/term_images/' . $this->editingTerm->image);
            DB::table('terms')
            ->where('id', $this->editingTerm->id)
            ->update([
            'image'=>null,
            ]);
            session()->flash('success', 'Term image has been removed.');
            return redirect()->route('terms.index');
        }
    }

    public function clearModal()
    {
        $this->emit('reset-summernote');
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent('close_modal');
    }


    public function render()
    {
        $terms = [];
        if ($this->status === '') {
            if ($this->type == 1) {
                $terms = Term::search($this->search)->orderBy($this->order_by, $this->order)->paginate($this->perPage);
            } else {
                $terms = Term::search($this->search)->orderBy($this->order_by, $this->order)->onlyTrashed()->paginate($this->perPage);
            }
        } else {
            if ($this->type == 1) {
                $terms = Term::search($this->search)->orderBy($this->order_by, $this->order)->where('is_hidden', $this->status)->paginate($this->perPage);
            } else {
                $terms = Term::search($this->search)->orderBy($this->order_by, $this->order)->onlyTrashed()->where('is_hidden', $this->status)->paginate($this->perPage);
            }
        }
        return view('livewire.terms-table', compact('terms'));
    }
}
