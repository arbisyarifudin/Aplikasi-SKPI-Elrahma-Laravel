<?php

namespace App\Jobs;

use App\Models\DokumenSkpi;
use App\Models\Mahasiswa;
use App\Models\MahasiswaProgramStudi;
use App\Models\Prestasi;
use App\Models\ProgramStudi;
use App\Utils\Skpi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

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
            $dokumenSkpi = DokumenSkpi::where('id', $dokumenSkpiId)->first();
            if (!$dokumenSkpi) {
                // throw new \Exception("Dokumen SKPI dengan id {$dokumenSkpiId} tidak ditemukan");
                Log::error("Dokumen SKPI dengan id {$dokumenSkpiId} tidak ditemukan");
                continue;
            }
            $mahasiswa = Mahasiswa::where('id', $dokumenSkpi->mahasiswa_id)->first();
            if (!$mahasiswa) {
                // throw new \Exception("Mahasiswa dengan id {$dokumenSkpi->mahasiswa_id} tidak ditemukan");
                Log::error("Mahasiswa dengan id {$dokumenSkpi->mahasiswa_id} tidak ditemukan");
                continue;
            }
            $programStudi = ProgramStudi::where('id', $dokumenSkpi->program_studi_id)->first();
            if (!$programStudi) {
                // throw new \Exception("Program Studi dengan id {$dokumenSkpi->program_studi_id} tidak ditemukan");
                Log::error("Program Studi dengan id {$dokumenSkpi->program_studi_id} tidak ditemukan");
                continue;
            }

            $mahasiswaProdi = MahasiswaProgramStudi::where('mahasiswa_id', $mahasiswa->id)->where('program_studi_id', $programStudi->id)->first();
            if (!$mahasiswaProdi) {
                // throw new \Exception("Mahasiswa Program Studi dengan id {$mahasiswa->id} dan {$programStudi->id} tidak ditemukan");
                Log::error("Mahasiswa Program Studi dengan id {$mahasiswa->id} dan {$programStudi->id} tidak ditemukan");
                continue;
            }

            $jenjangPendidikan = $programStudi->jenjangPendidikan;

            $prestasi = Prestasi::where('mahasiswa_id', $mahasiswa->id)->get();

            // generate tanggal lahir indo
            $tanggalLahir = $mahasiswa->tanggal_lahir;
            $tanggalLahirIndo = Skpi::dateIndo($tanggalLahir); // 29 Oktober 2021

            // generate tanggal lahir en
            $tanggalLahirEn = date('F d, Y', strtotime($tanggalLahir)); // October 29, 2021

            $mahasiswa->tanggal_lahir = $tanggalLahirIndo;
            $mahasiswa->tanggal_lahir_en = $tanggalLahirEn;

            $pdfView = view('pdf.dokumen_skpi', [
                'dokumenSkpi' => $dokumenSkpi,
                'mahasiswa' => $mahasiswa,
                'programStudi' => $programStudi,
                'jenjangPendidikan' => $jenjangPendidikan,
                'mahasiswaProdi' => $mahasiswaProdi,
                'hasilCapaian' => $hasilCapaian,
                'prestasi' => $prestasi,
                'pengaturan' => [
                    'nama_institusi' => Skpi::getSettingByName('nama_institusi'),
                    'nama_institusi_en' => Skpi::getSettingByName('nama_institusi_en'),
                    'sk_pendirian_institusi' => Skpi::getSettingByName('sk_pendirian_institusi'),
                    'sk_pendirian_institusi_en' => Skpi::getSettingByName('sk_pendirian_institusi_en'),
                    'jenis_pendidikan' => Skpi::getSettingByName('jenis_pendidikan'),
                    'jenis_pendidikan_en' => Skpi::getSettingByName('jenis_pendidikan_en'),
                ]
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

            // generate unique nomor dokumen
            // kode = 20210301
            // nomor = 202103010001
            // $kode = date('Ymd'); // 20210301
            // $nomor = '0001';
            // $lastDokumenSkpi = DokumenSkpi::where('nomor', 'like', "{$kode}%")->orderBy('nomor', 'desc')->first();
            // if ($lastDokumenSkpi) {
            //     // get 4 last digit
            //     $lastNomor = substr($lastDokumenSkpi->nomor, -4);
            //     $nomor = str_pad($lastNomor + 1, 4, '0', STR_PAD_LEFT);
            // }
            // $dokumenNomor = $kode . $nomor;

            $dokumenNomor = $dokumenSkpi->nomor;
            $pdf->save($uploadPath . '/' . $dokumenNomor . '.pdf');

            $dokumenSkpi->update([
                'nomor' => $dokumenNomor,
                'file' => $dokumenNomor . '.pdf'
            ]);

            // echo "Generate file SKPI {$dokumenSkpi->nomor} berhasil" . PHP_EOL;
        }
    }
}