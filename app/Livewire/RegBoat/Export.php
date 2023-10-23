<?php

namespace App\Livewire\RegBoat;

use Exception;
use Livewire\Component;
use PhpOffice\PhpWord\TemplateProcessor;

class Export extends Component
{

    public $path_export_cert = 'docx/cert.docx';
    public $path_export_afmnbufi = 'docx/AFMNMBUFI.docx';
    public $rBoats;

    public $certificate_number = null;

    public function export()
    {
        $path = storage_path($this->path_export_cert);
        $templateProcessor = new TemplateProcessor($path);

        $templateProcessor->setValue('cert_num', $this->rBoats->certification->certificate_no);
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
        $templateProcessor->setValue('horsepower', $this->rBoats->boat?->horsepower ?? 'n/a');



        $templateProcessor->setValue('or_no',  '____________');
        $templateProcessor->setValue('date',  '____________');

        // setValue for valid_until to the end of the current year
        $templateProcessor->setValue('valid_until', date('F d, Y', strtotime('12/31/' . date('Y'))));



        $filename = 'BRIMS-' . $this->rBoats->registration_no . '-cert';
        $tempPath = 'reports/' . $filename . '.docx';

        $templateProcessor->saveAs($tempPath);
        return response()->download(public_path($tempPath));
    }

    public function exportPcic()
    {
        $path = storage_path($this->path_export_afmnbufi);
        $templateProcessor = new TemplateProcessor($path);

        $templateProcessor->setValue('association_name', $this->rBoats->registration_no);
        $templateProcessor->setValue('fisherfolk_name', $this->rBoats->ownerInfo->fullname);
        $templateProcessor->setValue('address', $this->rBoats->ownerInfo->address);
        $templateProcessor->setValue('age', $this->rBoats->ownerInfo->age);

        $templateProcessor->setValue('hp', $this->rBoats->boat?->hp ?? 'n/a');
        $templateProcessor->setValue('color', $this->rBoats->boat->color);
        $templateProcessor->setValue('length', $this->rBoats->boat->length);
        $templateProcessor->setValue('breadth', $this->rBoats->boat->breadth);
        $templateProcessor->setValue('depth', $this->rBoats->boat->depth);
        $templateProcessor->setValue('body_number', $this->rBoats->boat->body_number);
        $templateProcessor->setValue('materials', $this->rBoats->boat->materials);
        $templateProcessor->setValue('year_built', $this->rBoats->boat->year_built);
        $templateProcessor->setValue('gross_tonnage', $this->rBoats->boat->gross_tonnage);

        $templateProcessor->setValue('reg_no', $this->rBoats->registration_no);

        $templateProcessor->setValue('beneficiary', $this->rBoats->ownerInfo?->adss?->primary_beneficiary ?? '');
        $templateProcessor->setValue('from', $this->rBoats->ownerInfo?->adss?->cover_from?->format('F d, Y') ?? '');
        $templateProcessor->setValue('to', $this->rBoats->ownerInfo?->adss?->cover_to?->format('F d, Y') ?? '');
        $templateProcessor->setValue('amount', $this->rBoats->ownerInfo?->adss?->desired_coverage ?? '');

        $templateProcessor->setValue('a', $this->rBoats?->boat?->boat_type == 'Non-Motorized' ? '☑' : '☐');
        $templateProcessor->setValue('b', $this->rBoats?->boat?->boat_type == 'Motorized' ? '☑' : '☐');


        try {
            $imagePath = public_path('images/user-upload/' . $this->rBoats->boat->image);

            if (file_exists($imagePath)) {
                $templateProcessor->setImageValue('boat_image', [
                    'path' => $imagePath,
                    'width' => 300,
                    'height' => 300,
                    'ratio' => false,
                ]);
            } else {
                // Log an error or handle the missing image file
                $templateProcessor->setValue('boat_image', 'Image not found!');
            }
        } catch (Exception $e) {
            // Handle any exceptions that may occur
            $templateProcessor->setValue('boat_image', 'Another error!');
        }



        $filename = 'PCIC-AFMNMBUFI-' . $this->rBoats->registration_no;
        $tempPath = 'reports/' . $filename . '.docx';

        $templateProcessor->saveAs($tempPath);
        return response()->download(public_path($tempPath));
    }


    public function render()
    {
        return view('livewire.reg-boat.export');
    }
}
