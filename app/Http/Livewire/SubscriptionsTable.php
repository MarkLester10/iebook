<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Subscription;
use Livewire\Component;
use App\Mail\ApprovedEmail;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;

class SubscriptionsTable extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 5;
    public $status = 0;
    public $updateStatus = 0;
    public $currentOrder;
    public $remarks;
    public $end_date;
    public $start_date;

    protected $rules = [
        'end_date' => 'required_if:updateStatus,1',
        'start_date' => 'required_if:updateStatus,1',
    ];

    protected $messages = [
        'end_date.required_if' => 'Please specify subscription end date',
        'start_date.required_if' => 'Please specify subscription start date',
    ];

    public function paginationView()
    {
        return 'vendor.livewire.custom-pagination';
    }

    public function mount($status)
    {
        $this->status = $status;
        $this->updateStatus = $status;
    }

    public function viewOrderDetails($order_id)
    {
        $currentOrder = Subscription::where('id', $order_id)->with(['user'])->first();
        $this->currentOrder = $currentOrder;
        $this->remarks = $currentOrder->remarks;
        $this->end_date = $currentOrder->end_date ? Carbon::parse($currentOrder->end_date)->format('Y-m-d\TH:i'): null;
        $this->start_date =  $currentOrder->start_date ? Carbon::parse($currentOrder->start_date)->format('Y-m-d\TH:i'): null;
        $this->dispatchBrowserEvent("open_order_details_modal");
    }

    public function closeOrderDetails()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatchBrowserEvent("close_order_details_modal");
    }

    public function updateOrder()
    {
        $this->validate();
        $this->currentOrder->update([
            'end_date' => $this->end_date,
            'start_date' => $this->start_date,
            'status' => $this->updateStatus,
            'remarks' => $this->remarks
        ]);
        $this->currentOrder->user->update([
            'is_premium' => $this->updateStatus == 1 ? 1 : 0,
        ]);

        if($this->updateStatus == 1){
            Mail::to($this->currentOrder->user->email)->send(new ApprovedEmail($this->currentOrder));
        }

        session()->flash('success', 'Subscription updated successfully.');
         return redirect()->route($this->getIntendedRoute());
    }

    private function getIntendedRoute() :string
    {
         switch ($this->updateStatus){
             case 1:
                return 'subscriptions.approved';
                break;
            case 2:
                return 'subscriptions.declined';
                break;
            default:
                return 'subscriptions.pending';
         }

    }

    public function updating()
    {
        $this->resetPage();
    }

    public function render()
    {
        $subscriptions = Subscription::search($this->search)->with('user')->where('status', $this->status)->latest()->paginate($this->perPage);
        return view('livewire.subscriptions-table', compact('subscriptions'));
    }
}
