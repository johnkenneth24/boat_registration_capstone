<?php

namespace App\Livewire\RegBoat;

use Livewire\Component;
use PhpOffice\PhpWord\TemplateProcessor;

class Export extends Component
{

    public $path_export = 'docx/cert.docx';
    public $rBoats;

    public function export()
    {
        $path = storage_path($this->path_export);
        $templateProcessor = new TemplateProcessor($path);

        $templateProcessor->setValue('cert_num', '0001-2023');
        $templateProcessor->setValue('reg_no', $this->rBoats->registration_no);
        $templateProcessor->setValue('vessel_name', $this->rBoats->boat->vessel_name);
        $templateProcessor->setValue('boat_type', $this->rBoats->boat->boat_type);
        $templateProcessor->setValue('gear_used', $this->rBoats->ownerInfo->livelihood->gear_used);
        $templateProcessor->setValue('homeport', $this->rBoats->boat->home_port);
        $templateProcessor->setValue('place_built', $this->rBoats->boat->place_built);
        $templateProcessor->setValue('year_built', date('F Y', strtotime($this->rBoats->boat->year_built)));
        $templateProcessor->setValue('color', $this->rBoats->boat->color);
        $templateProcessor->setValue('material_used', $this->rBoats->boat->materials);
        $templateProcessor->setValue('owner_name', $this->rBoats->ownerInfo->fullname);
        $templateProcessor->setValue('address', $this->rBoats->ownerInfo->address);
        $templateProcessor->setValue('reg_length', $this->rBoats->boat->length);
        $templateProcessor->setValue('reg_breadth', $this->rBoats->boat->breadth);
        $templateProcessor->setValue('reg_depth', $this->rBoats->boat->depth);
        $templateProcessor->setValue('ton_length', $this->rBoats->boat->tonnage_length);
        $templateProcessor->setValue('ton_breadth', $this->rBoats->boat->tonnage_breadth);
        $templateProcessor->setValue('ton_depth', $this->rBoats->boat->tonnage_depth);
        $templateProcessor->setValue('gross_tonnage', $this->rBoats->boat->gross_tonnage);
        $templateProcessor->setValue('net_tonnage', $this->rBoats->boat->net_tonnage);

        $templateProcessor->setValue('engine_make', $this->rBoats->boat?->engine_make ?? '');
        $templateProcessor->setValue('serial_number', $this->rBoats->boat?->serial_number ?? '');
        $templateProcessor->setValue('horsepower', $this->rBoats->boat?->horsepower ?? '');



        $templateProcessor->setValue('or_no',  '____________');
        $templateProcessor->setValue('date',  '____________');

        $templateProcessor->setValue('valid_until',  date('F d, Y', strtotime($this->rBoats->approved_at . ' + 1 year')));


        $filename = 'BRIMS-' . $this->rBoats->registration_no . '-cert';
        $tempPath = 'reports/' . $filename . '.docx';

        $templateProcessor->saveAs($tempPath);
        return response()->download(public_path($tempPath));
    }


    public function render()
    {
        return view('livewire.reg-boat.export');
    }
}
