<?php

namespace App\Jobs;

use App\Models\DokumenSkpi;
use App\Models\Mahasiswa;
use App\Models\Prestasi;
use App\Models\ProgramStudi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateSkpiFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $dokumenSkpiIds;
    private $hasilCapaian;

    /**
     * Create a new job instance.
     */
    public function __construct($dokumenSkpiIds, $hasilCapaian)
    {
        $this->dokumenSkpiIds = $dokumenSkpiIds;
        $this->hasilCapaian = $hasilCapaian;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $dokumenSkpiIds = $this->dokumenSkpiIds;
        $hasilCapaian = $this->hasilCapaian;

        foreach ($dokumenSkpiIds as $key => $dokumenSkpiId) {
            $dokumenSkpi = DokumenSkpi::find($dokumenSkpiId);
            $mahasiswa = Mahasiswa::find($dokumenSkpi->mahasiswa_id);
            if (!$mahasiswa) {
                continue;
            }
            $programStudi = ProgramStudi::find($dokumenSkpi->program_studi_id);
            $prestasi = Prestasi::where('mahasiswa_id', $mahasiswa->id)->get();

            $pdfView = view('admin.dokumen.pdf', [
                'dokumenSkpi' => $dokumenSkpi,
                'mahasiswa' => $mahasiswa,
                'programStudi' => $programStudi,
                'hasilCapaian' => $hasilCapaian,
                'prestasi' => $prestasi
            ])->render();

            // echo ($pdfPreview); die;

            $pdf = Pdf::loadHTML($pdfView)
                ->setPaper('a4', 'portrait')
                ->setOptions([
                    'isPhpEnabled' => true,
                ]);

            $uploadPath = storage_path('app/public/dokumen_skpi');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $pdf->save($uploadPath . '/' . $dokumenSkpi->nomor . '.pdf');

            $dokumenSkpi->update([
                'file' => $dokumenSkpi->nomor . '.pdf'
            ]);

            // echo "Generate file SKPI {$dokumenSkpi->nomor} berhasil" . PHP_EOL;
        }
    }
}
