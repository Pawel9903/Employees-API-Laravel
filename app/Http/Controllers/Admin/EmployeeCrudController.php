<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeCrudController extends CrudController
{
    public function setup()
    {
        $this->crud->setModel('App\Employee');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/employee');
        $this->crud->setEntityNameStrings('emloyee', 'employees');

        $this->crud->setColumns(['name']);
        $this->crud->setColumns(['surname']);
        $this->crud->setColumns(['email']);
        $this->crud->setColumns(['phone']);
        $this->crud->setColumns(['city']);
        $this->crud->setColumns(['salary']);
        $this->crud->setColumns(['image']);
        $this->crud->addField([
            'name' => 'name',
            'label' => 'imię',
        ]);
        $this->crud->addField([
            'name' => 'surname',
            'label' => 'nazwisko',
        ]);
        $this->crud->addField([
            'name' => 'email',
            'label' => 'email',
        ]);
        $this->crud->addField([
            'name' => 'phone',
            'label' => 'tel.',
        ]);
        $this->crud->addField([
            'name' => 'city',
            'label' => 'miasto',
        ]);
        $this->crud->addField([
            'name' => 'salary',
            'label' => 'wynagrodzenie',
        ]);
//        $this->crud->addField([ // image
//            'label' => "zdjęcie",
//            'name' => "image",
//            'type' => 'image',
//            'upload' => true,
//            'crop' => true, // set to true to allow cropping, false to disable
//            'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
//            // 'prefix' => 'uploads/images/profile_pictures/' // in case you only store the filename in the database, this text will be prepended to the database value
//        ]);
    }

    public function store(StoreEmployeeRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateEmployeeRequest $request)
    {
        return parent::updateCrud();
    }
}
