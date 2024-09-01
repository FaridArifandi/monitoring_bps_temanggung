<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KinerjaEditModal extends Component
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('components.user-edit-modal');
    }
}
