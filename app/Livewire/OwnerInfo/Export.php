<?php

namespace App\Livewire\OwnerInfo;

use Livewire\Component;
use PhpOffice\PhpWord\TemplateProcessor;

class Export extends Component
{
    public $path_export = 'docx/MFR.docx';
    public $ownerInfo;

    public function export()
    {
        $path = storage_path($this->path_export);
        $templateProcessor = new TemplateProcessor($path);

        $templateProcessor->setValue('reg_no', '____________________________________');
        $templateProcessor->setValue('reg_date', '____________________________________');

        $salutations = ['Mr.', 'Mrs.', 'Ms.'];

        $checkedSymbol = "☑"; // Unicode for a checked box
        $uncheckedSymbol = "☐"; // Unicode for an unchecked box

        foreach ($salutations as $letter => $salutation) {
            $isChecked = ($this->ownerInfo->salutation === $salutation) ? $checkedSymbol : $uncheckedSymbol;
            $templateProcessor->setValue(chr(97 + $letter), $isChecked . ' ' . $salutation . ' ');
        }

        $templateProcessor->setValue('lastname', $this->ownerInfo->last_name);
        $templateProcessor->setValue('firstname', $this->ownerInfo->first_name);
        $templateProcessor->setValue('middlename', $this->ownerInfo->middle_name ?? '');
        $templateProcessor->setValue('suffix', $this->ownerInfo->suffix ?? 'n/a');

        $templateProcessor->setValue('address', $this->ownerInfo->address);
        $templateProcessor->setvalue('contact_no', $this->ownerInfo->contact_no);
        $templateProcessor->setvalue('resident_since', $this->ownerInfo->resident_since->format('F Y'));
        $templateProcessor->setvalue('age', $this->ownerInfo->age);
        $templateProcessor->setvalue('mm_dd_yyyy', $this->ownerInfo->birthdate->format('m-d-Y'));
        $templateProcessor->setvalue('birth_place', $this->ownerInfo->birthplace);

        $genders = ['Male', 'Female'];

        foreach ($genders as $letter => $gender) {
            $isChecked = ($this->ownerInfo->gender === $gender) ? $checkedSymbol : $uncheckedSymbol;
            $templateProcessor->setValue(chr(100 + $letter), $isChecked);
        }

        $civil_statuses = ['Single', 'Legally Separated', 'Married', 'Widowed'];
        foreach ($civil_statuses as $letter => $status) {
            $isChecked = ($this->ownerInfo->civil_status === $status) ? $checkedSymbol : $uncheckedSymbol;
            $templateProcessor->setValue(chr(104 + $letter), $isChecked);
        }

        $templateProcessor->setValue('children_count', $this->ownerInfo->children_count);

        $nationality = strtolower($this->ownerInfo->nationality);

        if (in_array($nationality, ['filipino', 'pilipino'])) {
            $templateProcessor->setValue('m', '☑');
            $templateProcessor->setValue('n', '☐');
            $templateProcessor->setValue('others', '');
        } else {
            $templateProcessor->setValue('m', '☐');
            $templateProcessor->setValue('n', '☑');
            $templateProcessor->setValue('others', $nationality);
        }

        $educs = ['Elementary', 'High School', 'Vocational', 'College', 'Post Graduate', 'Others'];
        foreach ($educs as $letter => $educ) {
            $isChecked = ($this->ownerInfo->educ_background === $educ) ? $checkedSymbol : $uncheckedSymbol;
            $templateProcessor->setValue(chr(111 + $letter), $isChecked);
        }

        $templateProcessor->setValue('educ', $this->ownerInfo->other_educational_background ?? '');

        $templateProcessor->setValue('emContact', $this->ownerInfo->emContact_person);
        $templateProcessor->setValue('em_relationship', $this->ownerInfo->emRelationship);
        $templateProcessor->setValue('em_contact', $this->ownerInfo->emContact_no);
        $templateProcessor->setValue('em_address', $this->ownerInfo->emAddress);


        $templateProcessor->setValue('org_name', $this->ownerInfo->livelihood->org_name);
        $templateProcessor->setValue('member_since', date('F d, Y', strtotime($this->ownerInfo->livelihood->member_since)));
        $templateProcessor->setValue('position', $this->ownerInfo->livelihood->position);

        $serializedData = $this->ownerInfo->livelihood->source_of_income;
        $sources = ['Capture Fishing', 'Aquaculture', 'Fish Vending', 'Gleaning', 'Fish Processing', 'Other'];

        foreach ($sources as $letter => $source) {
            $isChecked = (strpos($serializedData, $source) !== false) ? $checkedSymbol : $uncheckedSymbol;
            $templateProcessor->setValue(chr(117 + $letter), $isChecked);
        }

        $serializedDataOs = $this->ownerInfo->livelihood->other_income_sources;
        foreach ($sources as $letter => $source) {
            $isChecked = (strpos($serializedDataOs, $source) !== false) ? $checkedSymbol : $uncheckedSymbol;
            $templateProcessor->setValue(chr(117 + $letter) . chr(117 + $letter), $isChecked);
        }

        $templateProcessor->setValue('gear_used', $this->ownerInfo->livelihood->gear_used);
        $templateProcessor->setValue('culture_used', $this->ownerInfo->livelihood->culture_method);
        $templateProcessor->setValue('specify', $this->ownerInfo->livelihood->specify);

        $templateProcessor->setValue('gear_used_os', $this->ownerInfo->livelihood->gear_used_os);
        $templateProcessor->setValue('culture_used_os', $this->ownerInfo->livelihood->culture_method_os);
        $templateProcessor->setValue('specify_os', $this->ownerInfo->livelihood->specify_os);




        $templateProcessor->setValue('fullname', $this->ownerInfo->fullname);
        $templateProcessor->setValue('date_accomplished', now()->format('F d, Y'));




        $filename = 'MFR-' . $this->ownerInfo->fullname;
        $tempPath = 'reports/' . $filename . '.docx';

        $templateProcessor->saveAs($tempPath);
        return response()->download(public_path($tempPath));
    }
    public function render()
    {
        return view('livewire.owner-info.export');
    }
}
