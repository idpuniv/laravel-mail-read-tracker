<?php
namespace App\Http\ViewComposers;
use Illuminate\Contracts\View\View;
use App\User;

class UserEmailComposer{

    protected $sentEmailCount;
    protected $draftsEmailCount;
    protected $receivedEmailCount;
    protected $trashEmailCount;
    protected $ContactCount;


    public function __construct()
    {
        $this->sentEmailCount = Auth()->user()->sent->isNotEmpty() ? Auth()->user()->sent->count() : 0 ;
        $this->draftsEmailCount = Auth()->user()->drafts->isNotEmpty() ? Auth()->user()->drafts->count() : 0 ;
        $this->receivedEmailCount = Auth()->user()->received->isNotEmpty() ? Auth()->user()->received->count() : 0 ;
        $this->trashEmailCount = Auth()->user()->trash->isNotEmpty() ? Auth()->user()->trash->count() : 0 ;
        $this->ContactCount = Auth()->user()->contact->isNotEmpty() ? Auth()->user()->contact->count() : 0 ;
        
    }

    public function compose(View $view)
    {

        
        
        $view->with([
            'sentEmailCount' => $this->sentEmailCount, 
            'draftsEmailCount' => $this->draftsEmailCount,
            'trashEmailCount' => $this->trashEmailCount,
            'receivedEmailCount' => $this->receivedEmailCount,
            'emailContactCount' => $this->ContactCount,
            ]);
    }
}
