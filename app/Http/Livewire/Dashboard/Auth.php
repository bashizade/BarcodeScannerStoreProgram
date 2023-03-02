<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Auth extends Component
{
    public $name;
    public $password;

    public function login()
    {
        $validator = Validator::make([
            'name' => $this->name,
            'password' => $this->password,
        ],[
            'name' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()){
            $this->show_toast('خطا',$validator->errors()->all(),'error');
        }

        if (auth()->attempt(['name' => $this->name,'password' => $this->password])){
            $this->redirect(route('dashboard.index'));
        }else{
            $this->show_toast('خطا','چنین مشخصاتی در سیستم وجود ندارد','error');
        }

    }
    public function render()
    {
        if (auth()->check())
            $this->redirect(route('dashboard.index'));

        return view('livewire.dashboard.auth')->layout('layouts.auth.master');
    }
}
