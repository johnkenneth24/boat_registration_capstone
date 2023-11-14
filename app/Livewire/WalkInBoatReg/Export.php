<?php

namespace App\Livewire\WalkInBoatReg;

use Livewire\Component;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\WalkInBoatOwner;
use App\Models\WalkInLivelihood;
use App\Services\TemplateAsset;
use App\Models\WalkInAdss;

class Export extends Component
{

    public $path_export = 'docx/walkin-AFMNMBUFI.docx';
    public $wrg;

    public $walkinowner;

    public function export()
    {
        $path = storage_path($this->path_export);
        $templateProcessor = new TemplateProcessor($path);

        $this->walkinowner = WalkInBoatOwner::where('id', $this->wrg->walkin_owner_id)->first();
        $walkinlivelihood = WalkInLivelihood::where('walkin_owner_id', $this->wrg->walkin_owner_id)->first();
        $walkinAdss = WalkInAdss::where('walkin_owner_adss_id', $this->wrg->walkin_owner_id)->first();


        $templateProcessor->setValue('cert_num', '0001-2023');
        $templateProcessor->setValue('reg_no', $this->wrg->registration_no);
        $templateProcessor->setValue('boat_type', $this->wrg->boat_type);
        $templateProcessor->setValue('body_number', $this->wrg->body_number);
        $templateProcessor->setValue('homeport', $this->wrg->home_port);
        $templateProcessor->setValue('place_built', $this->wrg->place_built);
        $templateProcessor->setValue('year_built', date('F Y', strtotime($this->wrg->year_built)));
        $templateProcessor->setValue('from', $walkinAdss->cover_from->format('F d, Y'));
        $templateProcessor->setValue('to', $walkinAdss->cover_to->format('F d, Y'));
        $templateProcessor->setValue('color', $this->wrg->color);
        $templateProcessor->setValue('materials', $this->wrg->materials);
        $templateProcessor->setValue('fisherfolk_name', $this->walkinowner->fullname);
        $templateProcessor->setValue('association_name', $walkinlivelihood->org_name);
        $templateProcessor->setValue('age', $this->walkinowner->age);
        $templateProcessor->setValue('address', $this->walkinowner->address);
        $templateProcessor->setValue('length', $this->wrg->tonnage_length);
        $templateProcessor->setValue('breadth', $this->wrg->tonnage_breadth);
        $templateProcessor->setValue('depth', $this->wrg->tonnage_depth);
        $templateProcessor->setValue('gross_tonnage', $this->wrg->gross_tonnage);
        $templateProcessor->setValue('net_tonnage', $this->wrg->net_tonnage);
        $templateProcessor->setValue('engine_make', $this->wrg?->engine_make ?? '');
        $templateProcessor->setValue('serial_number', $this->wrg?->serial_number ?? '');
        $templateProcessor->setValue('hp', $this->wrg->horsepower ?? '');
        $templateProcessor->setValue('non', $this->wrg->vessel_type == 'Non-Motorized' ? '/' : '');
        $templateProcessor->setValue('motorize', $this->wrg->vessel_type == 'Motorized' ? '/' : '');
        $templateProcessor->setValue('beneficiary', $walkinAdss->primary_beneficiary);
        $templateProcessor->setValue('amount', $walkinAdss->desired_coverage);

        // $templateProcessor->setImageValue('boat_image', array( asset('images/user-upload/' . $this->wrg->image), 'width' => 100, 'height' => 100, 'ratio' => true));
        $imagePath = 'images/user-upload/' . $this->wrg->image;

        $templateProcessor->setImageValue('boatImage', $imagePath);


        $templateProcessor->setValue('or_no',  '____________');
        $templateProcessor->setValue('date',  '____________');

        $templateProcessor->setValue('valid_until',  date('F d, Y', strtotime($this->wrg->approved_at . ' + 1 year')));


        $filename = 'BRIMS-' . $this->wrg->registration_no . '-cert';
        $tempPath = 'reports/' . $filename . '.docx';

        if (!file_exists(public_path('reports'))) {
            mkdir(public_path('reports'), 0777, true);
        }

        $templateProcessor->saveAs($tempPath);
        return response()->download(public_path($tempPath));
    }

    public function render()
    {
        return view('livewire.walk-in-boat-reg.export');
    }
}
