<?php

namespace App\Livewire\Reports;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\RegisterBoat;
use PhpOffice\PhpWord\TemplateProcessor;

class Export extends Component
{

    public $startDate;
    public $endDate;
    public $type;

    public $path_export_report = 'docx/reports.docx';
    public $registerBoats;
    protected $rules = [
        'startDate' => 'required|date',
        'endDate' => 'required|date',
        'type' => 'required',
    ];
    public function export()
    {
        $this->validate();

        $path = storage_path($this->path_export_report);
        $templateProcessor = new TemplateProcessor($path);

        $this->registerBoats = RegisterBoat::where(function ($query) {
            $query->where('registration_date', '>=', $this->startDate)
                ->where('registration_date', '<=', $this->endDate);
        })->get();

        $pending = RegisterBoat::where('status', 'pending')
            ->where('registration_date', '>=', $this->startDate)
            ->where('registration_date', '<=', $this->endDate)
            ->get();

        $registered = RegisterBoat::where('status', 'registered')
            ->where('registration_date', '>=', $this->startDate)
            ->where('registration_date', '<=', $this->endDate)
            ->get();

        $disapproved = RegisterBoat::where('status', 'disapproved')
            ->where('registration_date', '>=', $this->startDate)
            ->where('registration_date', '<=', $this->endDate)
            ->get();

        $expired = RegisterBoat::whereRaw('STR_TO_DATE(approved_at, "%Y-%m-%d") > DATE_FORMAT(NOW(), "%Y-12-31")')
            ->where('registration_date', '>=', $this->startDate)
            ->where('registration_date', '<=', $this->endDate)
            ->get();

        $templateProcessor->setValue('date_from', date('F d, Y', strtotime($this->startDate)));
        $templateProcessor->setValue('date_to', date('F d, Y', strtotime($this->endDate)));

        if ($this->registerBoats->isEmpty()) {
            session()->flash('message', 'No records found for the selected date.');
        } else {
            if ($this->type === 'all') {
                $count = $this->registerBoats->count();
                if ($count > 0) {
                    $templateProcessor->cloneRow('n', $count);
                }

                foreach ($this->registerBoats as $key => $value) {
                    $templateProcessor->setValue('n#' . ($key + 1), $key + 1);
                    $templateProcessor->setValue('reg_no#' . ($key + 1), $value->registration_no);
                    $templateProcessor->setValue('date_reg#' . ($key + 1), date('M. d, Y', strtotime($value->registration_date)));
                    $templateProcessor->setValue('vessel_name#' . ($key + 1), $value->boat->vessel_name);
                    $templateProcessor->setValue('owner#' . ($key + 1), $value->ownerInfo->fullname);
                    if ($value->status === 'registered' && $value->approved_at) {
                        $approvedAtYear = \Carbon\Carbon::parse($value->approved_at)->year;
                        $endOfYearApprovedAt = \Carbon\Carbon::create($approvedAtYear, 12, 31, 23, 59, 59);

                        if ($endOfYearApprovedAt < \Carbon\Carbon::now()) {
                            $templateProcessor->setValue('status#' . ($key + 1), 'expired');
                        } else {
                            $templateProcessor->setValue('status#' . ($key + 1), 'registered');
                        }
                    } else {
                        $templateProcessor->setValue('status#' . ($key + 1), $value->status);
                    }
                }
            } elseif ($this->type === 'pending') {
                $count = $pending->count();
                if ($count > 0) {
                    $templateProcessor->cloneRow('n', $count);
                } else {
                    session()->flash('message', 'No records found for the selected date.');
                }

                foreach ($pending as $key => $value) {
                    $templateProcessor->setValue('n#' . ($key + 1), $key + 1);
                    $templateProcessor->setValue('reg_no#' . ($key + 1), $value->registration_no);
                    $templateProcessor->setValue('date_reg#' . ($key + 1), date('M. d, Y', strtotime($value->registration_date)));
                    $templateProcessor->setValue('vessel_name#' . ($key + 1), $value->boat->vessel_name);
                    $templateProcessor->setValue('owner#' . ($key + 1), $value->ownerInfo->fullname);
                    $templateProcessor->setValue('status#' . ($key + 1), $value->status);
                }
            } elseif ($this->type === 'registered') {
                $count = $registered->count();
                if ($count > 0) {
                    $templateProcessor->cloneRow('n', $count);
                } else {
                    session()->flash('message', 'No records found for the selected date.');
                }

                foreach ($registered as $key => $value) {
                    $templateProcessor->setValue('n#' . ($key + 1), $key + 1);
                    $templateProcessor->setValue('reg_no#' . ($key + 1), $value->registration_no);
                    $templateProcessor->setValue('date_reg#' . ($key + 1), date('M. d, Y', strtotime($value->registration_date)));
                    $templateProcessor->setValue('vessel_name#' . ($key + 1), $value->boat->vessel_name);
                    $templateProcessor->setValue('owner#' . ($key + 1), $value->ownerInfo->fullname);
                    $templateProcessor->setValue('status#' . ($key + 1), $value->status);
                }
            } elseif ($this->type === 'disapproved') {
                $count = $disapproved->count();
                if ($count > 0) {
                    $templateProcessor->cloneRow('n', $count);
                } else {
                    session()->flash('message', 'No records found for the selected date.');
                }

                foreach ($disapproved as $key => $value) {
                    $templateProcessor->setValue('n#' . ($key + 1), $key + 1);
                    $templateProcessor->setValue('reg_no#' . ($key + 1), $value->registration_no);
                    $templateProcessor->setValue('date_reg#' . ($key + 1), date('M. d, Y', strtotime($value->registration_date)));
                    $templateProcessor->setValue('vessel_name#' . ($key + 1), $value->boat->vessel_name);
                    $templateProcessor->setValue('owner#' . ($key + 1), $value->ownerInfo->fullname);
                    $templateProcessor->setValue('status#' . ($key + 1), $value->status);
                }
            } elseif ($this->type === 'expired') {
                $count = $expired->count();
                if ($count > 0) {
                    $templateProcessor->cloneRow('n', $count);
                } else {
                    session()->flash('message', 'No records found for the selected date.');
                }

                foreach ($expired as $key => $value) {
                    $templateProcessor->setValue('n#' . ($key + 1), $key + 1);
                    $templateProcessor->setValue('reg_no#' . ($key + 1), $value->registration_no);
                    $templateProcessor->setValue('date_reg#' . ($key + 1), date('M. d, Y', strtotime($value->registration_date)));
                    $templateProcessor->setValue('vessel_name#' . ($key + 1), $value->boat->vessel_name);
                    $templateProcessor->setValue('owner#' . ($key + 1), $value->ownerInfo->fullname);
                    $templateProcessor->setValue('status#' . ($key + 1), $value->status);
                }
            }
        }

        $filename = 'Reports-' . $this->startDate . '-to-' . $this->endDate;
        $tempPath = 'reports/' . $filename . '.docx';

        if (!file_exists(public_path('reports'))) {
            mkdir(public_path('reports'), 0777, true);
        }

        $templateProcessor->saveAs(public_path($tempPath));
        return response()->download(public_path($tempPath));
    }
    public function render()
    {
        return view('livewire.reports.export');
    }
}
